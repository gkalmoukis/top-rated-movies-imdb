<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getSortAttributte(){
        return $this->imdb_sort + 1;
    }
}
