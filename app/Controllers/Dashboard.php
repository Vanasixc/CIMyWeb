<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use App\Models\AuthDb;


class Dashboard extends BaseController
{
    protected $AuthDb;

    public function __construct()
    {
        $this->AuthDb = new AuthDb();
    }
    public function getIndex()
    {
        $data = [
            'nama' => session()->get('nama'),
        ];
        return view('dashboard/pages/welcome-dashboard', $data);
    }

    public function getAccount_setting()
    {
        return view('dashboard/pages/account_setting-dashboard');
    }

    public function getDatatable()
    {
        $db = db_connect();
        $builder = $db->table('users')->select('id, nama, username');
        return DataTable::of($builder)->toJson(true);
    }


    public function getUserdata($id = null)
    {
        $data = $this->AuthDb->find($id);
        if ($data) {
            return $this->response->setJSON($data);
        } else {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'User not found']);
        }
    }

    public function postUpdate($id = null)
    {
        $data = [
            'nama' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
        ];

        $newSession = $this->AuthDb->update($id, $data);

        if ($newSession) {
            session()->set([
                'nama' => $data['nama'],
                'username' => $data['username'],
            ]);
        } else {
            return redirect()->to('dashboard/account_setting')->with('error', 'Data gagal di edit!');
        }

        return redirect()->to('dashboard/account_setting')->with('message', 'Data berhasil di edit!');
    }

    public function postDelete($id = null)
    {
        $userIdNow = session()->get('id');

        if ($id == $userIdNow) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus akun yang sedang digunakan!');
        }

        $this->AuthDb->delete($id);

        return redirect()->to('dashboard/account_setting')->with('message', 'Akun berhasil dihapus.');
    }
}
