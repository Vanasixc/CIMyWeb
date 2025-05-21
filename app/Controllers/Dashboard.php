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
        return view('dashboard/index');
    }

    public function getDatatable()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('id, nama, username');
        return DataTable::of($builder)->toJson(true);
    }
}
