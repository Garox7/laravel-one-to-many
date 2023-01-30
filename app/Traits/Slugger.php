<?php

namespace App\Traits;
use Illuminate\Support\Str;


trait Slugger
{
    public static function getSLug($text)
    {
        $slugBase  = Str::slug($text);
        $slug = $slugBase;
        $i = 1;

        while(self::where('slug', $slug)->first())
        {
            $slug = $slugBase . '-' . $i;
            $i++;
        };

        return $slug;
    }
}
