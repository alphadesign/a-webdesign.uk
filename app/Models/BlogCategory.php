<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function imageThumb()
    {
        if ($this->image_thumb) {
            return asset('storage/' . $this->image_thumb);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }
    public function image()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
