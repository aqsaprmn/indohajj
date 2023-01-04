<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\NoPrefix;
use App\Models\PuJamaah;
use App\Models\PuJamaahHarga;
use App\Models\PuJamaahPaspor;
use App\Models\PuPaket;
use App\Models\PuPayment;
use App\Models\PuRemaining;
use Config\Services;

class PaketUmrah extends BaseController
{
    protected $PuPaket;
    protected $prefix;
    protected $PuRemaining;
    protected $PuPayment;
    protected $PuJamaah;
    protected $PuJamaahPaspor;
    protected $PuJamaahHarga;
    public function __construct()
    {
        $this->PuPaket  = new PuPaket();
        $this->prefix = new NoPrefix();
        $this->PuRemaining = new PuRemaining();
        $this->PuPayment = new PuPayment();
        $this->PuJamaah = new PuJamaah();
        $this->PuJamaahPaspor = new PuJamaahPaspor();
        $this->PuJamaahHarga = new PuJamaahHarga();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Paket Umrah',
        ];

        $puPaket = $this->PuPaket->where('status', "Y")->findAll();
        $data['pp'] = $puPaket;

        // dd($data);

        return view('Admin/Umrah/list', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Paket Umrah',
            'validation' => \Config\Services::validation()
        ];

        return view('Admin/Umrah/add', $data);
    }

    public function insert()
    {
        $validate = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi'
                ]
            ]

        ];

        // dd($this->request->getPost());

        if (!$this->validate($validate)) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/adminuser/paketumrah/add/')->withInput()->with('validation', $validation);
        } else {
            $nama = trim($this->request->getPost('nama'));
            $subnama = trim($this->request->getPost('subnama'));
            $tipe = $this->request->getPost('tipe');
            $tgl_berangkat = $this->request->getPost('tgl_berangkat');
            $tgl_pulang = $this->request->getPost('tgl_pulang');
            $lamaperjalanan = $this->request->getPost('perjalanan');
            $rute = trim($this->request->getPost('rute'));
            $peziarah = $this->request->getPost('jamaah');
            $harga_double = trim($this->request->getPost('hargadouble'));
            $harga_triple = trim($this->request->getPost('hargatriple'));
            $harga_quad = trim($this->request->getPost('hargaquad'));
            $reservasi = trim($this->request->getPost('reservasi'));
            $jMakkah = $this->request->getPost('jMakkah');
            $jMadinah = $this->request->getPost('jMadinah');

            $catatan = trim($this->request->getPost('catatan'));

            $prefix = $this->prefix->where('prefix_cd', 'PUM')->first();

            $prefixHead = $prefix['head'];
            $prefixNumb = (strlen($prefix['numb']) == 1) ? "0" . $prefix['numb'] : $prefix['numb'];

            $kdPu = $prefixHead . date('dmY') . $prefixNumb;

            $data = [
                'kd_pu' => $kdPu,
                'nama' => $nama,
                'sub_nama' => $subnama,
                'tipe' => $tipe,
                'tgl_berangkat' => $tgl_berangkat,
                'tgl_pulang' => $tgl_pulang,
                'lama_perjalanan' => $lamaperjalanan,
                'rute' => $rute,
                'j_makkah' => $jMakkah,
                'j_madinah' => $jMadinah,
                'peziarah' => $peziarah,
                'harga_double' => $harga_double,
                'harga_triple' => $harga_triple,
                'harga_quad' => $harga_quad,
                'reservasi' => $reservasi,
                'catatan' => $catatan,
                'populer' => "N",
                'status' => "Y",
                'draft' => "N"
            ];

            if ($this->request->getPost('penerbangan')) {
                $data['penerbangan'] = $this->request->getPost('penerbangan');
                $data['maskapai'] = $this->request->getPost('maskapai');
            } else {
                $data['penerbangan'] = "N";
                $data['maskapai'] = "-";
            }

            ($this->request->getPost('visa')) ? $data['visa'] = $this->request->getPost('visa') : $data['visa'] = "N";

            ($this->request->getPost('hotel')) ? $data['hotel'] = $this->request->getPost('hotel') : $data['hotel'] = "N";

            ($this->request->getPost('trasportasi')) ? $data['trasportasi'] = $this->request->getPost('trasportasi') : $data['trasportasi'] = "N";

            if ($this->request->getFile('image')->getError() === 0) {
                $image = $this->request->getFile('image');
                $newImage = explode('.', $image->getName());
                $newImage = "PU_" . date('dmY_his') . '.' . $newImage[1];

                $image->move('public/menu/paketumrah', $newImage);

                if ($image->hasMoved()) {
                    $data['gambar'] = $newImage;
                }
            } else {
                $data['gambar'] = "";
            }

            // dd($data);

            $insPuPaket = $this->PuPaket->insert($data);

            if ($insPuPaket) {
                $insPuRemaining = $this->PuRemaining->save(['kd_pu' => $kdPu, 'remaining' => 10]);

                if ($insPuRemaining) {
                    $this->prefix->set('numb', (int)$prefix['numb'] + 1)->where('prefix_cd', "PUM")->update();
                    return redirect()->to(base_url() . "/adminuser/paketumrah")->with('pesan', 'inputpaketsukses');
                } else {
                    return redirect()->to(base_url() . "/adminuser/paketumrah/add")->with('pesan', 'inputremaininggagal');
                }
            } else {
                return redirect()->to(base_url() . "/adminuser/paketumrah/add")->with('pesan', 'inputpaketgagal');
            }
        }
    }

    public function delete($id)
    {
        $puPaket = $this->PuPaket->find($id);
        // $puRemaining = $this->PuRemaining->where('kd_pu', $puPaket['kd_pu'])->first();

        if ($puPaket) {
            $delPuPaket = $this->PuPaket->delete($id);

            if ($delPuPaket) {
                $delPuRemaining = $this->PuRemaining->where('kd_pu', $puPaket['kd_pu'])->delete();

                if ($delPuRemaining) {
                    return redirect()->to(base_url() . '/adminuser/paketumrah')->with('pesan', 'suksesdeletepu');
                } else {
                    return redirect()->to(base_url() . '/adminuser/paketumrah')->with('pesan', 'gagaldeleteremaining');
                }
            } else {
                return redirect()->to(base_url() . '/adminuser/paketumrah')->with('pesan', 'gagaldeletepu');
            }
        } else {
            return redirect()->to(base_url() . '/adminuser/paketumrah')->with('pesan', 'notdatapaket');
        }
    }

    public function edit($kd_pu)
    {
        $data = [
            'title' => 'Edit Paket Umrah',
            'validation' => \Config\Services::validation(),
            'pp' => $this->PuPaket->where('kd_pu', $kd_pu)->first()
        ];

        // dd($data);
        return view('Admin/Umrah/edit', $data);
    }

    public function update()
    {
        // d($this->request->getPost());
        // dd($this->request->getFile('image'));

        // d(PUBLICPATH);
        // d(APPPATH);
        // d(ROOTPATH);
        // d(SYSTEMPATH);
        // dd(FCPATH);

        $validate = [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi'
                ]
            ]

        ];

        if (!$this->validate($validate)) {
            $validation = \Config\Services::validation();

            return redirect()->to(base_url() . '/adminuser/paketumrah/edit/')->withInput()->with('validation', $validation);
        } else {
            $kdPu = $this->request->getPost('kd_pu');

            $puPaket = $this->PuPaket->where('kd_pu', $kdPu)->first();

            $nama = trim($this->request->getPost('nama'));
            $subnama = trim($this->request->getPost('subnama'));
            $tipe = $this->request->getPost('tipe');
            $tgl_berangkat = $this->request->getPost('tgl_berangkat');
            $tgl_pulang = $this->request->getPost('tgl_pulang');
            $lamaperjalanan = $this->request->getPost('perjalanan');
            $rute = trim($this->request->getPost('rute'));
            $peziarah = $this->request->getPost('jamaah');
            $harga_double = trim($this->request->getPost('hargadouble'));
            $harga_triple = trim($this->request->getPost('hargatriple'));
            $harga_quad = trim($this->request->getPost('hargaquad'));
            $reservasi = trim($this->request->getPost('reservasi'));
            $jMakkah = $this->request->getPost('jMakkah');
            $jMadinah = $this->request->getPost('jMadinah');

            $catatan = trim($this->request->getPost('catatan'));

            $data = [
                'nama' => $nama,
                'sub_nama' => $subnama,
                'tipe' => $tipe,
                'tgl_berangkat' => $tgl_berangkat,
                'tgl_pulang' => $tgl_pulang,
                'lama_perjalanan' => $lamaperjalanan,
                'rute' => $rute,
                'j_makkah' => $jMakkah,
                'j_madinah' => $jMadinah,
                'peziarah' => $peziarah,
                'harga_double' => $harga_double,
                'harga_triple' => $harga_triple,
                'harga_quad' => $harga_quad,
                'reservasi' => $reservasi,
                'catatan' => $catatan,
            ];

            if ($this->request->getPost('penerbangan')) {
                $data['penerbangan'] = $this->request->getPost('penerbangan');
                $data['maskapai'] = $this->request->getPost('maskapai');
            } else {
                $data['penerbangan'] = "N";
                $data['maskapai'] = "-";
            }

            ($this->request->getPost('visa')) ? $data['visa'] = $this->request->getPost('visa') : $data['visa'] = "N";

            ($this->request->getPost('hotel')) ? $data['hotel'] = $this->request->getPost('hotel') : $data['hotel'] = "N";

            ($this->request->getPost('trasportasi')) ? $data['trasportasi'] = $this->request->getPost('trasportasi') : $data['trasportasi'] = "N";

            if ($this->request->getFile('image')->getError() === 0) {
                $image = $this->request->getFile('image');

                if (!$image->hasMoved()) {
                    $newImage = explode('.', $image->getName());
                    $newImage = "PU_" . date('dmY_his') . '.' . $newImage[1];

                    $image->move('public/menu/paketumrah', $newImage);

                    if ($image->hasMoved()) {
                        unlink(FCPATH . 'public/menu/paketumrah/' . $puPaket['gambar']);
                        $data['gambar'] = $newImage;
                    }
                }
            }
            // dd($data);

            $insPuPaket = $this->PuPaket->set($data)->where('kd_pu', $kdPu)->update();

            if ($insPuPaket) {
                return redirect()->to(base_url() . "/adminuser/paketumrah")->with('pesan', 'updatepusukses');
            } else {
                return redirect()->to(base_url() . "/adminuser/paketumrah/add")->with('pesan', 'updatepugagal');
            }
        }
    }

    public function remaining()
    {
        $data = [
            'title' => "Ketersediaan Paket",
            'script' => base_url('public/asset/js/remaining.js')
        ];

        $puPaket = $this->PuPaket->select('pu_paket.kd_pu, pu_paket.nama, pu_paket.tgl_berangkat, pu_paket_remaining.remaining')->join('pu_paket_remaining', 'pu_paket_remaining.kd_pu = pu_paket.kd_pu')->findAll();

        if ($puPaket) {
            $data['pp'] = $puPaket;
        }

        // dd($data);

        return view('Admin/Umrah/remaining', $data);
    }

    public function remainded()
    {
        $remaining = $this->request->getPost('remaining');
        $kd_pu = $this->request->getPost('kd_pu');

        $puRemaining = $this->PuRemaining->where('kd_pu', $kd_pu)->first();

        if ($puRemaining) {
            $updRemaining = $this->PuRemaining->where('kd_pu', $kd_pu)->set('remaining', $remaining)->update();

            if ($updRemaining) {
                return redirect()->to(base_url() . '/adminuser/paketumrah/remaining')->with('remaining', 'suksesupdate');
            } else {
                return redirect()->to(base_url() . '/adminuser/paketumrah/remaining')->with('remaining', 'gagalupdate');
            }
        } else {
            return redirect()->to(base_url() . '/adminuser/paketumrah/remaining')->with('remaining', 'nodata');
        }
    }

    public function statpop()
    {
        $data = [
            'title' => "Status & Populer Paket",
            'pp' => $this->PuPaket->select('kd_pu,nama,status,populer')->findAll()
        ];

        // dd($data);

        return view('Admin/Umrah/statpop', $data);
    }

    public function status($kdPu)
    {
        $puPaket = $this->PuPaket->where('kd_pu', $kdPu)->first();
        if ($puPaket) {
            if ($puPaket['status'] == "Y") {
                $updStatus = $this->PuPaket->set(['status' => "N"])->where('kd_pu', $kdPu)->update();

                if ($updStatus) {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Snonaktif');
                } else {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Gnonaktif');
                }
            } else {
                $updStatus = $this->PuPaket->set(['status' => "Y"])->where('kd_pu', $kdPu)->update();

                if ($updStatus) {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Saktif');
                } else {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Gaktif');
                }
            }
        } else {
            return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'nodata');
        }
    }

    public function populer($kdPu)
    {
        $puPaket = $this->PuPaket->where('kd_pu', $kdPu)->first();
        if ($puPaket) {
            if ($puPaket['populer'] == "Y") {
                $updPopuler = $this->PuPaket->set(['populer' => "N"])->where('kd_pu', $kdPu)->update();

                if ($updPopuler) {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Snonpopuler');
                } else {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Gnonpopuler');
                }
            } else {
                $updPopuler = $this->PuPaket->set(['populer' => "Y"])->where('kd_pu', $kdPu)->update();

                if ($updPopuler) {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Spopuler');
                } else {
                    return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'Gpopuler');
                }
            }
        } else {
            return redirect()->to(base_url() . '/adminuser/paketumrah/statpop/')->with('pesan', 'nodata');
        }
    }

    public function confirm()
    {
        $puPayment = $this->PuPayment->findAll();

        $data = [
            'title' => "Konfirmasi Pembayaran",
            'pp' => $puPayment
        ];

        return view('Admin/Umrah/payment', $data);
    }

    public function jamaah()
    {
        $puJamaah = $this->PuJamaah->findAll();
        $puJamaahPaspor = $this->PuJamaahPaspor->findAll();
        $puJamaahHarga = $this->PuJamaahHarga->findAll();

        $join = $this->PuJamaah->select('pu_jamaah.kd_jamaah, pu_jamaah.kd_booking, ')->join('pu_jamaah_paspor', 'pu_jamaah_paspor.kd_jamaah = pu_jamaah.kd_jamaah', 'inner')->join('pu_jamaah_harga', 'pu_jamaah_harga.kd_jamaah = pu_jamaah.kd_jamaah', 'inner')->findAll();

        dd($join);

        $data = [
            'title' => "Jamaah Umrah"
        ];
    }
}
