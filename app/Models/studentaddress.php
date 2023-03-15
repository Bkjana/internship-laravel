<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentaddress extends Model
{
    use HasFactory;
    public $table="studentaddresses";
    public $primaryKey="id";
    // public function student()
    // {
    //     return $this->belongsTo(Student::class,"studentid","studentid");
    // }
}
