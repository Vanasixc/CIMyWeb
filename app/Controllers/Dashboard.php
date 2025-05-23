<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use App\Models\AuthDb;


class Dashboard extends BaseController
{
    public function getIndex()
    {
        $data = [
            'nama' => session()->get('nama'),
        ];
        return view('layouts/dashboard/welcome-dashboard', $data);
    }

    public function getAccount_setting()
    {
        return view('layouts/dashboard/account_setting-dashboard');
    }

    public function getDatatable()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('id, nama, username');
        return DataTable::of($builder)->toJson(true);
    }

    public function getWelcome()
    {
        return view('layouts/dashboard/welcome-dashboard');
    }
}
