<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = 'tags';

  public $timestamps = false;

  public function articles()
  {
    return $this->belongsToMany('App\Models\Article','tag_article','tag_id','article_id');
  }

}
