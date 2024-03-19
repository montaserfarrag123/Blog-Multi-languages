<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    use HasFactory;
    protected $fillable=['setting_id', 'locale', 'title', 'content', 'address', 'created_at', 'updated_at'];
}
