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
      
       
     
        $doctor = Doctor::where('phone',$request->phone)->first();
        if($doctor){
            $user = User::find($doctor->user_id);
            return $this->sendResponse($doctor,$user, 'doctor exist');
        }

        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request['password']);
        $user->type = 'doctor';
        $user->save();
        
        $doctor = new Doctor();
        $doctor->user_id = $user->id;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->laboratory_id = $request->laboratory_id;
        $doctor->id_logiciel = $request->id_logiciel;
        $doctor->email = $request->email;
        $doctor->pass_crypted = $request->pass_crypted;
        $doctor->phone = $request->phone;
        $doctor->phone_fixe = $request->phone_fixe;
        $doctor->speciality = $request->speciality;
        $doctor->adresse = $request->adresse;
        $doctor->flag_etat = $request->flag_etat;
        $doctor->save();
        return $this->sendResponse($doctor,$user, 'Doctor was successfully created');
    }


    public function update(Request $request , $id){
        $doctor = Doctor::find($id);
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
