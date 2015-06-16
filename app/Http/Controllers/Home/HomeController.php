<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Models\User;
use App\Models\Article;
use App\Models\TagArticle;
use Session;

class HomeController extends Controller
{
  /**
   * 首页
   */
  public function getIndex()
  {
    //获得文章列表
    $list = Article::where('is_show',1)->orderBy('sort','desc')->simplePaginate(empty(session('page_num')) ? 10 : session('page_num'));
    return view('home.index')->withList($list);
  }

  public function getCategory($id)
  {
    $id = (int)$id;
    //获得文章列表
    $list = Article::where('is_show',1)
    ->where('category_id',$id)->orderBy('sort','desc')
    ->simplePaginate(empty(session('page_num')) ? 10 : session('page_num'));
    return view('home.index')->withList($list);
  }

  public function getTag($id)
  {
    $id = (int)$id;
    //获得文章IDS
    $article_ids = TagArticle::where('id',$id)->lists('article_id')->toArray();
    //获得文章列表
    $list = Article::where('is_show',1)
    ->whereIn('id',$article_ids)->orderBy('sort','desc')
    ->simplePaginate(empty(session('page_num')) ? 10 : session('page_num'));
    return view('home.index')->withList($list);
  }
}
