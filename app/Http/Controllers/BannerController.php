<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function getImageByBannerId($id = 1)
    {
        return Banner::query()->where('id', $id)->orderBy('created_at')->get();
    }
}
