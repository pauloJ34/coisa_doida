<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Doujinshi extends Model
{
    use HasFactory;

    protected $fillable= [
        "name_doujinshi",
        "outher_name",
        "author",
        "publish_date",
        "views",
        "sinopse",
        "path_file",
        "chapter",
        "code"
    ];
}
