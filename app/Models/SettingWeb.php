<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingWeb extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'alt_logo', 'about', 'google_maps', 'company_address', 'number_phone', 'email'];
}
