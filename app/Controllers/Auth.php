<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AuthDb;


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
    $authModel = new AuthDb();

    $username = $this->request->getPost('username');
    $password = md5($this->request->getPost('password'));

    $user = $authModel->where('username', $username)->first();

    if (!$user) {
        return redirect()->to('/auth')->with('alert', 'Akun tidak ditemukan. Silakan lakukan Sign Up.');
    }

    if ($user['password'] !== $password) {
        return redirect()->to('/auth')->with('alert', 'Password salah.');
    }

    $session = session();
    $session->set([
        'logged_in' => true,
        'username'  => $user['username'],
        'nama'      => $user['nama'],
        'id'        => $user['id']
    ]);

    return redirect()->to('pages/home');
}


    public function getLogout()
    {
        session()->destroy();
        return redirect()->to('/auth');
    }


    public function getAccount()
    {
        $accountModel = new AuthDB();
        $data = [
            'id' => 1,
            'username' => 'darth',
            'password' => md5("admin"),
            'nama' => 'darth'
        ];
        echo "sebelum insert";
        print_r($accountModel->findall());
        $accountModel->insert($data);
        echo "sesudah insert";
        print_r($accountModel->findall());
    }

    public function getSignup()
    {
        $pages = [
            "title" => "Register",
            "head" => "login",
        ];

        return view('pages/register', $pages);
    }

    public function postProcesssignup()
    {
        $authModel = new AuthDb();

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $rePassword = $this->request->getPost('re-password');

        if ($password !== $rePassword) {
            return redirect()->back()->withInput()->with('error', 'Password tidak sama!');
        }

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password),
        ];

        $authModel->insert($data);

        return redirect()->to('/auth')->with('success', 'Registrasi berhasil!');
    }
}
