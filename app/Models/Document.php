<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Document extends Model
{
    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'id',
        
    ];
    public function monthTranslate(){
        if($this->month == 'January'){
            return 'Janvier';
        }
        if($this->month == 'February'){
            return 'Février';
        }
        if($this->month == 'March'){
            return 'Mars';
        }
        if($this->month == 'April'){
            return 'Avril';
        }
        if($this->month == 'May'){
            return 'Mai';
        }
        if($this->month == 'June'){
            return 'Juin';
        }
        if($this->month == 'July'){
            return 'Juillet';
        }
        if($this->month == 'August'){
            return 'Aôut';
        }
        if($this->month == 'September'){
            return 'Septembre';
        }
        if($this->month == 'October'){
            return 'Octobre';
        }
        if($this->month == 'November'){
            return 'Novembre';
        }
        if($this->month == 'December'){
            return 'Décembre';
        }
    }
    public function Laboratory(){
        return $this->belongsTo(Laboratory::class,'laboratory_id');
    }

    public function getLabo(){
        $labo = null;
        $labo= Laboratory::where('id',$this->laboratory_id)->first();
        return $labo;
    }
    public function getPatient(){
        $patient = null;
        $patient= Patient::where('id',$this->patient_id)->first();
        return $patient;
    }
}
