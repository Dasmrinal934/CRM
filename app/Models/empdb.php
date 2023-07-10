<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empdb extends Model
{
    use HasFactory;
    protected $table="employeedb";
    protected $primaryKey="EmpId";
    public $timestamps = false;
    public $incrementing = false;
}
