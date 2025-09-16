<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use App\Models\StudentCourseModel;
use App\Models\TakeModel;
use App\Models\StudentModel;

class MatakuliahMhs extends BaseController
{
    protected $courseModel;
    protected $takeModel;
    protected $studentModel;

    public function __construct()
    {
        $this->courseModel = new CourseModel();
        $this->takeModel = new StudentCourseModel();
        $this->studentModel = new StudentModel();
    }

    public function index()
    {
        $courses = $this->courseModel->findAll();
        $studentId = session()->get('user_id');

        if (!$this->studentModel->find($studentId)) {
            $this->studentModel->insert([
                'student_id' => $studentId,
                'entry_year' => date('Y')
            ]);
        }

        $takenCourses = $this->takeModel->where('student_id', $studentId)->findColumn('course_id');

        return view('matakuliah_mhs', [
            'courses' => $courses,
            'takenCourses' => $takenCourses
        ]);
    }

    public function take($course_id)
    {
        $studentId = session()->get('user_id');

        if (!$this->takeModel->where('student_id', $studentId)->where('course_id', $course_id)->first()) {
            $this->takeModel->insert([
                'student_id' => $studentId,
                'course_id' => $course_id,
                'enroll_date' => date('d-m-Y')
            ]);
        }

        return redirect()->to('/matakuliah-mhs');
    }
}
