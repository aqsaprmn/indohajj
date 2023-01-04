<?php

namespace App\Controllers\Catalog;

use \App\Controllers\BaseController;
use App\Models\NoPrefix;
use App\Models\PuBooking;
use App\Models\PuJamaah;
use App\Models\PuJamaahHarga;
use App\Models\PuJamaahPaspor;
use App\Models\PuPaket;
use App\Models\PuPayment;
use App\Models\PuRemaining;
use App\Models\UserDataModel;
use \GuzzleHttp\Exception;

// #[AllowDynamicProperties]
class Umrah extends BaseController
{
    protected $PuPaket;
    protected $PuRemaining;
    protected $PuJamaah;
    protected $PuJamaahPaspor;
    protected $PuJamaahHarga;
    protected $PuBooking;
    protected $PuPayment;
    protected $UsUserData;
    protected $Prefix;
    protected $helpers = ['ceklogin_helper'];
    protected $db;
    protected $tripay;
    protected $privateKey;
    protected $apiKey;
    public function __construct()
    {
        $this->PuRemaining = new PuRemaining();
        $this->PuPaket = new PuPaket();
        $this->PuBooking = new PuBooking();
        $this->PuJamaah = new PuJamaah();
        $this->PuJamaahPaspor = new PuJamaahPaspor();
        $this->PuJamaahHarga = new PuJamaahHarga();
        $this->PuPayment = new PuPayment();
        $this->UsUserData = new UserDataModel();
        $this->Prefix = new NoPrefix();
        // #[AllowDynamicProperties];
        $this->privateKey = 'Us2XE-57pu1-npeoX-easPj-yvUVL';
        $this->apiKey = '1FLdGKk2NnSrp4Fgil6f4yw9yAm3E4ZBIeecTVH2';

        // $this->__set($this->privateKey, 'Us2XE-57pu1-npeoX-easPj-yvUVL');
        // $this->__set($this->apiKey, '1FLdGKk2NnSrp4Fgil6f4yw9yAm3E4ZBIeecTVH2');

        $this->tripay = new Tripay($this->privateKey, $this->apiKey);

        helper('date');
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        $datapaketumrah = $this->PuPaket->where(['status' => "Y", 'populer' => "Y"])->join('pu_paket_remaining', 'pu_paket.kd_pu = pu_paket_remaining.kd_pu')->where('remaining >', '0')->findAll();

        if ($datapaketumrah) {
            $data['datapaketumrah'] = $datapaketumrah;
        } else {
            $data['datapaketumrah'] = null;
        }

        // $invoice = $this->PuPayment->where(
        //     [
        //         'payment_ref_merchant' => "R20230104151323aqsaprmn",
        //         'status' => 'UNPAID'
        //     ]
        // )->first();

        // dd($invoice);
        // $dataPayment  = [
        //     'status' => 'PAID',
        //     'updated_time_callback' => date('Y-m-d H:i:s'),
        //     'updated_status_callback' => 'SUKSES',
        //     'updated_payload_callback' => 'test'
        // ];

        $invoice = $this->PuPayment->where(
            [
                'payment_ref_id' => "T1783660073309O7MT",
                'payment_ref_merchant' => "R20230104180543aqsaprmn",
                'status' => 'UNPAID'
            ]
        )->first();

        $invoice2 = $this->PuPayment->where(
            [
                'payment_ref_id' => "tes",
                'payment_ref_merchant' => "R20230104180543aqsaprmn",
                'status' => 'UNPAID'
            ]
        )->first();


        if (!$invoice2) {
            d('gagal');
            dd($invoice2);
        } else {
            dd('sukses');
        }

        return view('Catalog/Umrah/umrah', $data);
    }

    public function detail($id)
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script><br><script src='" . base_url() . "/public/asset/js/umrah.js'></script>",
            'ceklogin' => ceklogin()
        ];

        $dtlPu = $this->PuPaket->where('kd_pu', $id)->first();
        $remainPu = $this->PuRemaining->select('remaining')->where(['kd_pu' => $id])->first();

        if ($dtlPu && $remainPu) {
            $data['ddu'] = array_merge($dtlPu, $remainPu);
            // dd($data['ddu']);
            return view('Catalog/Umrah/umrahdetail', $data);
        } else {
            return view('errors/html/error_404.php', ['message' => 'Id paket umrah tidak tersedia']);
        }
    }

    public function pligrim()
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        // dd(ceklogin());

        $kd_pu = $this->request->getPost('kd_pu');
        $totalPaketReserve = $this->request->getPost('totalpaket');

        $pr = $this->PuRemaining->where('kd_pu', $kd_pu)->first();

        if ($totalPaketReserve > $pr['remaining'] && $totalPaketReserve < 1) {
            return redirect()->to(base_url() . '/umrah' . '/' . $kd_pu)->with('umrahdetail', 'paketlebih');
        }

        if ($data['ceklogin']['logged_in'] == true) {
            $puPaket = $this->PuPaket->where('kd_pu', $kd_pu)->first();
            // dd($puPaket);
            $data['totalpaket'] = $totalPaketReserve;
            $data['ddu'] = $puPaket;
            $data['jamaah'] = $puPaket['peziarah'] * $totalPaketReserve;

            // dd($data);
            return view('Catalog/Umrah/umrahjamaah', $data);
        } else {
            return redirect()->to(base_url() . '/user/login')->with('pligrim', 'nextbooklogin');
        }
    }

    public function inputPligrim()
    {
        if (ceklogin()['logged_in'] == false) {
            return redirect()->to(base_url() . '/user/login');
        }
        // dd(ceklogin());
        $datauser = ceklogin();

        // dd($this->request->getPost());

        $jamaah = $this->request->getPost('jamaah');
        $kdPu = $this->request->getPost('kd_pu');
        $totalpaket = $this->request->getPost('total_paket');
        $prefixPb = $this->Prefix->find('3');

        $headPrefixPb = $prefixPb['head'];
        $noPrefixPb = $prefixPb['numb'];
        $noPrefixPb = (strlen($noPrefixPb) == 1) ? "0" . $noPrefixPb : $noPrefixPb;

        $kd_booking = $headPrefixPb . date('dmY') . $noPrefixPb;

        $dataBooking = [
            "kd_pu" => $kdPu,
            "kd_booking" => $kd_booking,
            "username" => $datauser['user']['username'],
            'total_paket' => $totalpaket,
            'total_jamaah' => $jamaah,
            'status' => 'N'
        ];

        // dd($dataBooking);

        $this->Prefix->update('3', ['numb' => (int)$prefixPb['numb'] + 1]);

        $insBooking = $this->PuBooking->save($dataBooking);

        for ($i = 1; $i <= $jamaah; $i++) {
            // Ktp

            $nama = trim($this->request->getPost('nama' . $i));
            $nik = trim($this->request->getPost('nik' . $i));
            $sex = $this->request->getPost('sex' . $i);
            $address = trim($this->request->getPost('address' . $i));
            $nationality = trim($this->request->getPost('national' . $i));
            $pob = trim($this->request->getPost('pob' . $i));
            $dob = $this->request->getPost('dob' . $i);

            $filektp = $this->request->getFile('ktp' . $i);

            $prefixJa = $this->Prefix->find('4');

            if ($prefixJa) {
                $headPrefixJa = $prefixJa['head'];
                $noPrefixJa = $prefixJa['numb'];
                $noPrefixJa = (strlen($noPrefixJa) == 1) ? "0" . $noPrefixJa : $noPrefixJa;

                $kd_jamaah = $headPrefixJa . date('dmY') . $noPrefixJa;
            } else {
                $kd_jamaah = "";
            }

            $updPrefixJa = $this->Prefix->update('4', ['numb' => $prefixJa['numb'] + 1]);

            if (!$updPrefixJa) {
                return redirect()->to(base_url() . '/adminuser/paketumrah')->with('prefix', 'prefixnotupdate');
            }

            if (!$filektp->hasMoved()) {
                $newNameKtp = explode('.', $filektp->getName());
                $newNameKtp = $newNameKtp[0] . now() . '.' . $newNameKtp[1];

                $filektp->move('public/upload/ktp', $newNameKtp);
            }

            $dataJamaah = [
                'kd_jamaah' => $kd_jamaah,
                'kd_booking' => $kd_booking,
                'nama' => $nama,
                'pob' => $pob,
                'dob' => $dob,
                'address' => $address,
                'nationality' => $nationality,
                'nik' => $nik,
                'sex' => $sex,
                'img_ktp' => $newNameKtp,
            ];

            $insJamaah = $this->PuJamaah->save($dataJamaah);

            if (!$insJamaah) {
                $this->PuBooking->where('kd_booking', $dataBooking['kd_booking'])->delete();

                return redirect()->to(base_url() . '/umrah' . '/' . $kdPu)->with('pesan', 'inputjamaaherror');
            }

            // Passpor

            $filepaspor = $this->request->getFile('paspor' . $i);
            $nopas = trim($this->request->getPost('nopas' . $i));
            $akhirpas = $this->request->getPost('akhirpas' . $i);
            $namapas = trim($this->request->getPost('namapas' . $i));
            $dobpas = $this->request->getPost('dobpas' . $i);
            $tipepas = $this->request->getPost('tipepas' . $i);
            $nationalitypas = trim($this->request->getPost('nationalitypas' . $i));
            $mrzpas = trim($this->request->getPost('mrzpas' . $i));

            if (!$filepaspor->hasMoved()) {
                $newNamePass = explode('.', $filepaspor->getName());
                $newNamePass = 'MRZ_' . date('dmY_his') . '.' . $newNamePass[1];

                $filepaspor->move('public/upload/pass', $newNamePass);
            }

            $dataJamaahPaspor = [
                'kd_jamaah' => $kd_jamaah,
                'kd_booking' => $kd_booking,
                'no_paspor' => $nopas,
                'nama' => $namapas,
                'tipe' => $tipepas,
                'dob' => $dobpas,
                'nationality' => $nationalitypas,
                'sex' => $sex,
                'tgl_berakhir' => $akhirpas,
                'image' => $newNamePass,
                'kd_mrz' => $mrzpas
            ];

            $insJamaahPaspor = $this->PuJamaahPaspor->save($dataJamaahPaspor);

            if (!$insJamaahPaspor) {
                $this->PuBooking->where('kd_booking', $dataBooking['kd_booking'])->delete();

                return redirect()->to(base_url() . '/umrah' . '/' . $kdPu)->with('pesan', 'inputjamaaherror');
            }

            // Harga
            $harga = $this->request->getPost('harga' . $i);

            $harga = explode("_", $harga);

            $hargaTipe = $harga[0];
            $hargaRp = $harga[1];

            $dataJamaahHarga = [
                'kd_jamaah' => $kd_jamaah,
                'kd_booking' => $kd_booking,
                'tipe' => $hargaTipe,
                'harga' => $hargaRp
            ];

            $insJamaahHarga = $this->PuJamaahHarga->save($dataJamaahHarga);

            if (!$insJamaahHarga) {
                $this->PuBooking->where('kd_booking', $dataBooking['kd_booking'])->delete();

                return redirect()->to(base_url() . '/umrah' . '/' . $kdPu)->with('pesan', 'inputjamaaherror');
            }
        }

        if ($insBooking) {
            $puRemaining = $this->PuRemaining->where('kd_pu', $kdPu)->first();

            $updRemaining = $this->PuRemaining->set('remaining', $puRemaining['remaining'] - $totalpaket)->where('kd_pu', $kdPu)->update();

            if ($updRemaining) {
                return redirect()->to(base_url() . '/umrah/checkout/' . $dataBooking['kd_booking']);
            } else {
                return redirect()->to(base_url() . '/umrah' . '/' . $kdPu)->with('pesan', 'updateremaining');
            }
        } else {
            $this->PuJamaah->where('kd_booking', $noPrefixPb)->delete();
            return redirect()->to(base_url() . '/umrah' . '/' . $kdPu)->with('pesan', 'inputbookingerror');
        }
    }

    public function checkout($kd_booking)
    {

        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];
        // dd(JSON_ERROR_NONE);
        if ($data['ceklogin']['logged_in'] == true) {
            $puBooking = $this->PuBooking->where('kd_booking', $kd_booking)->first();

            if ($puBooking) {
                $data['pb'] = $puBooking;

                if ($puBooking['status'] == "N") {
                    $usUser = $this->UsUserData->select('name')->where('username', $puBooking['username'])->first();

                    $puPaket = $this->PuPaket->where('kd_pu', $puBooking['kd_pu'])->first();

                    $puJamaahHarga = $this->PuJamaahHarga->selectSum('harga')->where('kd_booking', $kd_booking)->findAll();
                    // dd($puJamaah);

                    if ($usUser && $puPaket && $puJamaahHarga > 0) {
                        $data['ud'] = $usUser;
                        $data['pp'] = $puPaket;
                        $data['harga'] = $puJamaahHarga;
                        // dd($data);

                        return view('Catalog/Umrah/umrahcheckout', $data);
                    } else {
                        return view('errors/html/error_404.php', ['message' => 'Kode Booking Jamaah paket umrah tidak tersedia']);
                    }
                } else {
                    return redirect()->to(base_url() . '/umrah/confirm/' . $kd_booking);
                }
            } else {
                return view('errors/html/error_404.php', ['message' => 'Kode Booking paket umrah tidak tersedia']);
            }
        } else {
            return redirect()->to(base_url() . '/user/login')->with('checkout', 'checkout');
        }
    }

    public function infoJamaah($kd_booking)
    {
        $puJamaah = $this->PuJamaah->where('kd_booking', $kd_booking)->findAll();

        $puJamaahPaspor = $this->PuJamaahPaspor->select('no_paspor, image')->where('kd_booking', $kd_booking)->findAll();

        $puJamaahHarga = $this->PuJamaahHarga->select('tipe, harga')->where('kd_booking', $kd_booking)->findAll();

        for ($i = 0; $i < count($puJamaah); $i++) {
            foreach ($puJamaahPaspor as $key => $value) {
                // d($puJamaahPaspor[$i]);
                if ($key == $i) {
                    foreach ($puJamaahPaspor[$i] as $key => $value) {
                        $puJamaah[$i][$key] = $value;
                    }
                }
            }
        }

        for ($i = 0; $i < count($puJamaah); $i++) {
            foreach ($puJamaahHarga as $key => $value) {
                // d($puJamaahHarga[$i]);
                if ($key == $i) {
                    foreach ($puJamaahHarga[$i] as $key => $value) {
                        $puJamaah[$i][$key] = $value;
                    }
                }
            }
        }

        $data['data'] = $puJamaah;

        echo json_encode($data);
    }

    public function payment()
    {
        //  Status
        // 1. N = Belum upload bukti pembayaran
        // 2. U = Sudah upload bukti pembayaran tetapi belum di konfirmasi admin
        // 3. Y = Sudah di konfirmasi oleh admin

        $kd_booking = $this->request->getPost('kdBooking');

        $filePayment = $this->request->getFile('payment');

        if (!$filePayment->hasMoved()) {
            $newNamePayment = explode('.', $filePayment->getName());
            $newNamePayment = "PAY_" . $kd_booking . '_' . date('dmY_his') . '.' . $newNamePayment[1];

            if ($filePayment->move('public/upload/payment', $newNamePayment)) {
                $insPayment = $this->PuPayment->save([
                    "kd_booking" => $kd_booking,
                    "img_proof_payment" => $newNamePayment
                ]);

                if ($insPayment) {
                    $updStatBook = $this->PuBooking->set('status', 'U')->where('kd_booking', $kd_booking)->update();

                    if ($updStatBook) {

                        return redirect()->to(base_url() . '/umrah/confirm/' . $kd_booking)->with('pesan', 'uploadbuktisukses');
                    } else {
                        $this->PuPayment->where('kd_booking', $kd_booking)->delete();

                        return redirect()->to(base_url() . '/umrah/checkout/' . $kd_booking)->with('pesan', 'uploadbuktigagal');
                    }
                } else {
                    return redirect()->to(base_url() . '/umrah/checkout/' . $kd_booking)->with('pesan', 'uploadbuktigagal');
                }
            }
        }
    }

    public function confirm($kd_booking)
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        if ($data['ceklogin']['logged_in'] == true) {
            $puBooking = $this->PuBooking->where('kd_booking', $kd_booking)->first();

            if ($puBooking) {
                $puPaket = $this->PuPaket->select('nama, tgl_berangkat, tgl_pulang')->where('kd_pu', $puBooking['kd_pu'])->first();

                $usUser = $this->UsUserData->where('username', $puBooking['username'])->first();

                if ($puPaket && $usUser) {

                    $data['pb'] = $puBooking;
                    $data['pp'] = $puPaket;
                    $data['ud'] = $usUser;

                    return view('Catalog/Umrah/umrahkonfirmasi', $data);
                } else {
                }
            } else {
            }
        } else {
            return redirect()->to(base_url() . '/user/login')->with('checkout', 'checkout');
        }
    }

    public function paymentonline()
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            "script" => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        return view('Catalog/Umrah/umrahpaymentonline', $data);
    }

    public function bookingPaket()
    {
        // dd($this->request->getFile('file'));

        $idPaket = $this->request->getVar('id_paket');
        $kdBooking = 'PU' . date('dmY') . rand(10000000, 99999999);
        $nama = trim($this->request->getVar('nama'));
        $noPass = trim($this->request->getVar('passport'));
        $sex = trim($this->request->getVar('sex'));
        $alamat = trim($this->request->getVar('address'));
        $national = trim($this->request->getVar('national'));
        $pob = trim($this->request->getVar('pob'));
        $dob = trim($this->request->getVar('dob'));
        $hp = trim($this->request->getVar('hp'));
        $email = trim($this->request->getVar('email'));

        $filePass = $this->request->getFile('file');

        $data = [
            'idPaket' => $idPaket,
            'kdBooking' => $kdBooking
        ];

        if (!$filePass->hasMoved()) {
            $namaFile = explode('.', $filePass->getName());
            $namaFile = $namaFile[0] . '_' . date('dmY_his') . '.' . $namaFile[1];

            $filePass->move('public/upload/pass', $namaFile);
        }

        $user = $this->db->query("INSERT INTO pu_booking VALUES ('', '$idPaket', '$kdBooking', '$nama', '$noPass', '$sex', '$alamat', '$national', '$pob', '$dob', '$hp', '$email', '$namaFile')");

        if ($user) {
            session()->setFlashdata('pesan', 'umrah sukses');
            return redirect()->to(base_url() . '/umrah/bookingBukti/' . $data['idPaket'] . '/' . $data['kdBooking']);
        } else {
            session()->setFlashdata('pesan', 'umrah gagal');
            return redirect()->to('/umrah');
        }
    }

    public function bookingBukti($idPaket, $kdBooking)
    {
        $dataPU = $this->db->query("SELECT * FROM pu_paket WHERE id = $idPaket
        ")->getRow();
        $dataBooking = $this->db->query("SELECT * FROM pu_booking WHERE kd_booking = '$kdBooking'
        ")->getRow();

        $dataBook = [
            'pu' => $dataPU,
            'book' => $dataBooking
        ];

        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            "data" => $dataBook,
            'ceklogin' => ceklogin()
        ];

        return view('Catalog/buktibooking', $data);
    }


    public function paspor()
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        return view('mrzreader', $data);
    }

    public function mrz()
    {

        // $linkfile = urlencode(base_url() . "/public/upload/mrz");
        // $linkfile = base64_encode(base_url() . "/public/upload/mrz");

        // $data = [
        //     'status' => "sukses",
        //     "file" => $_FILES['file']
        // ];

        $validator = [
            'file' => [
                'rules' => 'max_size[file,2048]|is_image[file]|mime_in[file,image/jpg,image/png,image/jpeg]',
                "errors" => [
                    'max_size' => 'Ukuran gambar harus dibawah 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ];

        if (!$this->validate($validator)) {
            $data = [
                'status' => 'gagal',
                'error' => $this->validator->getErrors()
            ];
        } else {
            $filePas = $this->request->getFile('file');

            if (!$filePas->hasMoved()) {
                $namaFile = explode('.', $filePas->getName());
                $namaFile = 'MRZ_' . date('dmY_his') . '.' . $namaFile[1];

                $filePas->move('public/upload/mrz', $namaFile);
            }

            $dataMrz = $this->reader($namaFile);

            $data = [
                'status' => 'sukses',
                'namafile' => $namaFile,
                'data' => $dataMrz
            ];
        }

        echo json_encode($data);
    }

    private function reader($namaFile)
    {
        // require './vendor/autoload.php';

        /**
         * path to file
         */
        $path = './public/upload/mrz/' . $namaFile;

        /**
         * token generated from profile
         */
        $token = "50838c10a1msh40ae01770f13904p155ec3jsn549ef900c6f7";

        /**
         * document type 'ktp', 'npwp', 'sim-2019'
         */
        // $type = 'ktp';

        $url = 'https://mrz-scanner.p.rapidapi.com/ScanMRZ';


        if (!$path) {
            throw new Error('path not set');
        }

        if (!$token) {
            throw new Error('path not set');
        }

        $client = new \GuzzleHttp\Client();

        $response = $client->request('POST', "$url", [
            'headers' => ['X-RapidAPI-Host' => "mrz-scanner.p.rapidapi.com", 'X-RapidAPI-Key' => "$token"],
            'multipart' => [
                [
                    'name'     => 'image',
                    'contents' => fopen($path, 'rb'),
                    'filename' => basename($path)
                ],
            ]
        ]);

        $dataOCR = $response->getBody()->getContents();

        return $dataOCR;

        // $curl = curl_init();

        // curl_setopt_array($curl, [
        //     CURLOPT_URL => "https://mrz-scanner.p.rapidapi.com/ScanMRZ",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_ENCODING => "",
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 30,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => "POST",
        //     CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"$namaFile\"\r\n\r\n\r\n-----011000010111000001101001--\r\n\r\n",
        //     CURLOPT_HTTPHEADER => [
        //         "X-RapidAPI-Host: mrz-scanner.p.rapidapi.com",
        //         "X-RapidAPI-Key: 50838c10a1msh40ae01770f13904p155ec3jsn549ef900c6f7",
        //         "content-type: multipart/form-data; boundary=---011000010111000001101001"
        //     ],
        // ]);

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     echo $response;
        // }
    }

    public function paketumrah()
    {
        $data = [
            "title" => "Umrah",
            "active" => "umrah",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'ceklogin' => ceklogin()
        ];

        $puPaket = $this->PuPaket;

        if (count($this->request->getPost()) != 0) {
            $periode = $this->request->getPost('periode');
            $tipe = $this->request->getPost('tipe');
            $peziarah = $this->request->getPost('peziarah');

            $periode = (strlen($periode) == 1) ? "0" . $periode : $periode;

            // dd($periode);

            $pp = "";

            if ($periode != "all" || $tipe != "all" || $peziarah != "all") {
                if ($periode != "all") {
                    $puPaket->like('tgl_berangkat', "%-$periode-%");
                }

                if ($tipe != "all") {
                    $puPaket->like('tipe', $tipe);
                }

                if ($peziarah != "all") {
                    $puPaket->like('peziarah', $peziarah);
                }

                $pp = $puPaket->findAll();
            } else {
                $pp = $puPaket->findAll();
            }

            $data['pp'] = $pp;
            $data['jumlahpaket'] = count($pp);
            // dd($data);

        } else {
            $pp = $puPaket->findAll();
            $data['pp'] = $pp;
            $data['jumlahpaket'] = count($pp);
        }
        return view('Catalog/Umrah/umrahall', $data);
    }
}
