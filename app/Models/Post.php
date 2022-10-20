<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'name',
        'image',
        'text'
    ];

    public function setImageAttribute($value){
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "image/post";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
