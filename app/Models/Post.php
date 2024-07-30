<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    const CREATED_AT = 'creation_time';
    const UPDATED_AT = 'updation_time';
    protected $attributes = [
        "title" => "default",
        "body" => "default body"
    ];
    protected $fillable = ["title","body"];
}
