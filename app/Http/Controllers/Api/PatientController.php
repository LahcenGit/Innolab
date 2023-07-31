<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\BaseController as BaseController;

class PatientController extends BaseController
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
                return $this->sendResponse($user, 'User exist');
            }

            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request['password']);
            $user->type = 'patient';
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
            return $this->sendResponse($patient, 'Patient was successfully created');

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
        $patient = Patient::find($id);
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
        return $this->sendResponse($patient, 'Patient was successfully updated');
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
        $patient = Patient::find($id);
        $user = User::find($patient->user_id);
        $user->delete();
        $patient->delete();
        return $this->sendResponse($patient, 'Patient was successfully deleted.');
    }
}
