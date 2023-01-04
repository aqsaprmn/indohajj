<?php

namespace App\Controllers\Catalog;

use \App\Controllers\BaseController;

class Hotel extends BaseController
{
    protected $helpers = ['ceklogin_helper'];

    public function index()
    {
        $data = [
            "title" => "Hotel",
            "active" => "hotel",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        return view('Catalog/hotel', $data);
    }
}
