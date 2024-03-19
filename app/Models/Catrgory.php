<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Catrgory extends Model implements TranslatableContract
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = ['category_id', 'locale', 'title', 'content', 'created_at', 'updated_at'];
}
