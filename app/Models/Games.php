<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Games extends Model
{

//    use HasMediaTrait;

//    use InteractsWithMedia;

    use HasFactory;

//    protected $fillable = ['title', 'content'];
//
//    protected $guarded = [];
//
//    public static function last()
//    {
//        return static::all()->last();
//    }
//
//    public function registerAllMediaConversions(Media $media = null): void
//    {
//        $this->addMediaConversion('thumb')
//            ->width(100)
//            ->height(100)
//            ->sharpen(10);
//
//        $this->addMediaConversion('full-size')
//            ->greyscale()
//            ->withResponsiveImages();
//    }
}
