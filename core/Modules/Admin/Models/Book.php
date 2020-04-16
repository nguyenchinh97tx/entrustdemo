<?php

namespace Core\Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title', 'content','image','file'
    ];
}
