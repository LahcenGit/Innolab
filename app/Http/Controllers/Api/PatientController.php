<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
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
            $user = User::where('username',$request->username)->first();
            if($user){
                return "exist";
            }
            $user = User::where('email',$request->email)->first();
            if($user){
                return "exist";
            }
        
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request['password']);
            $user->type = $request->type;
            $user->save();

            $patient = new Patient();
            $patient->user_id = $user->id;
            $patient->first_name = $request->first_name;
            $patient->last_name = $request->last_name;
            $patient->laboratory_id = $request->laboratory_id;
            $patient->id_logiciel = $request->id_logiciel;
            $patient->email = $request->email;
            $patient->phone = $request->phone;
            $patient->date_birth = $request->date_birth;
            $patient->flag_etat = $request->flag_etat;
            $patient->sexe = $request->sexe;
            $patient->save();
            return $patient;
        
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
        $patient = Patient::where('id_logiciel',$id_logiciel)->first();
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->laboratory_id = $request->laboratory_id;
        $patient->id_logiciel = $request->id_logiciel;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->date_birth = $request->date_birth;
        $patient->flag_etat = $request->flag_etat;
        $patient->sexe = $request->sexe;
        $patient->save();
        return $patient;
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
        $patient = Patient::where('id_logiciel',$id_logiciel)->first();
        $user = User::where('id',$patient->user_id)->first();
        $user->delete();
        $patient->delete();
        return true;
    }
}
