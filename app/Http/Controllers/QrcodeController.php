<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function qrCode($token){
        $document = Document::where('token',$token)->first();
        $file = 'files/'.$document->document_name.'.pdf';
        if($document->flag_etat == 0 || $document->flag_etat == 1){
           
            return view('message',compact('document'));
        }
        else{
            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            return response()->file($file, $headers);
        } 
        }
}

