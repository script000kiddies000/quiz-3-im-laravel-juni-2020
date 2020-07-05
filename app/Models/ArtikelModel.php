<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'user_id', 'title', 'slug', 'content', 'tag',
    ];

    public static function fetchPosts()
    {
        return static::get();
    }

    public static function fetchPost($id)
    {
        return static::find($id);
    }

    public static function createPost($data)
    {
        return static::create($data);
    }

    public static function updatePost($id, $data)
    {
        return static::find($id)->update($data);
    }

    public static function deletePost($id)
    {
        return static::find($id)->delete();
    }


}
