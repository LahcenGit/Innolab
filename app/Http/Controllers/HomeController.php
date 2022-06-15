<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::where('id',Auth::user()->id)->first();
        $yearsDocuments = Document::where('user_id',$user->id)
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('year')
                                   ->get();

        $monthDocuments = Document::where('user_id',$user->id)
                                   ->selectRaw('created_at')
                                   ->selectRaw('MONTH(created_at) month')
                                   ->selectRaw('YEAR(created_at) year')
                                   ->groupBy('created_at')
                                   ->groupBy('year')
                                   ->get();
       
        return view('patient.dashboard-patient',compact('user','yearsDocuments','monthDocuments'));
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
