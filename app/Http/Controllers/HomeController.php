<?php

namespace App\Http\Controllers;

use App\Models\Detaildocument;
use App\Models\Document;
use App\Models\Laboratory;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function patient(){

        $now = Carbon::now();
        $user = User::where('id',Auth::user()->id)->first();
        $patient = Patient::where('user_id', $user->id)->first();
        $years = Document::where('patient_id',$patient->id)
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('year')
                                   ->get()->reverse();

        $recent_year = Document::where('patient_id',$patient->id)
                                ->selectRaw('YEAR(created_at) year')
                                ->groupBy('year')
                                ->latest()
                                ->first();
        if($recent_year){
            $recent_year =  $recent_year->year;
        }
        else{
            $recent_year = '0'; 
        }

        $documents = Document::where('patient_id',$patient->id)
                                   ->whereYear('created_at',$recent_year)
                                   ->selectRaw('MONTHNAME(created_at) month')
                                   ->selectRaw('analyse')
                                   ->selectRaw('document_name')
                                   ->selectRaw('flag_etat')
                                   ->selectRaw('created_at')
                                   ->get();

       $documents = collect($documents)
        ->groupBy('month');

        $keys = $documents->keys();



        $monthDocuments = Document::where('patient_id',$patient->id)
                                   ->selectRaw('created_at')
                                   ->selectRaw('MONTH(created_at) month')
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('created_at')
                                   ->groupBy('year')
                                   ->get();

        return view('patient.dashboard-patient',compact('patient','user','years','recent_year','documents'));
    }


    public function patientWithYear($year){

        $now = Carbon::now();
        $user = User::where('id',Auth::user()->id)->first();
        $patient = Patient::where('user_id', $user->id)->first();
        $years = Document::where('patient_id',$patient->id)
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('year')
                                   ->get()->reverse();

        $recent_year = $year;
      
        $documents = Document::where('patient_id',$patient->id)
                                ->whereYear('created_at',$year)
                                ->selectRaw('MONTHNAME(created_at) month')
                                ->selectRaw('analyse')
                                ->selectRaw('document_name')
                                ->selectRaw('flag_etat')
                                ->selectRaw('created_at')
                                ->selectRaw('id')
                                ->get();

        $documents = collect($documents)
        ->groupBy('month');

        $keys = $documents->keys();
       
        return view('patient.dashboard-patient',compact('patient','user','years','recent_year','documents'));
    }



    public function document($month , $year){
        $user = User::where('id',Auth::user()->id)->first();
        $patient = Patient::where('user_id', $user->id)->first();
        $document = Document::where('patient_id',$patient->id)
                               ->whereYear('created_at', $year)
                               ->whereMonth('created_at', $month)
                               ->get();
        return $document;
    }

    public function detaildocument($id){
        $document = Document::find($id);
        $patient = Patient::where('id',$document->patient_id)->first();
        $detaildocuments = Detaildocument::where('document_id',$id)->get();
        return view('patient.modal-detaildocument',compact('detaildocuments','patient','document'));
    }


    public function labo(){
        $user = User::where('id',Auth::user()->id)->first();
        $labo = Laboratory::where('user_id', $user->id)->first();
        $labos = Document::where('laboratory_id',$labo->id)
                                   ->selectRaw('laboratory_destination_id')
                                   ->groupBy('laboratory_destination_id')
                                   ->get();

        $recent_labo = Document::where('laboratory_id',$labo->id)
                                   ->selectRaw('laboratory_destination_id')
                                   ->groupBy('laboratory_destination_id')
                                   ->first();
                                   
        
        $documents = Document::where('laboratory_id',$labo->id)
                                   ->where('laboratory_destination_id',$recent_labo->laboratory_destination_id)
                                   ->selectRaw('MONTHNAME(created_at) month')
                                   ->selectRaw('analyse')
                                   ->selectRaw('document_name')
                                   ->selectRaw('flag_etat')
                                   ->selectRaw('created_at')
                                   ->selectRaw('patient_id')
                                   ->get();

                                  
        return view('labo.dashboard-labo',compact('labos','documents'));
    }

    public function documentWithLabo($id){

        $user = User::where('id',Auth::user()->id)->first();
        $labo = Laboratory::where('user_id', $user->id)->first();
        $labos = Document::where('laboratory_id',$labo->id)
                                ->selectRaw('laboratory_destination_id')
                                ->groupBy('laboratory_destination_id')
                                ->get();
        $documents = Document::where('laboratory_id',$labo->id)
                                    ->where('laboratory_destination_id',$id)
                                    ->selectRaw('analyse')
                                    ->selectRaw('document_name')
                                    ->selectRaw('flag_etat')
                                    ->selectRaw('created_at')
                                    ->selectRaw('patient_id')
                                    ->get();

       
        return view('labo.dashboard-labo',compact('labos','documents'));
    }
}
