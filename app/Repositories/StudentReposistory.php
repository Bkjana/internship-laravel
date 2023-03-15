<?php
namespace App\Repositories;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepoInterface;

class StudentReposistory implements StudentRepoInterface{
    public function findAllStudent()
    {
        return Student::all();
    }
}
