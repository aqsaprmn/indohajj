<?php

namespace App\Controllers\Catalog;

use \App\Controllers\BaseController;

class Haji extends BaseController
{
    protected $helpers = ['ceklogin_helper'];
    public function index()
    {
        $data = [
            "title" => "Haji",
            "active" => "haji",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        // return view('Catalog/haji', $data); 
        return view('Layout/comingsoon', $data);
    }
}
