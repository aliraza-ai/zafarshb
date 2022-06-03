<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if(! session()->get('logged_in')){

            return redirect()->to(base_url() . '/Login');
        }
        return view('dashboard.php');
    }

    public function edit_profile()
    {

        $db=db_connect();
        $session = session();
        $id=$session->get('id');
        $builder = $db->table('users');
        $query=$builder->where('id', $id)->get();
        $view_data['results']=$query->getResult();

        return view('edit_profile.php',$view_data);
	}

    public  function  update_business()
    {
        $db=db_connect();
        $builder=$db->table('business_info');
        $view_data['results']=$builder->get()->getResult();
        return view('config_pages/update_business.php',$view_data);
    }
    
    public function nominals()
    {
        return view('config_pages/add_nominal');
    }

    public function change_password(): string
    {
        return view('change_password.php');
    }


}

