<?php

namespace App\Http\Controllers;

use App\Models\Detaildocument;
use App\Models\Doctor;
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
  
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        return view('home');
    }

    public function patient(){
        $y = null;
       
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
                                   ->selectRaw('id')
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

        return view('patient.dashboard-patient',compact('patient','user','years','recent_year','documents','y'));
    }


    public function patientWithYear($year){
        $y = $year;
       
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
       
        return view('patient.dashboard-patient',compact('patient','user','years','recent_year','documents','y'));
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
        $id=null;
        $user = User::where('id',Auth::user()->id)->first();
        $laboratory = Laboratory::where('user_id', $user->id)->first();
        $labo = Laboratory::where('user_id', $user->id)->first();
        $labos = Document::where('laboratory_destination_id', $laboratory->id)
                                   ->where('laboratory_destination_id','!=', NULL)
                                   ->selectRaw('laboratory_id')
                                   ->groupBy('laboratory_id')
                                   ->get();

        $recent_labo = Document::where('laboratory_destination_id', $laboratory->id)
                                   ->where('laboratory_destination_id','!=', NULL)
                                   ->selectRaw('laboratory_id')
                                   ->groupBy('laboratory_id')
                                   ->first();
                                   
        if($recent_labo){
            $documents = Document::where('laboratory_destination_id', $laboratory->id)
                                    ->get();
            $document_en_attente = Document::where('laboratory_destination_id', $laboratory->id)
                                    ->where('flag_etat',1)
                                    ->count();
            $document_pret = Document::where('laboratory_destination_id', $laboratory->id)
                                     ->where('flag_etat',2)
                                     ->count();
            $document_en_cour = Document::where('laboratory_destination_id',$labo->id)
                                    ->where('flag_etat',0)
                                    ->count();
            $total = $document_en_attente + $document_pret + $document_en_cour;;
        }
       
        else{
            $documents = null;
            $document_en_attente = 0;
            $document_pret =0;
            $document_en_cour =0;
            $total = 0;
        } 
        
       
        return view('labo.dashboard-labo',compact('labos','documents','document_en_attente','document_pret','total','laboratory','id','labo','document_en_cour'));
      
    }

    public function LabotWithDocument($id){

        $id = $id;
        $laboratory = Laboratory::find($id);
        $user = User::where('id',Auth::user()->id)->first();
        $labo = Laboratory::where('user_id', $user->id)->first();
        $labos = Document::where('laboratory_destination_id',$labo->id)
                                ->where('laboratory_destination_id','!=', NULL)
                                ->selectRaw('laboratory_id')
                                ->groupBy('laboratory_id')
                                ->get();
        $documents = Document::where('laboratory_destination_id',$labo->id)
                                    ->where('laboratory_id',$id)
                                    ->selectRaw('analyse')
                                    ->selectRaw('document_name')
                                    ->selectRaw('flag_etat')
                                    ->selectRaw('created_at')
                                    ->selectRaw('patient_id')
                                    ->get();

        $document_en_attente = Document::where('laboratory_destination_id',$labo->id)
                                        ->where('flag_etat',1)
                                        ->count();
        $document_pret = Document::where('laboratory_destination_id',$labo->id)
                                     ->where('flag_etat',2)
                                     ->count();
        $document_en_cour = Document::where('laboratory_destination_id',$labo->id)
                                    ->where('flag_etat',0)
                                    ->count();
        $total = $document_en_attente + $document_pret + $document_en_cour;
        return view('labo.dashboard-labo',compact('labos','documents','document_en_attente','document_pret','total','id','laboratory','labo','document_en_cour'));
    }


   public function documentDoctor(){
    $id = null;
    $doctor = Doctor::where('user_id',auth::user()->id)->first();
    $documents = Document::where('doctor_id',$doctor->id)->get();
    $patients =  Document::where('doctor_id',$doctor->id)->get();
    $document_en_attente = Document::where('doctor_id',$doctor->id)
                                    ->where('flag_etat',0)
                                    ->count();
    $document_pret = Document::where('doctor_id',$doctor->id)
                               ->where('flag_etat',2)
                               ->count();
    $document_en_cour = Document::where('doctor_id',$doctor->id)
                               ->where('flag_etat',0)
                               ->count();
        
    $total = $document_en_attente + $document_pret +$document_en_cour;
    return view('doctor.dashboard-doctor',compact('documents','document_en_attente','document_pret','total','id','patients','doctor','document_en_cour'));
   }

   public function documentPatient($id){
    $id = $id;
    $doctor = Doctor::where('user_id',auth::user()->id)->first();
    $documents = Document::where('doctor_id',$doctor->id)
                          ->where('patient_id',$id)
                          ->get();
    $patients =  Document::where('doctor_id',$doctor->id)->get();
    $document_en_attente = Document::where('doctor_id',$doctor->id)
                                    ->where('flag_etat',1)
                                    ->count();
    $document_pret = Document::where('doctor_id',$doctor->id)
                               ->where('flag_etat',2)
                               ->count();
    $document_en_cour = Document::where('doctor_id',$doctor->id)
                               ->where('flag_etat',0)
                               ->count();
        
    $total = $document_en_attente + $document_pret +$document_en_cour;

    return view('doctor.dashboard-doctor',compact('documents','document_en_attente','document_pret','total','id','patients','doctor','document_en_cour'));
   }
}
