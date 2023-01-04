<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\HoHotel;

class Hotel extends BaseController
{
    protected $HoHotel;
    public function __construct()
    {
        $this->HoHotel = new HoHotel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Hotel',
        ];

        $hoHotel = $this->HoHotel->findAll();
        $data['hh'] = $hoHotel;

        // dd($data);

        return view('Admin/Hotel/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Daftar Hotel',
            'validation' => \Config\Services::validation()
        ];

        return view('Admin/Hotel/add', $data);
    }

    public function insert()
    {
        dd($this->request->getPost());
    }
}
