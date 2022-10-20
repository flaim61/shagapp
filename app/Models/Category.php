<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Backpack\CRUD\app\Models\Traits\CrudTrait;

class Category extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'name',
        'image'
    ];

    public function setImageAttribute($value){
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "image/categoryImages";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
