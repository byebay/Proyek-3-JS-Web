<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\StudentCourseModel;

class MatakuliahMhs extends BaseController
{
    protected $courseModel;
    protected $studentCourseModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->studentCourseModel = new StudentCourseModel();
    }

    public function index()
    {
        $studentId = session()->get('user_id');

        $courses = $this->courseModel->findAll();

        $takenCoursesQuery = $this->studentCourseModel
            ->select('course_id')
            ->where('student_id', $studentId)
            ->get()
            ->getResultArray();

        $takenCourses = [];
        if (!empty($takenCoursesQuery)) {
            $takenCourses = array_column($takenCoursesQuery, 'course_id');
        }

        return view('matakuliah_mhs', [
            'courses'      => $courses ?? [],
            'takenCourses' => $takenCourses
        ]);
    }

    public function store()
    {
        $studentId = session()->get('user_id');
        $selectedCourses = $this->request->getPost('courses');

        // $this->studentCourseModel
        //     ->where('student_id', $studentId)
        //     ->delete();

        if (!empty($selectedCourses) && is_array($selectedCourses)) {
            foreach ($selectedCourses as $courseId) {
                if (is_numeric($courseId)) {
                    $this->studentCourseModel->db->table('takes')->insert([
                        'student_id'  => $studentId,
                        'course_id'   => $courseId,
                        'enroll_date' => date('Y-m-d'),
                    ]);
                }
            }
        }

        return redirect()
            ->to('/matakuliah-mhs')
            ->with('saved', true)
            ->with('success', 'Mata kuliah berhasil disimpan');
    }


    public function take($course_id)
    {
        $studentId = session()->get('user_id');

        $exists = $this->studentCourseModel
            ->where('student_id', $studentId)
            ->where('course_id', $course_id)
            ->first();

        if (!$exists) {
            $this->studentCourseModel->insert([
                'student_id'  => (int)$studentId,
                'course_id'   => (int)$course_id,
                'enroll_date' => date('Y-m-d')
            ]);
        }

        return redirect()->to('/matakuliah-mhs');
    }
}
