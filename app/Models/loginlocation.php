<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loginlocation extends Model
{
    use HasFactory;
  protected $table="login_location";
  protected $primaryKey="slno";
  public $timestamps = false;
}
