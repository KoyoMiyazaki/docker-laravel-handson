<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = ['id'];
    protected $table = 'todo';
    public static $rules = [
        'title' => 'required',
        'content' => 'required',
    ];

    public function scopeFlg($query, $num) {
        return $query->where('flg', $num);
    }
}
