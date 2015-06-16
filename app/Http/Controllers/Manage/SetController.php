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

  public function postEdit()
  {
    $title    = Request::input('title');
    $keyword  = Request::input('keyword');
    $des      = Request::input('des');
    $copy     = Request::input('copy');
    $page_num = Request::input('page_num');
    $id       = Request::input('id');
    $page_num = abs(intval($page_num));
    //审核数据
    $v = Validator::make([
      'title' => $title,
    ], [
      'title' => 'required',
    ],[
      'title.required' => '网站名称不能为空',
    ]);

    if ($v->fails()) {
      return redirect('manage/set')->withErrors($v->errors())->withStatus(2);
    }

    //编辑
    $set = Set::where('id',$id)->first();
    $set->title = $title;
    $set->keyword = $keyword;
    $set->des = $des;
    $set->copy = $copy;
    $set->page_num = $page_num;
    $affectedRows = $set->save();
    if ($affectedRows) {
      return redirect('manage/set')->withErrors('修改成功')->withStatus(1);
    }
  }

}
