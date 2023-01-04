<?php

namespace App\Controllers\Catalog;

use App\Controllers\BaseController;
use App\Models\PuBooking;
use App\Models\PuPaket;
use App\Models\UserDataModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $UserModel;
    protected $UserDataModel;
    protected $DataSessUser;
    protected $PuBooking;
    protected $helpers = ['ceklogin_helper'];
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UserDataModel = new UserDataModel();
        $this->PuBooking = new PuBooking();
    }

    public function index()
    {
        $data = [
            "title" => "Home",
            "active" => "home",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script><script src='" . base_url() . "/public/asset/js/user.js'></script>",
            'ceklogin' => ceklogin()
        ];

        // d(app_timezone());
        // d(time() + 25200);
        // dd(date('Y-m-d H:i:s', time()));
        // helper('cookie');
        // set_cookie([
        //     'name' => 'id',
        //     'value' => '1',
        //     'expire' => time() + 1000,
        //     'httponly' => false
        // ]);


    }

    public function myProfile()
    {
        $data = [
            "title" => "Profil",
            "active" => "",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script><script src='" . base_url() . "/public/asset/js/user.js'></script>",
            'ceklogin' => ceklogin()
        ];
        // dd(ceklogin());
        if (ceklogin()['logged_in']) {
            $username = ceklogin()['user']['username'];

            $userModel = $this->UserModel->select('id,username,email,hp,role_id,kd_referral,sb_referral,created_at')->where('username', $username)->first();

            $userDataModel = $this->UserDataModel->select('name,nik,dob,pob,sex,address,image,ktp,created_at')->where('username', $username)->first();

            $profile = array_merge($userModel, $userDataModel);

            $data['profile'] = $profile;
            // dd($data);
            // d($data['profile']);

            return view('Catalog/Profile/profile', $data);
        } else {
            return view('Catalog/home', $data);
        }
    }

    public function informasiReservasi()
    {
        $data = [
            "title" => "Informasi Reservasi",
            "active" => "",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script><script src='" . base_url() . "/public/asset/js/user.js'></script>",
            'ceklogin' => ceklogin()
        ];
        // dd(ceklogin());
        if (ceklogin()['logged_in'] == false) {

            return redirect()->to(base_url())->with('ilegal', 'ilegalreservasi');
        }

        // dd($data);

        $dataReserv = $this->PuBooking->select(
            'pu_booking.kd_booking, 
        pu_booking.username,
        pu_booking.total_paket, 
        pu_payment.status as status_payment, 
        pu_paket.nama as nama_paket,
        pu_payment.payment_ref_id'
        )->join('pu_paket', 'pu_paket.kd_pu = pu_booking.kd_pu', 'inner')->join('pu_payment', 'pu_payment.username = pu_booking.username AND pu_payment.kd_booking = pu_booking.kd_booking', 'left')->where('pu_booking.username', ceklogin()['user']['username'])->findAll();

        // date_default_timezone_set('Asia/Jakarta');
        // $currentDate = $userData ?? time();
        // dd(date('Y-m-d H:i:s', time()));

        if ($dataReserv) {
            $data['reserve'] = $dataReserv;
        } else {
            $data['reserve'] = null;
        }

        // dd($data);

        return view('Catalog/Profile/informasiReservasi', $data);
    }

    public function detail($kd_booking)
    {
        $data = [
            "title" => "Informasi Reservasi",
            "active" => "",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script><script src='" . base_url() . "/public/asset/js/user.js'></script>",
            'ceklogin' => ceklogin()
        ];
        // dd(ceklogin());
        if (ceklogin()['logged_in'] == false) {

            return redirect()->to(base_url())->with('ilegal', 'ilegalreservasi');
        }

        $puBooking = $this->PuBooking->select('*')->where(['pu_booking.kd_booking' => $kd_booking, 'pu_booking.username' => ceklogin()['user']['username']])->join('pu_jamaah', 'pu_jamaah.kd_booking = pu_booking.kd_booking', 'inner')->join('pu_paket', 'pu_paket.kd_pu = pu_booking.kd_pu', 'inner')->join('pu_payment', 'pu_payment.kd_booking = pu_booking.kd_booking')->first();

        // dd($puBooking);

        return view('Catalog/Profile/reserveDetail', $data);
    }
}
