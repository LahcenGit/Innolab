<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\BaseController as BaseController;
class DoctorController  extends BaseController
{
    //
    public function store(Request $request){
      
        $user = User::where('username',$request->username)->first();
        if($user){
            return $this->sendResponse($user, 'L utilisateur existe déja.');
        }
        $user = User::where('email',$request->email)->first();
        if($user){
            return $this->sendResponse($user, 'L utilisateur existe déja.');
        }
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request['password']);
        $user->type = 'doctor';
        $user->save();
        
        $doctor = Doctor::where('email',$request->email)->first();
        if($doctor){
            return $this->sendResponse($doctor, 'Le médecin existe déja.');
        }
        $doctor = Doctor::where('phone_fixe',$request->phone_fixe)->first();
        if($doctor){
            return $this->sendResponse($doctor, 'Le médecin existe déja.');
        }
        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->laboratory_id = $request->laboratory_id;
        $doctor->id_logiciel = $request->id_logiciel;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->phone_fixe = $request->phone_fixe;
        $doctor->speciality = $request->speciality;
        $doctor->adresse = $request->adresse;
        $doctor->flag_etat = $request->flag_etat;
        $doctor->save();
        return $this->sendResponse($doctor, 'Doctor was successfully created.');
    }


    public function update(Request $request , $user_id){
        $doctor = Doctor::where('user_id',$user_id)->first();
       
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->laboratory_id = $request->laboratory_id;
        $doctor->id_logiciel = $request->id_logiciel;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->phone_fixe = $request->phone_fixe;
        $doctor->speciality = $request->speciality;
        $doctor->adresse = $request->adresse;
        $doctor->flag_etat = $request->flag_etat;
        $doctor->save();
        return $this->sendResponse($doctor, 'Doctor was successfully updated.');
    }

    public function destroy($user_id){
        $doctor = Doctor::where('user_id',$user_id)->first();
        $user = User::where('id',$doctor->user_id)->first();
        $user->delete();
        $doctor->delete();
        return $this->sendResponse($doctor, 'Doctor was successfully deleted.');
    }
}