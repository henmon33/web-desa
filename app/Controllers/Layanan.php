<?php

namespace App\Controllers;

use App\Models\LoginModel;


class Layanan extends BaseController
{
    public function index()
    {

        return view('layanan/login');
    }
    public function loginprocess()
    {
        $data = new LoginModel();
        $post = $this->request->getPost();
        $query = $data->getWhere(['username' => $post['username']]);
        $user = $query->getRow();
        if ($user) {
            if (password_verify($post['password'], $user->password)) {
                // $params = ['id_user' => $user->id];
                // session()->set($params);
                if ($user->role_id == '1') {
                    $role = ['role_id1' => $user->role_id];
                    session()->set($role);
                    return redirect()->to('layanan/superadmin');
                }
                if ($user->role_id == '2') {
                    $role = [
                        'role_id2' => $user->role_id,
                        'username' => $user->username
                    ];
                    session()->set($role);
                    return redirect()->to('admin');
                }
                if ($user->role_id == '3') {
                    $role = [
                        'role_id3' => $user->role_id,
                        'username' => $user->username,
                        
                    ];
                    session()->set($role);
                    return redirect()->to('masyarakat');
                }
                if ($user->role_id == '4') {
                    $role = [
                        'role_id4' => $user->role_id,
                        'id_kelola' => $user->id,
                        'username' => $user->username
                    ];
                    session()->set($role);
                    return redirect()->to('bumdes');
                }
                if ($user->role_id == '5') {
                    $role = [
                        'role_id5' => $user->role_id,
                        'id_kelola' => $user->id,
                        'username' => $user->username
                    ];
                    session()->set($role);
                    return redirect()->to('anggaran');
                }
                if ($user->role_id == '6') {
                    $role = [
                        'role_id6' => $user->role_id,
                        'id_kelola' => $user->id,
                        'username' => $user->username
                    ];
                    session()->set($role);
                    return redirect()->to('administrasi/index/DIAJUKAN');
                }
            } else {
                return redirect()->back()->with('error', 'password salah');
            }
        } else {
            return redirect()->back()->with('error', 'Username tidak terdaftar');
        }
    }
    public function logout()
    {
        //session()->remove('id_user');
        session()->remove('role_id1');
        session()->remove('role_id2');
        session()->remove('role_id3');
        session()->remove('role_id4');
        session()->remove('role_id5');
        session()->remove('role_id6');
        return redirect()->to('layanan');
    }
}
