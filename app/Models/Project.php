<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'date',
        'imagepath'
    ];
}
