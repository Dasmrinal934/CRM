<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calldetails extends Model
{
    use HasFactory;
    protected $table="call_details";
    protected $primaryKey="TransId";
    public $incrementing=false;
    public $timestamps = false;
}
