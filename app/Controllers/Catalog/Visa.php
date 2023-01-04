<?php

namespace App\Controllers\Catalog;

use \App\Controllers\BaseController;
use App\Models\UserDataModel;
use App\Models\VisaModel;

class Visa extends BaseController
{
    protected $helpers = ['ceklogin_helper'];
    protected $VisaModel;
    public function __construct()
    {
        $this->VisaModel = new VisaModel();
        $this->UserDataModel = new UserDataModel();
    }
    public function index()
    {
        $data = [
            "title" => "Visa",
            "active" => "visa",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'validation' => \Config\Services::validation(),
            'ceklogin' => ceklogin()
        ];

        return view('Catalog/visa', $data);
    }

    public function saveVisa()
    {
        $insVisa = $this->VisaModel->save([
            'reg_id' => 'PP-01',
            'pass_no' => $this->request->getVar('nopass'),
            'nationality' => $this->request->getVar('negara'),
            'place_issued' => $this->request->getVar('pi'),
            'date_issued' => $this->request->getVar('di'),
            'date_expired' => $this->request->getVar('de'),
            'pass_file' => $this->request->getVar('filepass')
        ]);

        $insUserData = $this->UserDataModel->save([
            // 'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'nik' => $this->request->getVar('nik'),
            'nik' => $this->request->getVar('nik'),
            'address' => $this->request->getVar('address'),
            'nationality' => $this->request->getVar('national'),
            'pob' => $this->request->getVar('pob'),
            'dob' => $this->request->getVar('dob'),
            'hp' => $this->request->getVar('hp'),
        ]);

        session()->setFlashdata('pesan', 'visa');

        return redirect()->to('/');
    }
}
