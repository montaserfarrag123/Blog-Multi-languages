<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    use HasFactory;
    protected $fillable = [ 'post_id', 'locale', 'title', 'content', 'smallDesc', 'created_at', 'updated_at'];
}
