<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['tag_id', 'locale', 'title', 'created_at', 'updated_at'];
}
