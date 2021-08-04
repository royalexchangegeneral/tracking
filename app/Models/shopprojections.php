<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class shopprojections extends Model
{
    use HasFactory;
    public $table='shopprojection';

    public static function getregisterdetail(){
        $records = DB::table("shopprojection")->select("id","refno","names","address","email","phone")->get()->toArray();
        return $records;
    }

    public static function getpaydetail(){
        $records = DB::table("shopprojection")->select("id","refno","payrefno","atin","demandnotice","amount","lga","locationsite","existingprojection","projectsize","PaymentRetrivialReference")->get()->toArray();
        return $records;
    }
}
