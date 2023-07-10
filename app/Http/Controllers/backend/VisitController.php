<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitController extends Controller
{
  public function MayVisit(){
    return view('backend.mayvisit');
  }

  public function Visited(){
    return view('backend.visited');
  }
}
