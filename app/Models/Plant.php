<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
  use HasFactory;

  // 指定したカラムのみ値の代入を許可する
  protected $fillable = [
    'name',
    'body',
  ];

  // 1ページ中に表示するアイテムの数
  protected $perPage = 15;
}
