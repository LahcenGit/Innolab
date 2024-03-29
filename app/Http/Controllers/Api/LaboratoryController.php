<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\BaseController as BaseController;

class LaboratoryController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       

        $labo = Laboratory::where('email',$request->email)->first();
        
        if($labo){
            $user = User::find($labo->user_id);
            return $this->sendResponse($labo,$user, 'user exist');
        }
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request['password']);
        $user->type = 'labo';
        $user->save();
        
        $labo = new Laboratory();
        $labo->user_id = $user->id;
        $labo->designation = $request->designation;
        $labo->description = $request->description;
        $labo->id_logiciel = $request->id_logiciel;
        $labo->pass_crypted = $request->pass_crypted;
        $labo->phone = $request->phone;
        $labo->phone_fixe = $request->phone_fixe;
        $labo->email = $request->email;
        $labo->adresse = $request->adresse;
        $labo->primary_color = $request->primary_color;
        $labo->secondary_color = $request->secondary_color;
        $labo->flag_etat = $request->flag_etat;
        $labo->save();
         return $this->sendResponse($labo,$user, 'laboratory was successfully created.');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $labo = Laboratory::find($id);
        $labo->designation = $request->designation;
        $labo->description = $request->description;
        $labo->id_logiciel = $request->id_logiciel;
        $labo->phone = $request->phone;
        $labo->phone_fixe = $request->phone_fixe;
        $labo->email = $request->email;
        $labo->adresse = $request->adresse;
        $labo->primary_color = $request->primary_color;
        $labo->secondary_color = $request->secondary_color;
        $labo->flag_etat = $request->flag_etat;
        $labo->save();
        return $this->sendResponse($labo, 'Laboratory was successfully updated.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {   
        $labo = Laboratory::where('user_id',$user_id)->first();
        $user = User::where('id',$labo->user_id);
        $user->delete();
        $labo->delete();
        return $this->sendResponse($labo, 'Laboratory was successfully deleted.');
    }
}
