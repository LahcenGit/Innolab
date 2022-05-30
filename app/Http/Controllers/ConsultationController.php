<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function showConsultation($name){

        $document = Document::where('document_name',$name)->first();
        $user = User::where('id',$document->user_id)->first();
        return view('consultation-detail',compact('document','user'));

    }
    public function showPdf($name){
        return view('consultation-pdf');

    }
}
