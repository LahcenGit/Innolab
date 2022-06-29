<?php

namespace App\Http\Controllers;

use App\Models\Document;
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
      //  $this->middleware('auth');
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
        $years = Document::where('user_id',$user->id)
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('year')
                                   ->get()->reverse();

        $recent_year = Document::where('user_id',$user->id)
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

        $documents = Document::where('user_id',$user->id)
                                   ->whereYear('created_at',$recent_year)
                                   ->selectRaw('MONTHNAME(created_at) month')
                                   ->selectRaw('analyse')
                                   ->selectRaw('document_name')
                                   ->selectRaw('etat')
                                   ->selectRaw('created_at')
                                   ->get();

       $documents = collect($documents)
        ->groupBy('month');

        $keys = $documents->keys();



        $monthDocuments = Document::where('user_id',$user->id)
                                   ->selectRaw('created_at')
                                   ->selectRaw('MONTH(created_at) month')
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('created_at')
                                   ->groupBy('year')
                                   ->get();

        return view('patient.dashboard-patient',compact('user','years','recent_year','documents'));
    }


    public function patientWithYear($year){

        $now = Carbon::now();
        $user = User::where('id',Auth::user()->id)->first();
        $years = Document::where('user_id',$user->id)
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('year')
                                   ->get()->reverse();

        $recent_year = $year;
      
        $documents = Document::where('user_id',$user->id)
                                ->whereYear('created_at',$year)
                                ->selectRaw('MONTHNAME(created_at) month')
                                ->selectRaw('analyse')
                                ->selectRaw('document_name')
                                ->selectRaw('etat')
                                ->selectRaw('created_at')
                                ->get();

        $documents = collect($documents)
        ->groupBy('month');

        $keys = $documents->keys();
       
        return view('patient.dashboard-patient',compact('user','years','recent_year','documents'));
    }



    public function document($month , $year){
        $user = User::where('id',Auth::user()->id)->first();
        $document = Document::where('user_id',$user->id)
                               ->whereYear('created_at', $year)
                               ->whereMonth('created_at', $month)
                               ->get();
        return $document;
    }
}
