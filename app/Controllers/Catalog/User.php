<?php

namespace App\Controllers\Catalog;

use App\Controllers\BaseController;
use App\Models\UserDataModel;
use App\Models\UserModel;
use CodeIgniter\Files\File;
use Faker\Guesser\Name;

class User extends BaseController
{
    protected $UserModel;
    protected $UserDataModel;
    protected $helpers = ['form'];
    protected $db;
    protected $UserLogin;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->UserDataModel = new UserDataModel();

        helper('cookie');
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
    }

    public function role()
    {
        $data = [
            "title" => "Pendaftaran",
            "active" => "home",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'validation' => \Config\Services::validation()
        ];

        // $db = \Config\Database::connect();
        // $user = $db->query("SELECT * FROM us_user_data");
        // foreach ($user->getResultArray() as $key) {
        //     d($key);
        // }

        // $Muser = new \App\Models\MUser();

        // $MUser = new UserModel();
        // $user = $this->UserModel->findAll();

        // d($user);

        return view('Pengguna/peran', $data);
    }

    private function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setTo($to);
        $email->setSubject($subject);
        $email->setMessage($message);
        $data = [];
        if ($email->send()) {
            $data = [
                'msg' => 'sukses',
                'error' => false
            ];
        } else {
            $data = [
                'msg' => 'gagal',
                'error' => $email->printDebugger()
            ];
        }

        echo json_encode($data);
    }

    public function registration($role)
    {
        $data = [
            "title" => "Pendaftaran",
            "active" => "home",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'validation' => \Config\Services::validation(),
        ];

        if ($role === 'agent' || $role === 'individual') {
            $data['role'] = $role;
        } else {
            return view('errors/html/error_404', ['message' => 'Halaman tidak ditemukan']);
        }
        // dd($role, $data);
        return view('Pengguna/daftar', $data);
    }

    private function generateRandomKode($length = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function generateRandomNumb($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function concatCekReferral($kode)
    {

        $dataCekRef = $this->UserModel->select('kd_referral')->findAll();

        for ($i = 0; $i < count($dataCekRef); $i++) {
            if ($kode == $dataCekRef[$i]['kd_referral']) {
                $this->concatCekReferral($this->generateRandomKode(6));
            }
        }

        return $kode;
    }

    public function inputRegist()
    {
        // dd($this->request->getVar());

        if (!$this->validate([
            'username' => [
                'rules' => 'required|is_unique[us_user.username]',
                'errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ], 'password' => [
                'rules' => 'required|min_length[4]',
                'errors' => [
                    'required' => 'Password harus diisi',
                    'min_length' => 'Password minimal 4 karakter'
                ]
            ], 'password2' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Password Konfirmasi harus diisi',
                    'matches' => 'Password Konfirmasi harus sama dengan Password'
                ]
            ],
        ])) {
            $direct = ($this->request->getVar('role') == "agent" ? "agent" : "individual");
            $validation = \Config\Services::validation();
            return redirect()->to(base_url() . "/user" . '/' . $direct)->withInput()->with('validation', $validation);
        } else {

            $kd_referral = $this->concatCekReferral($this->generateRandomKode(6));

            $dataUser = [
                'username' => trim($this->request->getVar('username')),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'kd_referral' => $kd_referral,
                'role_id' => ($this->request->getVar('role') == "agent" ? "AGN" : "IND")
            ];

            if ($this->request->getVar('email')) {
                $validate = [
                    'email' => [
                        'rules' => 'is_unique[us_user.email]|valid_email',
                        'errors' => [
                            'is_unique' => 'Email sudah terdaftar',
                            'valid_email' => 'Email tidak valid'
                        ]
                    ]
                ];
                if (!$this->validate($validate)) {
                    $direct = ($this->request->getVar('role') == "agent" ? "agent" : "individual");
                    $validation = \Config\Services::validation();
                    return redirect()->to(base_url() . "/user" . '/' . $direct)->withInput()->with('validation', $validation);
                } else {
                    $dataUser['email'] = $this->request->getVar('email');
                }
            } else if ($this->request->getVar('hp')) {
                $validate = [
                    'hp' => [
                        'rules' => 'is_unique[us_user.hp]|numeric',
                        'errors' => [
                            'is_unique' => 'No. telepon sudah terdaftar',
                            'numeric' => 'No. telepon tidak valid'
                        ]
                    ]
                ];
                if (!$this->validate($validate)) {
                    $direct = ($this->request->getVar('role') == "agent" ? "agent" : "individual");
                    $validation = \Config\Services::validation();
                    return redirect()->to(base_url() . "/user" . '/' . $direct)->withInput()->with('validation', $validation);
                } else {
                    $dataUser['hp'] = $this->request->getVar('hp');
                }
            }

            // dd($dataUser);

            if ($this->request->getVar('role') == "agent") {
                $dataUser['status_approval'] = 'N';
            }

            if ($this->request->getVar('referral') != "") {
                $inpReferral = $this->request->getVar('referral');
                $dataCekSbRef = $this->UserModel->select('kd_referral')->findAll();
                $box = [];

                for ($i = 0; $i < count($dataCekSbRef); $i++) {
                    $box[] = $dataCekSbRef[$i]['kd_referral'];
                }

                if (in_array($inpReferral, $box)) {
                    $dataUser['sb_referral'] = $inpReferral;
                } else {
                    return redirect()->to(base_url() . '/user/individual/')->with('pesan', 'kdref')->withInput();
                }
            }

            // dd($dataUser);

            $insUser = $this->UserModel->save($dataUser);

            if ($insUser === true) {
                $insUserData = $this->UserDataModel->save([
                    'username' => trim($this->request->getVar('username')),
                    'name' => trim($this->request->getVar('nama')),
                    'nik' => trim($this->request->getVar('nik')),
                    'sex' => $this->request->getVar('sex'),
                    'address' => trim($this->request->getVar('address')),
                    'nationality' => trim($this->request->getVar('national')),
                    'pob' => trim($this->request->getVar('pob')),
                    'dob' => trim($this->request->getVar('dob')),
                    'image' => 'user.png',
                ]);

                if ($insUserData === true) {
                    $pesan = ($this->request->getVar('role') == "agent" ? "suksesagent" : "suksesindi");
                    session()->setFlashdata('pesan', $pesan);
                    return redirect()->to(base_url());
                } else {
                    $this->UserModel->where('username', $this->request->getVar('username'))->delete();
                    session()->setFlashdata('pesan', 'gagal');
                    return redirect()->to(base_url());
                }
            } else {
                session()->setFlashdata('pesan', 'gagal');
                return redirect()->to(base_url());
            }
        }
    }

    public function login()
    {
        $data = [
            "title" => "Login",
            "active" => "home",
            'script' => "<script src='" . base_url() . "/public/asset/js/script.js'></script>",
            'validation' => \Config\Services::validation()
        ];

        return view('Pengguna/login', $data);
    }

    private function sessLogin($data, $status, $msg)
    {
        if ($status == "sukses") {
            $dataSes = [
                'username'  => $data['username'],
                'key'     => password_hash($data['id'], PASSWORD_DEFAULT),
                'logged_in' => true,
            ];
            session()->set($dataSes);
        }

        session()->setFlashdata('user', $msg);
    }

    private function cookLogin($data, $remember)
    {
        if ($remember != "") {
            set_cookie([
                'name' => 'id',
                'value' => $data['id'],
                'expire' => 60,
                'httponly' => false
            ]);
            set_cookie([
                'name' => 'hashwonder',
                'value' => password_hash($data['username'], PASSWORD_DEFAULT),
                'expire' => 60,
                'httponly' => false
            ]);
        }
    }

    public function cekLogin()
    {
        $userLogin = trim($this->request->getVar('id'));
        $password = trim($this->request->getVar('password'));

        if ($this->request->getVar('remember')) {
            $remember = $this->request->getVar('remember');
        } else {
            $remember = "";
        }

        // dd($remember);

        $username = $this->UserModel->where('username', $userLogin)->first();
        $email = $this->UserModel->where('email', $userLogin)->first();
        $hp = $this->UserModel->where('hp', $userLogin)->first();

        if ($username) {
            if (password_verify($password, $username['password'])) {
                if ($username['role_id'] === 'AGN') {
                    if ($username['status_approval'] === 'Y') {
                        $this->cookLogin($username, $remember);
                        $this->sessLogin($username, 'sukses', 'Slogin');
                        return redirect()->to(base_url() . '/')->withCookies();
                    } else {
                        $this->sessLogin($username, 'gagal', 'Gstatus');
                        return redirect()->to(base_url() . '/user/login');
                    }
                } else {
                    $this->cookLogin($username, $remember);
                    $this->sessLogin($username, 'sukses', 'Slogin');
                    return redirect()->to(base_url() . '/')->withCookies();
                }
            } else {
                $this->sessLogin($username, 'gagal', 'Gpass');
                return redirect()->to(base_url() . '/user/login');
            }
        } else if ($email) {
            if (password_verify($password, $email['password'])) {
                if ($email['role_id'] === 'AGN') {
                    if ($email['status_approval'] === 'Y') {

                        $this->cookLogin($email, $remember);
                        $this->sessLogin($email, 'sukses', 'Slogin');
                        return redirect()->to(base_url() . '/')->withCookies();
                    } else {
                        $this->sessLogin($email, 'gagal', 'Gstatus');
                        return redirect()->to(base_url() . '/user/login');
                    }
                } else {

                    $this->cookLogin($email, $remember);
                    $this->sessLogin($email, 'sukses', 'Slogin');
                    return redirect()->to(base_url() . '/')->withCookies();
                }
            } else {
                $this->sessLogin($email, 'gagal', 'Gpass');
                return redirect()->to(base_url() . '/user/login');
            }
        } else if ($hp) {
            if (password_verify($password, $hp['password'])) {
                if ($hp['role_id'] === 'AGN') {
                    if ($hp['status_approval'] === 'Y') {

                        $this->cookLogin($hp, $remember);
                        $this->sessLogin($hp, 'sukses', 'Slogin');
                        return redirect()->to(base_url() . '/')->withCookies();
                    } else {
                        $this->sessLogin($hp, 'gagal', 'Gstatus');
                        return redirect()->to(base_url() . '/user/login');
                    }
                } else {

                    $this->cookLogin($hp, $remember);
                    $this->sessLogin($hp, 'sukses', 'Slogin');
                    return redirect()->to(base_url() . '/')->withCookies();
                }
            } else {
                $this->sessLogin($hp, 'gagal', 'Gpass');
                return redirect()->to(base_url() . '/user/login');
            }
        } else {
            $this->sessLogin('', 'gagal', 'Gid');
            return redirect()->to(base_url() . '/user/login');
        }
    }

    public function logout()
    {
        session()->remove(['username', 'key']);
        session()->set('logged_in', false);

        if (get_cookie('id') && get_cookie('hashwonder')) {
            delete_cookie('id');
            delete_cookie('hashwonder');
        }

        return redirect()->to(base_url() . '/')->with('logout', 'sukses')->withCookies();
    }

    public function uploadKTP()
    {
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
            $fileKTP = $this->request->getFile('file');

            if (!$fileKTP->hasMoved()) {
                $namaFile = explode('.', $fileKTP->getName());
                $namaFile = "OCR" . '_' . date('dmY_his') . '.' . $namaFile[1];

                $fileKTP->move('public/upload/ocr', $namaFile);
            }

            // $filepath = $fileKTP->store('public/secret', $namaFile);

            $dataOCR = $this->ocrKTP($namaFile);

            $data = [
                'status' => 'sukses',
                'namafile' => $namaFile,
                'data' => $dataOCR
            ];
        }

        echo json_encode($data);
    }

    public function ocrKTP($file)
    {
        require './vendor/autoload.php';

        /**
         * path to file
         */
        $path = './public/upload/ocr/' . $file;

        /**
         * token generated from profile
         */
        $token = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ0eXBlIjoiVVNFUiIsImlkIjoyODUsImtleSI6NTA2MTQyNDA0LCJpYXQiOjE2NjgzOTQxODZ9.m49YJ1cYF4C08PBvg_MmcZy1CGizDT7BoB4K1mZ6nK0";

        /**
         * document type 'ktp', 'npwp', 'sim-2019'
         */
        $type = 'ktp';

        $url = 'https://api.aksarakan.com/document';


        if (!$path) {
            throw new Error('path not set');
        }

        if (!$token) {
            throw new Error('path not set');
        }

        $client = new \GuzzleHttp\Client();

        $response = $client->request('PUT', "$url/$type", [
            'headers' => ['Authentication' => "bearer $token"],
            'multipart' => [
                [
                    'name'     => 'file',
                    'contents' => fopen($path, 'rb'),
                    'filename' => basename($path)
                ],
            ]
        ]);

        $dataOCR = $response->getBody()->getContents();

        return $dataOCR;
    }
}
