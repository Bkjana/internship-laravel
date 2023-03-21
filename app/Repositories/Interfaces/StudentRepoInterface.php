<?php
namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

/**
 * All method define here
 */
interface StudentRepoInterface{
    public function findAllStudent(); // Find all student with student address and their personal details
    public function SaveStudentDetails(Request $request); // save student details in database
    public function findStudent(int $id);
    public function findStudentByEmail(string $email);
    public function deleteStudent(int $id);
    public function updateStudent(Request $request,int $id);
}