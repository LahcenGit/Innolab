<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;


class DocumentController extends Controller
{
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
        if($request->key == 32443131311){
        $document = new Document();
        $user = User::where('id_logiciel',$request->id_logiciel)->first();
        $document->user_id = $user->id;

        $document->document_name = $request->document_name;
        $document->analyse = $request->analyse;
        $document->etat = $request->etat;
        $document->save();
        return $document;
        }
        else return "error";
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
    public function updateDocument(Request $request)
    {
      
        if($request->key == 32443131311){
            $document = Document::where('document_name',$request->document_name)->first();
            $document->etat = $request->etat;
            $document->save();
            return $document;
            }
            else return "error";
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
    }
}
