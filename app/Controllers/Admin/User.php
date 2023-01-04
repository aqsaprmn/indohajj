<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    private function sendMail($to, $subject, $message)
    {
        $email = \Config\Services::email();

        $email->setFrom('indohajjtrg@gmail.com', 'Indohajj Platform');
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

        return $data;
    }

    public function index()
    {
        $data = [
            'title' => 'Agent',
            'agent' => $this->UserModel->where('role_id', 'AGN')->findAll(),
        ];
        if (session()->getFlashdata('error')) {
            dd(session()->getFlashdata('error'));
        }

        return view('Admin/User/agent', $data);
    }
    public function approve($id = null)
    {
        $dataAgent = $this->UserModel->where('id', $id)->first();
        if ($dataAgent) {
            if ($dataAgent['status_approval'] == 'N') {
                $data = [
                    'status_approval' => 'Y'
                ];
                // dd($dataAgent);

                $updateStatus = $this->UserModel->where('id', $id)->set($data)->update();
                if ($updateStatus) {
                    session()->setFlashdata('agent', 'suksesap');


                    if ($dataAgent['email'] != "") {
                        $username = $dataAgent['username'];
                        $email = $dataAgent['email'];
                        $url = base_url() . '/user/login';
                        $message = "
                        Hi $username,
                        <br><br>
                        Akun anda dengan data sebagai berikut: \n
                        <table>
                            <tr>
                                <td>
                                    Username
                                </td>
                                <td>
                                    :
                                </td> 
                                <td>
                                    $username
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email
                                </td>
                                <td>
                                    :
                                </td> 
                                <td>
                                    $email
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Peran
                                </td>
                                <td>
                                    :
                                </td> 
                                <td>
                                    Agent
                                </td>
                            </tr>
                        </table>
                        \n
                        Akun anda telah disetujui oleh admin Indohajj, seilahkan melakukan login di platform, dengan klik link berikut <a href='$url'>Indohajj</a>.
                        <br>
                        <br>
                        Thanks & Regard's,
                        <br>
                        Indohajj
                        ";

                        $sendEmail = $this->sendMail($dataAgent['email'], 'Aktivasi Akun Agent Di Platform Indohajj', $message);

                        if ($sendEmail['msg'] == "sukses") {
                            return redirect()->to(base_url() . '/adminuser/user/agent');
                        } else {
                            return redirect()->to(base_url() . '/adminuser/user/agent')->with('error', $data['error']);
                        }
                    } else {
                        return redirect()->to(base_url() . '/adminuser/user/agent');
                    }
                } else {
                    session()->setFlashdata('agent', 'gagalap');
                    return redirect()->to(base_url() . '/adminuser/user/agent');
                }
            } else {
                $data = [
                    'status_approval' => 'N'
                ];
                // dd($dataAgent);

                $updateStatus = $this->UserModel->where('id', $id)->set($data)->update();
                if ($updateStatus) {
                    session()->setFlashdata('agent', 'suksesunap');
                    return redirect()->to(base_url() . '/adminuser/user/agent');
                } else {
                    session()->setFlashdata('agent', 'gagalunap');
                    return redirect()->to(base_url() . '/adminuser/user/agent');
                }
            }
        } else {
            session()->setFlashdata('agent', 'gagal');
            return redirect()->to(base_url() . '/adminuser/user/agent');
        }
    }
}
