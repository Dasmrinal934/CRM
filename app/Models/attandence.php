<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attandence extends Model
{
    use HasFactory;
    protected $table="attandence";
    protected $primaryKey="slno";
    public $timestamps= false;
}
