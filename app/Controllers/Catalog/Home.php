<?php

namespace App\Controllers\Catalog;

use App\Controllers\BaseController;
use App\Models\PuBooking;
use App\Models\PuPaket;
use App\Models\PuPayment;
use App\Models\UserDataModel;
use App\Models\UserModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class Home extends BaseController
{
    protected $UserModel;
    protected $UserDataModel;
    protected $DataSessUser;
    protected $PuBooking;
    protected $PuPaket;
    protected $PuPayment;
    protected $helpers = ['ceklogin_helper'];
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UserDataModel = new UserDataModel();
        $this->PuBooking = new PuBooking();
        $this->PuPaket = new PuPaket();
        $this->PuPayment = new PuPayment();
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


        return view('Catalog/home', $data);
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

        $puBooking = $this->PuBooking->select(
            'pu_booking.kd_booking,
            pu_booking.created_at,
            pu_booking.total_paket,
            pu_booking.total_jamaah,
            pu_jamaah_paspor.kd_jamaah,
            pu_jamaah_paspor.nama as nama_paspor,
            pu_jamaah_paspor.no_paspor,
            pu_jamaah_paspor.dob,
            pu_jamaah_paspor.nationality,
            pu_jamaah_paspor.sex,
            pu_jamaah_paspor.image,
            pu_jamaah_harga.tipe,
            pu_jamaah_harga.harga,
            pu_paket.kd_pu,
            pu_paket.nama as nama_paket,
            pu_paket.reservasi,
            pu_paket.tgl_berangkat,
            pu_paket.tgl_pulang,
            pu_paket.maskapai,
            pu_paket.tipe,
            pu_payment.status,
            pu_payment.amount,
            pu_payment.payment_ref_id,
            pu_payment.time_request,
            pu_payment.time_expired,
            pu_payment.payment_ref_merchant'
        )->where(
            [
                'pu_booking.kd_booking' => $kd_booking,
                'pu_booking.username' => ceklogin()['user']['username']
            ]
        )->join(
            'pu_jamaah_paspor',
            'pu_jamaah_paspor.kd_booking = pu_booking.kd_booking',
            'inner'
        )->join(
            'pu_jamaah_harga',
            'pu_jamaah_harga.kd_booking = pu_booking.kd_booking',
            'inner'
        )->join(
            'pu_paket',
            'pu_paket.kd_pu = pu_booking.kd_pu',
            'inner'
        )->join(
            'pu_payment',
            'pu_payment.kd_booking = pu_booking.kd_booking',
            'left'
        )->first();

        $data['pb'] = $puBooking;

        if ($puBooking['status'] == "UNPAID") {
            $time =  $data['pb']['time_expired'] . '-' . date('Y-m-d H:i:s');
            $time2 = strtotime($data['pb']['time_expired']) - strtotime(date('Y-m-d H:i:s'));
            $hours = floor($time2 / 3600);
            $minutes = floor($time2 / 60) % 60;

            $expired_at = $hours . ' JAM - ' . $minutes . ' MENIT';
            $data['pb']['expired_at'] = $expired_at;
        }

        // dd($data);

        return view('Catalog/Profile/reserveDetail', $data);
    }

    public function bukti($tipe, $kd_booking)
    {
        $params = ['tipe' => $tipe];
        $filename = "";
        $data = [];
        if ($tipe == "umrah") {
            $pb = $this->PuBooking->select(
                'kd_pu, kd_booking, username, total_paket, created_at'
            )
                ->where('kd_booking', $kd_booking)
                ->first();
            $us = $this->UserModel->select(
                'email, hp'
            )
                ->where('username', $pb['username'])
                ->first();
            $usd = $this->UserDataModel->select(
                'name as nama_reserve,
                    address'
            )
                ->where('username', $pb['username'])
                ->first();
            $pu = $this->PuPaket->select(
                'nama'
            )
                ->where('kd_pu', $pb['kd_pu'])
                ->first();
            $pp = $this->PuPayment->select(
                'status, payment_ref_id, payment_ref_merchant, amount, paid_date'
            )
                ->where('kd_booking', $kd_booking)
                ->first();

            $data = array_merge($params, $pb, $pu, $pp, $us, $usd);

            // dd($data);

            $filename = "Bukti-Reservasi-" . $pb['kd_booking'];
        }
        // dd($_SERVER['DOCUMENT_ROOT']);
        $html = view('Catalog/Profile/reserveBukti', $data);



        $dompdf = new Dompdf(['isRemoteEnabled' => true]);
        // $dompdf->set_base_path(realpath(FCPATH . '/assets/plugins/bootstrap/css/bootstrap.css'));
        // $options = new Options();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream(
            $filename . ".pdf",
            ["Attachment" => false]
        );

        exit;
    }
}
