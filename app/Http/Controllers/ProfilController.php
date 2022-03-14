<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    //

    public function index(){
    $user = Auth::user();
       
        return view('patient.profil',compact('user'));
       
    }

    public function update(Request $request, $id){
      
        $user = User::find($id);
        if($request->password){
        $user->password = Hash::make($request['password']);
        }
        $user->save();
        return redirect('dashboard-patient');
    }
}
