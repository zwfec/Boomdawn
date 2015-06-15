<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $table = 'articles';

  public $timestamps = false;

  public function user()
  {
    return $this->belongsTo('App\Models\User', 'user_id', 'id');
  }

  public function category()
  {
    return $this->belongsTo('App\Models\Category', 'category_id', 'id');
  }
}
