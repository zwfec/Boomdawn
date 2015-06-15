<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\Models\Tag;

class TagController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'tag');
  }

  public function getIndex()
  {
    //获得数据
    $list = Tag::paginate(15);
    return view('manage.tag')->withList($list);
  }

  public function getDel($id = 0)
  {
    $id = (int)$id;
    $tag = Tag::find($id);
    $affectedRows = $tag->delete();
    if ($affectedRows) {
      return redirect('manage/tag')->withErrors('删除成功')->withStatus(1);
    } else {
      return redirect('manage/tag')->withErrors('删除失败')->withStatus(2);
    }
  }

  public function postAdd()
  {
    $name = Request::input('name');
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
      return redirect('manage/tag')->withErrors($v->errors())->withStatus(2);
    }

    if ($id != '0') {
      //编辑
      $tag = Tag::where('id',$id)->first();
      $tag->name = $name;
      $tag->sort = $sort;
      $affectedRows = $tag->save();
      if ($affectedRows) {
        return redirect('manage/tag')->withErrors('修改成功')->withStatus(1);
      }
    } else {
      //添加数据
      $tag = new Tag;
      $tag->name = $name;
      $tag->sort = $sort;
      $tag->save();
      $insertedId = $tag->id;
      if ($insertedId) {
        return redirect('manage/tag')->withErrors('添加成功')->withStatus(1);
      }
    }
  }
}
