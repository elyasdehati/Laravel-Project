<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Features;
use Illuminate\Http\Request;

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
}
