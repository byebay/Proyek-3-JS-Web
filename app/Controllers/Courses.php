<?php

namespace App\Controllers;

use App\Models\CourseModel;

class Courses extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $courses = $courseModel->findAll();

        return view('matakuliah', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        return view('tambahmatakuliah');
    }

    public function store()
    {
        $courseModel = new CourseModel();

        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];

        $courseModel->save($data);

        return redirect()->to('matakuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $courseModel = new CourseModel();
        $data['course'] = $courseModel->find($id);

        return view('editmatakuliah', $data);
    }

    public function update($id)
    {
        $courseModel = new CourseModel();

        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits'     => $this->request->getPost('credits'),
        ];

        $courseModel->update($id, $data);

        return redirect()->to('matakuliah')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function delete($id)
    {
        $courseModel = new CourseModel();
        $courseModel->delete($id);

        return redirect()->to('matakuliah')->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
