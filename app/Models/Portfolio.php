<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function image()
    {
        return $this->image
            ? storage($this->image)
            : 'https://picsum.photos/370/212';
    }
}
