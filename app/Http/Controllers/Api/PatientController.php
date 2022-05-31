<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
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
        if($request->key == 32443131311){
            $patient = new User();
            $patient->nom = $request->nom;
            $patient->id_logiciel = $request->id_logiciel;
            $patient->prenom = $request->prenom;
            $patient->email = $request->email;
            $patient->phone = $request->phone;
            $patient->username = $request->username;
            $patient->password = Hash::make($request['password']);
            $patient->date_de_naissance = $request->date_de_naissance;
            $patient->etat = $request->etat;
            $patient->type = $request->type;
            $patient->sexe = $request->sexe;
            $patient->save();
            return $patient;
        }
        else return "error";
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
