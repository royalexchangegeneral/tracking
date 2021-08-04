<?php

namespace App\Http\Controllers;

use App\Models\Thirdpartycardpayments;
use App\Models\shopprojections;
use App\Models\otherproduct;
use App\Models\subproduct;
use App\Models\Tppay;
use App\Models\Vehiclemake;
use App\Models\User;
use App\Events\TpSMS;
use App\Events\WelcomeSMS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\TpPolicyMail;
use App\Jobs\ProcessMail;
use App\Jobs\ProcessWelcomemail;
use App\Models\Vehiclemodel;
use Subproducts;
use DateTime;
use Elibyy\TCPDF\Facades\TCPDF;
use PDF;
use App\Exports\RegDetail;
use App\Exports\payDetail;
use Excel;


class PageController extends Controller
{

    //
    public function regIntoexcel(){
       return Excel::download(new RegDetail,'regdetails.xlsx');
    }
    public function regIntocsv(){
        return Excel::download(new RegDetail,'regdetails.csv');
     }
     public function payIntoexcel(){
        return Excel::download(new payDetail,'paydetails.xlsx');
     }
     public function payIntocsv(){
         return Excel::download(new payDetail,'paydetails.csv');
      }
    public function index(){
        return view('index');
    }
    public function datareview(){
        return view('datareview');
    }
    public function verdetail(){
        return view('verdetail');
    }
    public function success(){
        return view('success');
    }
    public function paynow(){
        return view('paynow');
    }
    public function login(){

        return view('login');
    }
    public function dashboard(){
        // if(!session()->has('user')){
        //     return view('login');
        // }
        return view('dashboard');
    }
    public function regtable(){
        if(!session()->has('user')){
            return view('login');
        }
         $datas = shopprojections::all();
         return view('regtable',compact('datas'));
        
    }
    public function lagtable(){
        if(!session()->has('user')){
            return view('login');
        }
         $datas = shopprojections::all();
         return view('lagtable',compact('datas'));
        
    }
    public function paytable(){
        if(!session()->has('user')){
            return view('login');
        }
         $datas = shopprojections::all();
         return view('paytable',compact('datas'));
        
    }


}
