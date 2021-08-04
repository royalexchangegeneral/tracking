<?php

namespace App\Http\Controllers;
use App\Http\Requests\thirdpartybuy;
use Illuminate\Http\Request;
use App\Models\shopprojections;
use App\Models\attendance;
use App\Models\member;
use App\Models\user;
use Illuminate\Support\Facades\Validator;
use App\Events\TpSMS;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use DateTime;



class CustomerController extends Controller
{


  public function newregister(Request $request)
  {
    
    $fname = $request->fname;
    $lname = $request->lname;
    $email = $request->email;
    $phone = $request->phone;
    $date  = $request->dateadded;


    $members=new member;


    $members->fname=$fname;
    $members->lname=$lname;
    $members->email=$email;
    $members->phone=$phone;
    $members->dateadded =$dateadded;
  
    $members->save();

    $attendance = new attendance;

    $attendance->memberid=$fname;
    $attendance->timein=$timein;
    $attendance->location=$location;
    $attendance->timeout=$timeout;
    $attendance->meetingid =$meetingid;

    $attendance->save();

    return response(array("Status"=>true, "Message"=>" Thank you have successfully registered your attendance !!"), 201);


  }

  public function attendance(Request $request)
  {
    
    
    $attendance = new attendance;

    $attendance->memberid=$fname;
    $attendance->timein=$timein;
    $attendance->location=$location;
    $attendance->timeout=$timeout;
    $attendance->meetingid = $meetingid;
    $attendance->attenddate = $attenddate;

    $attendance->save();

    return response(array("Status"=>true, "Message"=>" Thank you successfully registered as a first timer !!"), 201);
  }






   public function userauth(Request $request){
            
              $data = $request->input();
              $username = $data['user'];
              $pswd = $data['pwd'];
              $request = session()->put('user',$data['user']);
              $status = "active";
              $verify = new user;
              $verify = user::where('username',$username)->where('password',$pswd)->where('status',$status)->first();

              if($verify===null){
                  return redirect('/login');
              }else{
                
                  return redirect('dashboard');
        
              }
              
       
    }
    public function createuser(Request $request){
        $data = $request->input();
        $username = $data['user'];
        $password = $data['pwd'];
        

        $verify = new user;
        $verify->username=$request->user;
        $verify->password=$request->pwd;
        $verify->status="active";
        $verify->save();

        $request->session()->flash('message', 'user Added Successfully');
        return redirect()->back();



    }

}
