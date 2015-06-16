<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Set;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Link;
use Session;

class Getset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      //获得网站配置
      $webset = Set::first();
      view()->share('webset',$webset);
      Session::put('page_num',$webset->page_num);
      //获得网站分类
      view()->share('nav',Category::orderBy('sort','desc')->get());
      //获得标签云
      view()->share('tag',Tag::orderBy('sort','desc')->get());
      //获得友情链接
      view()->share('link',Link::orderBy('sort','desc')->get());

      return $next($request);
    }
}
