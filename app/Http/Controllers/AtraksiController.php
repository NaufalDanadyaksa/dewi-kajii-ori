<?php

namespace App\Http\Controllers;

use App\Models\Atraksi;
use Illuminate\Http\Request;

class AtraksiController extends Controller
{
    function index(){
        // return halaman list atraksi
    }
    function create( ){
        //return create form
    }
    function store(Request $request){
        $request->validate([
           'name'=>'required',
           'image'=>'image|mimes:jpeg,png,jpg,gif|max:10000',
           'description'=>'required' 
        ],[
            'name.required' => 'Name wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa jpeg,png,jpg,gif',
            'image.max' => 'File tidak boleh lebih dari 10 MB',
            'description.required' => 'Description wajib diisi',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->profile_picture->move(public_path('image'), $imageName);
        $imagePath = 'image/' . $imageName;

        $data=[
            'name' => $request->name,
            'image' => $imagePath,
            'description' => $request->description
        ];
        Atraksi::create($data);
        // return redirect to halaman list atraksi 
    }

    function edit($id){
        $data=Atraksi::find($id);
        // return edit form with $data
    }

    function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:10000',
            'description'=>'required' 
         ],[
             'name.required' => 'Name wajib diisi',
             'image.image' => 'File harus berupa gambar',
             'image.mimes' => 'File harus berupa jpeg,png,jpg,gif',
             'image.max' => 'File tidak boleh lebih dari 10 MB',
             'description.required' => 'Description wajib diisi',
         ]);
         $imageName = time() . '.' . $request->image->extension();
         $request->profile_picture->move(public_path('image'), $imageName);
         $imagePath = 'image/' . $imageName;
 
         $data=[
             'name' => $request->name,
             'image' => $imagePath,
             'description' => $request->description
         ];

         Atraksi::find($id)->update($data);
         // return redirect to halaman list atraksi 
    }

    function destroy($id){
        Atraksi::find($id)->delete();
        // return redirect to halaman list atraksi 
    }
}
