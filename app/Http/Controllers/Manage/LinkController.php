<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\Models\Link;

class LinkController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'link');
  }

  public function getIndex()
  {
    //获得数据
    $list = Link::paginate(15);
    return view('manage.link')->withList($list);
  }

}
