<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    public function getIndex()
    {
        $pages = [
            "title" => "Login",
            "head" => "login",
        ];

        return view('pages/login', $pages);
    }

    public function postProcesslogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        if ($username == 'admin' && $password == 'admin') {
            $session = session();
            $userData = [
                'logged_in' => TRUE
            ];
            $session->set($userData);
            return redirect()->to('pages/home');
        } else {
            $session = session();
            $session->setFlashdata('alert', 'Username atau Password salah');
            return redirect()->to('/auth');
        }
    }
    
    public function getLogout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }
}
