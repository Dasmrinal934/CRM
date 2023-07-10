<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessiondb extends Model
{
    use HasFactory;
    protected $table="sessiondb";
    protected $primaryKey="SessionId";
    public $timestamps = false;

}
