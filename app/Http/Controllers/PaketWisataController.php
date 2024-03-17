<?php

namespace App\Http\Controllers;

use App\Models\Paket_Wisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    function index(){
        // return halaman list PaketWisata
    }
    function create( ){
        //return create form
    }
    function store(Request $request){
        $request->validate([
           'name'=>'required',
           'image'=>'image|mimes:jpeg,png,jpg,gif|max:10000',
           'price'=>'required|integer',
           'description'=>'required' 
        ],[
            'name.required' => 'Name wajib diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa jpeg,png,jpg,gif',
            'image.max' => 'File tidak boleh lebih dari 10 MB',
            'price.required' => 'Price wajib diisi',
            'price.integer' => 'Price harus berupa angka',
            'description.required' => 'Description wajib diisi',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->profile_picture->move(public_path('image'), $imageName);
        $imagePath = 'image/' . $imageName;

        $data=[
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
            'description' => $request->description
        ];
        Paket_Wisata::create($data);
        // return redirect to halaman list PaketWisata
    }

    function edit($id){
        $data=Paket_Wisata::find($id);
        // return edit form with $data
    }

    function update(Request $request, $id){
        $request->validate([
            'name'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:10000',
            'price'=>'required|integer',
            'description'=>'required' 
         ],[
             'name.required' => 'Name wajib diisi',
             'image.image' => 'File harus berupa gambar',
             'image.mimes' => 'File harus berupa jpeg,png,jpg,gif',
             'image.max' => 'File tidak boleh lebih dari 10 MB',
             'price.required' => 'Price wajib diisi',
             'price.integer' => 'Price harus berupa angka',
             'description.required' => 'Description wajib diisi',
         ]);
         $imageName = time() . '.' . $request->image->extension();
         $request->profile_picture->move(public_path('image'), $imageName);
         $imagePath = 'image/' . $imageName;
 
         $data=[
             'name' => $request->name,
             'image' => $imagePath,
             'price' => $request->price,
             'description' => $request->description
         ];

         Paket_Wisata::find($id)->update($data);
         // return redirect to halaman list PaketWisata 
    }

    function destroy($id){
        Paket_Wisata::find($id)->delete();
        // return redirect to halaman list PaketWisata 
    }
}
