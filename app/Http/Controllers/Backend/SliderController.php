<?php

namespace App\Http\Controllers\backend;
use App\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SliderController extends Controller
{
    public function GetSlider(){
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }
    // End Method
}
