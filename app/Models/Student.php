<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table="student";
    protected $primaryKey="studentid";
    public function getStudentpersonaldetails(){
        return $this->hasOne(studentpersonaldetail::class,"studentid","studentid");
    }
    public function getStudentAddresses()
    {
        return $this->hasMany(studentaddress::class,"studentid","studentid");
    }
}
