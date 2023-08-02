<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mainImage()
    {
        if ($this->main_image) {
            return asset('storage/' . $this->main_image);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }
    public function coverImage()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        } else {
            return 'https://ui-avatars.com/api/?name=NIL&background=random';
        }
    }
}
