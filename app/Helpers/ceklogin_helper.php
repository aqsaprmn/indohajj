<?php
function ceklogin()
{
    $UserModel = new \App\Models\UserModel();
    $UserDataModel = new \App\Models\UserDataModel();
    $data = [];
    // helper('cookie');

    if (get_cookie('id') && get_cookie('hashwonder')) {
        $id = get_cookie('id');
        $hashwonder = get_cookie('hashwonder');
        $user = $UserModel->find($id);

        if (password_verify($user['username'], $hashwonder)) {
            $dataSes = [
                'username'  => $user['username'],
                'key'     => password_hash($user['id'], PASSWORD_DEFAULT),
                'logged_in' => true,
            ];
            session()->set($dataSes);
        }
    }

    if (session()->has('logged_in')) {
        $logged = session()->get('logged_in');
        if ($logged) {
            if (session()->get('username')) {
                $username = session()->get('username');
                // $userModel = $UserModel->select('id,username,email,role_id,created_at')->where('username', $username)->first();
                $userModel = $UserModel->select('id,role_id,username')->where('username', $username)->first();
                // $userDataModel = $UserDataModel->select('name,nik,dob,pob,sex,address,hp,image,ktp,created_at')->where('username', $username)->first();
                $userDataModel = $UserDataModel->select('name,image')->where('username', $username)->first();
                if ($userModel) {
                    if (session()->get('key')) {
                        $key = session()->get('key');
                        if (password_verify($userModel['id'], $key)) {
                            $data['user'] = $userModel;
                            $data['userdata'] = $userDataModel;
                            $data['key'] = $key;
                            $data['logged_in'] = session()->get('logged_in');
                        }
                    }
                }
            }
        } else {
            $data = [
                'logged_in' => false
            ];
        }
    } else {
        $data = [
            'logged_in' => false
        ];
    }

    return $data;
}
