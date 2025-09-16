<?php
namespace App\Models;

use CodeIgniter\Model;

class StudentCourseModel extends Model
{
    protected $table = 'takes';
    protected $primaryKey = 'student_id';
    protected $allowedFields = ['student_id', 'course_id', 'enroll_date'];
}
