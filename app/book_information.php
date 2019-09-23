<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_information extends Model
{

    protected $fillable = ['title', 'author', 'price','book_cover','description'];
    protected $guarded = ['id'];
    public $timestamps = false;
}
