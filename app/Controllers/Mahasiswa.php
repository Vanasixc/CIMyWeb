<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Mahasiswa extends BaseController
{
    public function getIndex()
    {
        return view("pages/form_v");
    }

    public function postLogin()
    {

        $rules = [
            'username' => ['label' => 'Username', 'rules' => 'required']
        ];
        $validation = service('validation');
        $validation->setRules($rules);
        $data["pesan"] = "Validasi berhasil";
        if (!$validation->withRequest($this->request)->run()) {
            // masuk ke if arti validasi gagal
            $data["pesan"] = "Validasi gagal";
            return view ('pages/form_v', $data);
        }
        else{
            return view ('pages/form_v', $data);
        }
    }
}
