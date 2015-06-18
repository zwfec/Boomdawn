<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Models\About;

class AboutController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'about');
  }

  public function getIndex()
  {
    //获得数据
    $about = About::first();
    return view('manage.about')->withAbout($about);
  }

  public function postEdit()
  {
    $title    = Request::input('title');
    $content  = Request::input('content','');
    $id       = Request::input('id');

    //审核数据
    $v = Validator::make([
      'title' => $title,
    ], [
      'title' => 'required',
    ],[
      'title.required' => '标题不能为空',
    ]);

    if ($v->fails()) {
      return redirect('manage/about')->withErrors($v->errors())->withStatus(2);
    }

    //编辑
    $about = About::where('id',$id)->first();
    $about->title = $title;
    $about->content = $content;
    $affectedRows = $about->save();
    if ($affectedRows) {
      return redirect('manage/about')->withErrors('修改成功')->withStatus(1);
    }
  }
}
