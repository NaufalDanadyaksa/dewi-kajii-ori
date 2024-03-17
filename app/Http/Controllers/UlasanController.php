<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    function index(){
        // return halaman list Ulasan
    }
    
    function store(Request $request){
        $request->validate([
           'name'=>'required',
           'email'=>'required|email',
           'ulasan'=>'required' 
        ],[
            'name.required' => 'Name wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'ulasan.required' => 'ulasan wajib diisi',
        ]);
        

        $data=[
            'name' => $request->name,
            'email' => $request->email,
            'ulasan' => $request->description
        ];
        Ulasan::create($data);
        // return redirect to halaman list Ulasan
    }

   

    

    function destroy($id){
        Ulasan::find($id)->delete();
        // return redirect to halaman list Ulasan 
    }
}
