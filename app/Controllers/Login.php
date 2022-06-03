<?php


namespace App\Controllers;


use CodeIgniter\Model;
use App\Models\User;
class Login extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    public function index()
    {
        if (session()->get('logged_in'))
        {

            return redirect()->to('/Home');
        }else
        {
            return view('login.php');
        }

    }

    public function verify()
    {
        $session = session();
        $db = \Config\Database::connect();

        $input = $this->validate([
            'password' => 'required|min_length[3]',
            'email' => 'required|valid_email',
        ]);
        if (!$input) {
            echo view('login', [
                'validation' => $this->validator
            ]);
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $model = new User();
            $data = $model->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                if (!($data['active'] == 1)) {
                    $session->setFlashdata('msg', 'User is Disable');
                    return redirect()->to('/login');
                }
                // $verify_pass = password_verify($password, $pass);
                if ($pass == md5($password)) {
                    $ses_data = [
                        'id' => $data['id'],
                        'firstName' => $data['firstName'],
                        'lastName' => $data['lastName'],
                        'email' => $data['email'],
                        'active' => $data['active'],
                        'userType' => $data['userType'],
                        'created_at' => $data['created_at'],
                        'logged_in' => TRUE
                    ];
                    $session->set($ses_data);
                    return redirect()->to('/');
                } else {
                    $session->setFlashdata('msg', 'Wrong Password');
                    return redirect()->to('/login');
                }
            } else {
                $session->setFlashdata('msg', 'Email not Found');
                return redirect()->to('/Login');
            }


        }


        //return redirect()->to('https://example.com');
    }

    public function update_business()
    {
        $db = db_connect();
        $builder = $db->table('business_info');

        $validated = $this->validate([
            'logo' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                'max_size[file,1024]',
            ],
        ]);
        $avatar = $this->request->getFile('logo');
        if ($avatar->isValid() && $validated) {

            $exe = $avatar->guessExtension();
            if (file_exists('./public/disk/img/1' . "." . $exe)) {
                unlink('./public/disk/img/1' . "." . $exe);
            }
            $avatar->move('./public/disk/img/', '1' . "." . $exe);
            $imageN = '1' . "." . $exe;
            // $avatar->move(base_url() . 'public/disk/img/'. $avatar->getClientName());
            $data = [
                'businessName' => $this->request->getPost('businessName'),
                'businessAddress' => $this->request->getPost('businessAddress'),
                'city' => $this->request->getPost('city'),
                'province' => $this->request->getPost('county'),
                'postalCode' => $this->request->getPost('postalCode'),
                'country' => $this->request->getPost('country'),
                'phoneNumber' => $this->request->getPost('phoneNumber'),
                'mobileNumber' => $this->request->getPost('mobileNumber'),
                'emailAddress' => $this->request->getPost('email'),
                'websiteAddress' => $this->request->getPost('website'),
                'logo' => $imageN,
                'cnic' => $this->request->getPost('cnic'),
                'salesTaxNumber' => $this->request->getPost('tax'),
                'ntn' => $this->request->getPost('ntn'),
            ];
        } else {
            $data = [
                'businessName' => $this->request->getPost('businessName'),
                'businessAddress' => $this->request->getPost('businessAddress'),
                'city' => $this->request->getPost('city'),
                'province' => $this->request->getPost('county'),
                'postalCode' => $this->request->getPost('postalCode'),
                'country' => $this->request->getPost('country'),
                'phoneNumber' => $this->request->getPost('phoneNumber'),
                'mobileNumber' => $this->request->getPost('mobileNumber'),
                'emailAddress' => $this->request->getPost('email'),
                'websiteAddress' => $this->request->getPost('website'),
                'logo' => '',
                'cnic' => $this->request->getPost('cnic'),
                'salesTaxNumber' => $this->request->getPost('tax'),
                'ntn' => $this->request->getPost('ntn'),
            ];
        }
        $builder->update($data);

        $session = session();
        if ($builder->update($data)) {

            $session->setFlashdata('msg', 'Business updated successfully.');
            return redirect()->to('/Home/update_business');
        } else {
            $session->setFlashdata('msg', 'Getting Error Try later.');
            return redirect()->to('/Home/update_business');
        }


    }

    public function update_profile()
    {
        $session = session();
        $id = $session->get('id');

        $input = $this->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required',
        ]);


        if (!$input) {
            echo view('edit_profile', [
                'validation' => $this->validator
            ]);
        } else {
            $db = db_connect();
            $builder = $db->table('users');
            $data = [
                'firstName' => $this->request->getPost('firstName'),
                'lastName' => $this->request->getPost('lastName'),
                'mobile' => $this->request->getPost('mobile'),
            ];


            $builder->where('id', $id);
            if ($builder->update($data)) {
                $ses_data = [
                    'firstName' => $this->request->getPost('firstName'),
                    'lastName' => $this->request->getPost('lastName'),
                ];
                $session->set($ses_data);
                $session->setFlashdata('msg', 'Profile updated successfully.');
                return redirect()->to('/');
            } else {
                $session->setFlashdata('msg', 'Getting Error Try later.');
                return redirect()->to('edit_profile');
            }


            // $builder->set('field', 'field+1');
            // $builder->where('id', $id);
            // $builder->update();
        }


    }


    public function change_pwd()
    {
        $session = session();
        $id = $session->get('id');
        $db = db_connect();
        $builder = $db->table('users');
        $query = $builder->where('id', $id)->get();
        $view_data = $query->getResult();
        $oldPass = $this->request->getPost('old_pwd');
        $newPass = $this->request->getPost('new_pwd');
        if (md5($oldPass) == $view_data[0]->password) {
            $builder = $db->table('users');
            $builder->set('password', md5($newPass));
            $builder->where('id', $id);
            if ($builder->update()) {
                $session->setFlashdata('msg', 'Password updated successfully.');
                return redirect()->to(base_url() . '/Home/change_password');
            }
        } else {
            $session->setFlashdata('error', 'Old Password not Correct.');
            return redirect()->to(base_url() . '/Home/change_password');
        }

    }

    private function check_login(): \CodeIgniter\HTTP\RedirectResponse
    {
        $session = session();
        if ($session->get('logged_in'))
            return redirect()->to('/Home');
        else
            return redirect()->to('/Login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/Login');
    }

    public function forget_password()
    {

        return view('forget');
    }

    public function rest_password()
    {
        $email = $this->request->getPost('email', FILTER_SANITIZE_EMAIL);
        $session = session();
        $input = $this->validate([
            'email' => 'required|valid_email',
        ]);

        if (!$input) {
            echo view('forget', [
                'validation' => $this->validator
            ]);
        } else {

            $db = db_connect();
            $builder = $db->table('users');
            $results = $builder->where('email', $email)->get()->getResult();

            if (count($results) == 1) {
                $result = $builder->where('id', $results[0]->id)->update(['update_at' => date('Y-m-d h:i:s')]);
                if ($db->affectedRows() > 0) {
                    $to = $email;
                    $subject = "Rest Password Link";
                    $token = $results[0]->id;
                    $message = 'Hi ' . $results[0]->firstName . ' ' . $results[0]->lastName . '<br><br>'
                        . 'Your reset password has been received. Please click'
                        . 'the below link to reset your password.<br><br>'
                        . '<a href="' . base_url() . '/login/change_password/' . $token . '">Click to Rest Password</a><br><br>'
                        . 'Thanks <br> Super Account';

                    $email_config = array(
                        'charset' => 'utf-8',
                        'mailType' => 'html'
                    );

                    $email = \Config\Services::email();
                    $email->initialize($email_config);
                    $email->setTo($to);
                    $email->setFrom('info@superaccounts.biz', 'Super Accounts');
                    $email->setSubject($subject);
                    $email->setMessage($message);
                    if ($email->send()) {
                        $session->setFlashdata('msg1', 'Reset Password Link sent. Link will be expired in 15 mints..');
                        return redirect()->to('/Login/forget_password');
                    } else {
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }

                } else {
                    $session->setFlashdata('msg', 'Your Link has Expired. Try Again in 15 Mints..');
                    return redirect()->to('/Login/forget_password');
                }


            } else {
                $session->setFlashdata('msg', 'Your Email Not Found.');
                return redirect()->to('/Login/forget_password');
            }

        }
    }


    public function checkTimeExpiry($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $timeDiff = ($current_time - $update_time) / 60;
        if ($timeDiff < 900) {
            return true;
        } else {
            return false;
        }
    }

    public function change_password($token = null)
    {
        $session = session();
        $db = db_connect();
        $builder = $db->table('users');
        if (!empty($token)) {

            $result = $builder->where('id', $token)->get()->getResult();
            if (count($result) == 1) {
                if ($this->checkTimeExpiry($result[0]->update_at))
                {
                    $data['userId']=$result[0]->id;
                    return view('reset_pass',$data);

                } else {
                    $session->setFlashdata('msg', 'Link Expired. Try again in 15 mints..');
                    return redirect()->to('/Login');
                }

            } else {
                $session->setFlashdata('msg', 'Unauthorized User.');
                return redirect()->to('/Login');
            }
        } else {

            return redirect()->to('/Login');
        }
    }


    public function rest_password_change()
    {

        $new_pass=$this->request->getPost('new_pwd');
        $id=$this->request->getPost('usid');
        $con_pass=$this->request->getPost('confirm_pwd');

        $db=db_connect();
        $session=session();
        $builder=$db->table('users');

        $input = $this->validate([
            'new_pwd' => 'required|min_length[8]',
            'confirm_pwd' => 'required|matches[new_pwd]',
        ]);

        if (!$input) {
            echo view('reset_pass', [
                'validation' => $this->validator
            ]);
            var_dump("failed");
        }else
        {
            $builder->set('password', md5($new_pass))->where('id',$id)->update();
            $session->setFlashdata('msg1', 'Your Password Have Been Changed..');
            return redirect()->to('/Login');
        }


    }



}