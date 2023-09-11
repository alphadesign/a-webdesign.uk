<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mainImage()
    {
        if ($this->main_image) {
            return asset('storage/' . $this->main_image);
        } else {
            return asset('assets/frontend/img/case-deatails.jpg');
        }
    }
    public function coverImage()
    {
        if ($this->cover_image) {
            return asset('storage/' . $this->cover_image);
        } else {
            return asset('assets/frontend/img/case-deatails.jpg');
        }
    }
}
