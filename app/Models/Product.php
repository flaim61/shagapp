<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'sort',
        'name',
        'price',
        'category_id',
        'image'
    ];

    public function setImageAttribute($value){
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "image/product";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
    }
}
