<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagArticle;
use App\Models\About;
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
    //获得分类名
    $name = Category::where('id',$id)->pluck('name');
    return view('home.index')->withList($list)->withName($name);
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
    //获得标签名称
    $name = Tag::where('id',$id)->pluck('name');
    return view('home.index')->withList($list)->withName($name);
  }

  public function getAbout()
  {
    //获得关于信息
    $about = About::first();
    return view('home.about')->withAbout($about)->withName('关于');
  }

  public function getArticle($id)
  {
    $id = (int)$id;
    //获得关于信息
    $article = Article::find($id);
    return view('home.article')->withArticle($article)->withName($article->title);
  }
}
