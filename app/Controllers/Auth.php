<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;


class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

    public function login()
    {
        echo view('login');
    }

    public function login_proses()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data->password_hash;
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'        => $data->id,
                    'username'  => $data->username,
                    'email'     => $data->email,
                    'logged_in' => TRUE,
                    'role'      => $data->role
                ];
                $session->set($ses_data);
                // $session->expire
                return redirect()->to('/admin');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        $data = [
            'validation' => $this->validator
        ];
        return view('register', $data);
    }

    public function register_proses()
    {
        $validation = [
            'username'      => [
                'rules' => 'required|min_length[3]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => "Username tidak boleh kosong",
                    'is_unique' => 'Username ini sudah terdaftar'
                ]
            ],
            'email'         => [
                'rules'  => 'required|valid_email|is_unique[users.email]', 
                'errors' => [
                    'required' => "Email tidak boleh kosong",
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_unique' => 'Email ini sudah terdaftar'
                ]
            ],
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];
        if ($this->validate($validation)) {
            $model = new UserModel();
            $data = [
                'username'  => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        } else {
            $data = [
                'validation' => $this->validator
            ];
            // return view('register', $data);
            return redirect()->to("register")->withInput()->with("errors", $this->validator);
        }
    }
}
