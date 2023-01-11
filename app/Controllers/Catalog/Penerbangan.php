<?php

namespace App\Controllers\Catalog;

use \App\Controllers\BaseController;

class Penerbangan extends BaseController
{
    protected $helpers = ['ceklogin_helper'];

    public function index()
    {
        $data = [
            "title" => "Penerbangan",
            "active" => "penerbangan",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];


        // return view('Catalog/penerbangan', $data);

        return view('Layout/comingsoon', $data);
    }
}
