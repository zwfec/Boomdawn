<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\Models\Set;

class SetController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'set');
  }

  public function getIndex()
  {
    //获得数据
    $set = Set::first();
    return view('manage.set')->withSet($set);
  }

}
