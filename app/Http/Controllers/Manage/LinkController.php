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

  public function getDel($id = 0)
  {
    $id = (int)$id;
    $link = Link::find($id);
    $affectedRows = $link->delete();
    if ($affectedRows) {
      return redirect('manage/link')->withErrors('删除成功')->withStatus(1);
    } else {
      return redirect('manage/link')->withErrors('删除失败')->withStatus(2);
    }
  }

  public function postAdd()
  {
    $name = Request::input('name');
    $des = Request::input('des');
    $url = Request::input('url');
    $sort = Request::input('sort');
    $id   = Request::input('id');
    //审核数据
    $v = Validator::make([
      'name' => $name,
    ], [
      'name' => 'required',
    ],[
      'name.required' => '名称不能为空',
    ]);

    if ($v->fails()) {
      return redirect('manage/link')->withErrors($v->errors())->withStatus(2);
    }

    if ($id != '0') {
      //编辑
      $link = Link::where('id',$id)->first();
      $link->name = $name;
      $link->des = $des;
      $link->url = $url;
      $link->sort = $sort;
      $affectedRows = $link->save();
      if ($affectedRows) {
        return redirect('manage/link')->withErrors('修改成功')->withStatus(1);
      }
    } else {
      //添加数据
      $link = new Link;
      $link->name = $name;
      $link->des = $des;
      $link->url = $url;
      $link->sort = $sort;
      $link->save();
      $insertedId = $link->id;
      if ($insertedId) {
        return redirect('manage/link')->withErrors('添加成功')->withStatus(1);
      }
    }
  }

}
