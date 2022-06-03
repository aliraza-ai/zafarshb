<?php

namespace App\Controllers;
use App\Libraries\Datatables;


class Captain extends BaseController

{

    var $column_order = array('','id','name','number', 'joindate', '');
    var $order = array('Id' => 'asc');

    function index()
    {
        return view('captain/view_captain');
    }

    public function show()
    {

        $listing = $this->get_datatables();
        $jumlah_semua = $this->jumlah_semua();
        $jumlah_filter = $this->jumlah_filter();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $row = array();
            $row[] = $key->id;
            $row[] = "<div style='font-size: 15px;'>" . $key->id."</div>";
            $row[] = "<div>" . $key->name."</div>";
            $row[] = "<div>" . $key->number."</div>";
            $row[] = "<div>" . $key->joindate. "</div>";
            $row[] = '<div style="text-align:right; font-weight: bold;"> 
  <a href="'.base_url().'/Captain/edit_captain/'.$key->id.'">Edit</a> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;
                    <a  onclick="delone(' . $key->id . ')" href="javascript:void(0);">Delete</a>
                 
                </div>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $jumlah_semua->jml,
            "recordsFiltered" => $jumlah_filter->jml,
            "data" => $data
        );
        echo json_encode($output);
    }

    function get_datatables()
    {

        // search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "id LIKE '%$search%' or name LIKE '%$search%' or number LIKE '%$search%' or joindate LIKE '%$search%'";
        } else {
            $kondisi_search = "id != ''";
        }

        // order
        if ($_POST['order']) {
            $result_order = $this->column_order[$_POST['order']['0']['column']];
            $result_dir = $_POST['order']['0']['dir'];
        } else if ($this->order) {
            $order = $this->order;
            $result_order = key($order);
            $result_dir = $order[key($order)];
        }


        if ($_POST['length'] != -1) ;
        $db = db_connect();
        $builder = $db->table('captain');
        $query = $builder->select('*')
            ->where($kondisi_search)
            ->orderBy($result_order, $result_dir)
            ->limit($_POST['length'], $_POST['start'])
            ->get();
        return $query->getResult();

    }


    function jumlah_semua()
    {
        $sQuery = "SELECT COUNT(Id) as jml FROM captain";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }

    function jumlah_filter()
    {
        // kondisi_search
        if ($_POST['search']['value']) {
            $search = $_POST['search']['value'];
            $kondisi_search = "AND (id LIKE '%$search%' or name LIKE '%$search%' or  number LIKE '%$search%' or joindate LIKE '%$search%')";
        } else {
            $kondisi_search = "";
        }
        $sQuery = "SELECT COUNT(id) as jml FROM captain WHERE id !='' $kondisi_search";
        $db = db_connect();
        $query = $db->query($sQuery)->getRow();
        return $query;
    }


    //delete for selected
    function deleteSelected()
    {
        $db = db_connect();
        $builder = $db->table('captain');
        $string = $this->request->getPost('string');
        if ($string) {
            $output['msg'] = true;
        } else
            $output['msg'] = false;

        $arr_id = explode('||', $string);
        foreach ($arr_id as $keys) {
            $builder->where('id', $keys);
            $builder->delete();

        }
        echo json_encode($output);
    }

    //delete one
    function deleteone()
    {
        $db = db_connect();
        $builder = $db->table('captain');
        $id = $this->request->getPost('string');

        if ($id) {
            $builder->where('id', $id);
            $builder->delete();

            $output['msg'] = true;
        } else
            $output['msg'] = false;
    }


    function Add_captain()
    {
        return view('Captain/add_captain');
    }

    function Insert_captain()
    {
        $db=db_connect();
        $session = session();
        $user_id=$session->get('id');
        $bulider=$db->table('captain');
        $res=$bulider->where('number',$this->request->getPost("number"))->get()->getResult();
        if($res)
        {
            $session->setFlashdata('error', 'Number Already Exits.');
            return redirect()->to(base_url() . '/Captain/');
        }

        $data= array(
            'name' => $this->request->getPost("name"),
            'number' => $this->request->getPost("number"),
            'joindate' => $this->request->getPost("joindate")
        );

        $bulider->insert($data);
        if ($db->affectedRows()>0)
        {
            $session->setFlashdata('msg', 'Captain Inserted successfully.');
            return redirect()->to(base_url() . '/Captain/');
        } else
        {
            $session->setFlashdata('error', 'Server Error Try Later.');
            return redirect()->to(base_url() . '/Captain/');

        }
    }


    function edit_captain()
    {

        $f= $this->request->uri->getSegments(2);
        $db=db_connect();
        $builder = $db->table('captain');
        $id= $f[2];
        if($id)
        {
            $query=$builder->where('id', $id)->get();
            $view_data['results']=$query->getResult();
            return view('captain/edit_captain',$view_data);
        }else
        {
            return view('captain/view_captain');
        }

    }

    function update_Captain()
    {
        $db=db_connect();
        $session = session();
        $user_id=$session->get('id');
        $sId=$this->request->getPost("sId");
        $bulider=$db->table('captain');
        $res=$bulider->where('number',$this->request->getPost("number"))->where('id',$sId)->get()->getResult();
        $data= array(
            'name' => $this->request->getPost("name"),
            'number' => $this->request->getPost("number"),
            'joindate' => $this->request->getPost("joindate"),
        );


            $bulider->where('id',$sId)->update($data);




        $session->setFlashdata('msg', 'Captain Update successfully.');
        return redirect()->to(base_url() . '/Captain');


    }





}

?>