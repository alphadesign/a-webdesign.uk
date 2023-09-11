<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(BlogCategory::class,'id','blog_category_id');
    }

    public function imageThumb()
    {
        if ($this->image_thumb) {
            return asset('storage/' . $this->image_thumb);
        } else {
            return 'https://picsum.photos/370/212';
        }
    }
    public function image()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        } else {
            return 'https://picsum.photos/800/390';
        }
    }
}
