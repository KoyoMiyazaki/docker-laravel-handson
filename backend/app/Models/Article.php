<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $attributes = [
        'created_by' => 0,
        'update_by' => 0,
    ];
}
