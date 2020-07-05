<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getTagButtonAttribute()
    {
        $result = '';

        if ($this->tag) {
            $tagArray = explode(',', $this->tag);
            foreach ($tagArray as $tag) {
                if ($tag) {
                    $result .= '<button class="btn btn-sm btn-success">' . $tag . '</button> ';
                }
            }
        }

        return $result;
    }
}
