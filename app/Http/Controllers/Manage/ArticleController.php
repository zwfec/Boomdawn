<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Request;
use Validator;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TagArticle;

class ArticleController extends Controller
{

  public function __construct()
  {
    view()->share('current', 'article');
  }
  public function getIndex()
  {
    //获得数据
    $list = Article::paginate(15);
    return view('manage.article.lists')->with('list',$list);
  }

  public function getDel($id = 0)
  {
    $id = (int)$id;
    $article = Article::find($id);
    // 删除标签
    TagArticle::where('article_id', $id)->delete();
    //删除文章
    $affectedRows = $article->delete();
    if ($affectedRows) {
      return redirect('manage/article')->withErrors('删除成功')->withStatus(1);
    } else {
      return redirect('manage/article')->withErrors('删除失败')->withStatus(2);
    }
  }

  //添加页面
  public function getAdd()
  {
    //获得所有分类
    $categorys =  Category::all();
    //获得所有标签
    $tags = Tag::all();

    return view('manage.article.add')->withCategorys($categorys)->withTags($tags);
  }

  /**
   * 添加文章
   */
  public function postAdd()
  {
    $title       = Request::input('title');
    $sort        = Request::input('sort');
    $category_id = Request::input('category_id');
    $des         = Request::input('des');
    $content     = Request::input('content');
    $is_show     = Request::input('is_show');
    $tag_id     = Request::input('tag_id');
    $user_id     = session('uid');
    $created     = time();
    $updated     = time();

    //审核数据
    $v = Validator::make([
      'title' => $title,
    ],[
      'title' => 'required',
    ],[
      'title.required' => '标题不能为空',
    ]);

    if ($v->fails()) {
      return redirect('manage/article/add')->withErrors($v->errors())->withStatus(2)->withInput();
    }

    //添加数据
    $article              = new Article;
    $article->title       = $title;
    $article->sort        = $sort;
    $article->category_id = $category_id;
    $article->des         = $des;
    $article->content     = $content;
    $article->is_show     = $is_show;
    $article->user_id     = $user_id;
    $article->created     = $created;
    $article->updated     = $updated;
    $article->save();
    $insertedId = $article->id;

    if ($insertedId) {
      if (!empty($tag_id)) {
        //添加标签
        $addTagArr = [];
        foreach ($tag_id as $v) {
          $addTagArr[] = ['article_id' => $insertedId, 'tag_id' => $v];
        }
        $tagArticle = new TagArticle;
        $tagArticle->insert($addTagArr);
      }
      return redirect('manage/article')->withErrors('添加成功')->withStatus(1);
    }
  }

  public function getEdit($id = 0)
  {
    //获得文章数据
    $article = Article::find($id);
    //获得所有分类
    $categorys = Category::all();
    //获得所有标签
    $tags = Tag::all();
    //已选中的标签
    $tags_cur = TagArticle::where('article_id',$id)->lists('tag_id')->toArray();

    return view('manage.article.edit')
    ->withArticle($article)
    ->withCategorys($categorys)
    ->withTags($tags)
    ->withTagsCur($tags_cur);
  }

  public function postEdit()
  {
    $title       = Request::input('title');
    $sort        = Request::input('sort');
    $category_id = Request::input('category_id');
    $des         = Request::input('des');
    $content     = Request::input('content');
    $is_show     = Request::input('is_show');
    $tag_id      = Request::input('tag_id');
    $updated     = time();
    $id          = Request::input('id');

    //审核数据
    $v = Validator::make([
      'title' => $title,
    ],[
      'title' => 'required',
    ],[
      'title.required' => '标题不能为空',
    ]);

    if ($v->fails()) {
      return redirect('manage/article/edit')->withErrors($v->errors())->withStatus(2)->withInput();
    }

    //删除之前的标签
    TagArticle::where('article_id',$id)->delete();

    //修改数据
    $article              = Article::find($id);
    $article->title       = $title;
    $article->sort        = $sort;
    $article->category_id = $category_id;
    $article->des         = $des;
    $article->content     = $content;
    $article->is_show     = $is_show;
    $article->updated     = $updated;
    $article->save();
    $insertedId = $article->id;

    if ($insertedId) {

      if (!empty($tag_id)) {
        //添加标签
        $addTagArr = [];
        foreach ($tag_id as $v) {
          $addTagArr[] = ['article_id' => $insertedId, 'tag_id' => $v];
        }
        $tagArticle = new TagArticle;
        $tagArticle->insert($addTagArr);
      }
      return redirect('manage/article')->withErrors('编辑成功')->withStatus(1);
    }
  }
}
