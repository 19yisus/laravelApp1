<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Nucleos extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'NameNucleo', 'address', 'status','codePostal','typeNucleo','codSede','permisos'
    ];

    protected function PaginateNucleos($n){
        return self::paginate($n);
    }

    public function forTypeNucleo($tip){
        return DB::table('nucleos')->select('id')->where('typeNucleo',$tip)->get();
    }
    
    public static function forOldId(){
        return DB::table('nucleos')->select('id')->get();
    }
}
