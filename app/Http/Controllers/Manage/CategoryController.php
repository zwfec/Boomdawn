<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use Session;
use App\Models\Category;

class CategoryController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'category');
  }

  public function getIndex()
  {
    //获得数据
    $list = Category::orderBy('sort','desc')->orderBy('id','desc')->get();
    return view('manage.category')->withList($list);
  }

  public function getDel($id = 0)
  {
    $id = (int)$id;
    $cate = Category::find($id);
    $affectedRows = $cate->delete();
    if ($affectedRows) {
      return redirect('manage/category')->withErrors('删除成功')->withStatus(1);
    } else {
      return redirect('manage/category')->withErrors('删除失败')->withStatus(2);
    }
  }

  public function postAdd()
  {
    $name = Request::input('name');
    $des  = Request::input('des');
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
      return redirect('manage/category')->withErrors($v->errors())->withStatus(2);
    }

    if ($id != '0') {
      //编辑
      $cate = Category::where('id',$id)->first();
      $cate->name = $name;
      $cate->des  = $des;
      $cate->sort = $sort;
      $affectedRows = $cate->save();
      if ($affectedRows) {
        return redirect('manage/category')->withErrors('修改成功')->withStatus(1);
      }
    } else {
      //添加数据
      $cate = new Category;
      $cate->name = $name;
      $cate->des  = $des;
      $cate->sort = $sort;
      $cate->save();
      $insertedId = $cate->id;
      if ($insertedId) {
        return redirect('manage/category')->withErrors('添加成功')->withStatus(1);
      }
    }
  }
}
