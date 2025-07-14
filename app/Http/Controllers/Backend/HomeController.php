<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clarify;
use App\Models\Features;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class HomeController extends Controller
{
    public function AllFeature(){
        $feature = Features::latest()->get();
        return view('admin.backend.feature.all_feature', compact('feature'));
    }
    //End Method

    public function AddFeature(){
        return view('admin.backend.feature.add_feature');
    }
    // End Method

    public function StoreFeature(Request $request){

            Features::create([
                'title' => $request->title,
                'icon' => $request->icon,
                'description' => $request->description,
            ]);

        $notification = array(
            'message' => 'Features Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }
    //End Method

    public function EditFeature($id){
        $feature = Features::find($id);
        return view('admin.backend.feature.edit_feature', compact('feature'));
    }
    // End Method

    public function UpdateFeature(Request $request){

        $fea_id = $request->id;

        Features::find($fea_id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description
        ]);

        $notification = array(
            'message' => 'Features Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.feature')->with($notification);
    }
    // End Method

    public function DeleteFeature($id){
        Features::find($id)->delete();

        $notification = array(
            'message' => 'Features Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    // End Method

    public function GetClarifies(){
        $clarifies = Clarify::find(1);
        return view('admin.backend.clarify.get_clarifies', compact('clarifies'));
    }
    // End Method

    public function UpdateClarifies(Request $request){

        $clar_id = $request->id;
        $clarifies = Clarify::find($clar_id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(302,618)->save(public_path('upload/clarify/'.$name_gen));
            $save_url = 'upload/clarify/'.$name_gen;

            if (file_exists(public_path($clarifies->image))) {
                @unlink(public_path($clarifies->image));
            }

            Clarify::find($clar_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);
              
        $notification = array(
            'message' => 'Clarify Updated with Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }else{

            Clarify::find($clar_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
              
        $notification = array(
            'message' => 'Clarify Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        }
      
    }
    //End Method
}
