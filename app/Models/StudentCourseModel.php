<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentCourseModel extends Model
{
    protected $table = 'takes';
    protected $primaryKey = false;
    public $useAutoIncrement = false;
    protected $allowedFields = ['student_id','course_id','enroll_date'];
    
    public function findByStudentAndCourse($studentId, $courseId)
    {
        return $this->where('student_id', $studentId)
                    ->where('course_id', $courseId)
                    ->first();
    }
    
    public function deleteByStudentAndCourse($studentId, $courseId)
    {
        return $this->where('student_id', $studentId)
                    ->where('course_id', $courseId)
                    ->delete();
    }
}