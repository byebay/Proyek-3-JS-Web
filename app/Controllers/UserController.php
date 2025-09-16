<?php

namespace App\Controllers;

use App\Models\StudentCourseModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data = $userModel->where('role','mahasiswa')->findAll();

        return view('biodata', ['users' => $data]);
    }

    public function home()
    {
        $userModel = new UserModel();
        $data = $userModel->findAll();

        return view('home', ['users' => $data]);
    }

    public function detail($id)
    {
        $userModel = new UserModel();
        $mhs = $userModel->find($id);

        if (! $mhs) {
            return redirect()->to('/user')->with('error', 'User tidak ditemukan.');
        }

        $takeModel = new StudentCourseModel();
        $takenCourses = $takeModel
                        ->select('courses.course_name, courses.credits')
                        ->join('courses', 'courses.course_id = takes.course_id')
                        ->where('takes.student_id', $id)
                        ->findAll();

        return view('detail', [
            'mhs' => $mhs,
            'takenCourses' => $takenCourses
        ]);
    }


    public function tambah()
    {
        return view('tambah');
    }

    public function simpan()
    {
        $model = new UserModel();
        $model->save([
            'username'   => $this->request->getPost('username'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'full_name'  => $this->request->getPost('full_name'),
            'nim'        => $this->request->getPost('nim'),
            'role'       => "mahasiswa"
        ]);

        session()->setFlashdata('usersuccess', 'User baru berhasil ditambahkan!');
        return redirect()->to('tambah');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find($id);

        return view('edit', $data);
    }

    public function update($id)
    {
        $userModel = new UserModel();

        $data = [
            'username'   => $this->request->getPost('username'),
            'nim'        => $this->request->getPost('nim'),
            'full_name'  => $this->request->getPost('full_name'),
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        return redirect()->to('user');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('user');
    }    

    public function login()
    {
        return view('login');
    }

    public function loginProcess()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => ['rules' => 'required', 'errors' => ['required' => 'Username wajib diisi.']],
            'password' => ['rules' => 'required', 'errors' => ['required' => 'Password wajib diisi.']]
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $session   = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id'   => $user['user_id'],
                'username'  => $user['username'],
                'full_name' => $user['full_name'],
                'role'      => $user['role'],
                'logged_in' => true
            ]);
            return redirect()->to('home');
        } else {
            $session->setFlashdata('error', 'Username atau password salah.');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function hapusAkunForm()
    {
        return view('hapus_akun');
    }

    public function hapusAkunProcess()
    {
        $session   = session();
        $userModel = new UserModel();

        $user_id  = $session->get('user_id');
        $password = $this->request->getPost('password');

        $user = $userModel->find($user_id);

        if (! $user) {
            $session->setFlashdata('error', 'User tidak ditemukan.');
            return redirect()->to('hapus-akun');
        }

        if (! password_verify($password, $user['password'])) {
            $session->setFlashdata('error', 'Password salah, akun tidak dihapus.');
            return redirect()->to('hapus-akun');
        }

        $userModel->delete($user_id);
        $session->destroy();

        $session->setFlashdata('success', 'Akun berhasil dihapus.');
        return redirect()->to('login');
    }

    public function matakuliah()
    {
        return view('matakuliah');
    }
}
