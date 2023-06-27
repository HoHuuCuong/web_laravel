<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'tit',
    //     'parent_id',
    //     'description',
    //     'content',
    //     'active'
    // ];
    //  protected $table = 'menus';
    public static function isUsernameExists($name)
    {
        return self::where('name', $name)->exists();
    }
}