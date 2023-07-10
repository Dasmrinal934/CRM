<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class setlocation extends Model
{
    use HasFactory;
    protected $table="setlocation";
    protected $primaryKey="slno";
    public $timestamps = false;
}
