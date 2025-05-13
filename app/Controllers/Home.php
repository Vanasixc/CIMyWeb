<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function getIndex()
    {
        $pages = [
            "title" => "Home",
        ];

        return view('pages/home', $pages);
    }
}
