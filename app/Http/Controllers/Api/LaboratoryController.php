<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Laboratory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LaboratoryController extends Controller
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
        $user = new User();
        $user->username = $request->username;
        $user->password = Hash::make($request['password']);
        $user->type = $request->type;
        $user->save();
        
        $labo = new Laboratory();
        $labo->user_id = $user->id;
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
        return $labo;
    
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
    public function update(Request $request, $id_logiciel)
    {
        //
        $labo = Laboratory::find($id_logiciel);
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
        return $labo;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_logiciel)
    {
        //
        $labo = Laboratory::find($id_logiciel);
        $labo->delete();
        return true;
    }
}
