<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
protected $fillable = ['level'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}