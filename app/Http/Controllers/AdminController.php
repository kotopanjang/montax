<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IklanModel;

class AdminController extends Controller
{
    //
    public function Show_Iklan()
    {
        $param['daftar_iklan']     = \DB::select("select * from iklan");
        return view('admin.iklan')->with($param);
    }

    public function Post_Iklan(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'photo_'.time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        /* Store $imageName name in DATABASE from HERE */
        $simpanphoto                = new IklanModel;
        $simpanphoto->nama_foto     = $imageName;
        $simpanphoto->created_at    = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        $simpanphoto->show_status   = 1;
        $simpanphoto->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
    }

    public function Edit_Iklan(Request $request)
    {
        $old_photo = $request->txtNamaFoto;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = 'photo_'.time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $simpanphoto                = IklanModel::where('Nama_Foto', $old_photo)
                                                    ->update(['Nama_Foto' => $imageName]);

        // File::delete(public_path('images/'. $old_photo));
        if(\File::exists(public_path("images/".$old_photo."")))
        {
            \File::delete(public_path("images/".$old_photo.""));
        }
        return back()
            ->with('success','You have successfully edit image.');
    }
}
