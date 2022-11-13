<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Faker\Core\File;
use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function qrCode($token){

        $document = Document::where('token',$token)->first();
        $file = 'files/'.$document->document_name.'.pdf';
          $exist_file = file_exists( public_path().'files/'.$document->document_name.'.pdf' ); 
          
           if($document->flag_etat == 0 || $document->flag_etat == 1 || $exist_file == false){
           
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

