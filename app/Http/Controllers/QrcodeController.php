<?php

namespace App\Http\Controllers;

use App\Models\Document;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class QrcodeController extends Controller
{
    //
    public function qrCode($token){

        $document = Document::where('token',$token)->first();
        if($document){
            $file = 'files/'.$document->document_name.'.pdf';

            $destinationPath = public_path($file);
            $exist_file = File::exists($destinationPath );

            if($document->flag_etat == 0 || $document->flag_etat == 1 || $exist_file == false){
                return view('message',compact('document','exist_file'));
            }

            else{

                return view('message',compact('document','exist_file'));

               /* $headers = [
                    'Content-Type' => 'application/pdf'
                ];

                return response()->file($file, $headers);*/
            }
        }
        else{
            $exist_file = false;
            return view('message',compact('document','exist_file'));
        }

    }

    public function showFile($token){

        $document = Document::where('token',$token)->first();
        $file = 'files/'.$document->document_name.'.pdf';

        $destinationPath = public_path($file);
        $exist_file = File::exists($destinationPath );

        $headers = [
            'Content-Type' => 'application/pdf'
        ];

        return response()->file($file, $headers);

    }


}

