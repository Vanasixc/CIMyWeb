<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function getHome()
    {
        $pages = [
            "title" => "Home",
            "head" => "home",
        ];

        return view('home/pages/home', $pages);
    }

    public function getWelcome()
    {
        return view('welcome_message');
    }

    public function getForm()
    {
        $pages = [
            "title" => "Form",
            "pageinfo" => "Form",
            "description" => "Ini adalah halaman form",
        ];

        return view('home/pages/form', $pages);
    }

    //method function
    public function postKirim()
    {
        $kata = $this->request->getPost('input');

        $pages = [
            "title" => "Form",
            "pageinfo" => "Form",
            "description" => "Ini adalah halaman form",
        ];
        $data = [
            "getData" => $kata,
        ];

        $result = array_merge($pages, $data);

        return view("home/pages/form", $result);
    }
}

