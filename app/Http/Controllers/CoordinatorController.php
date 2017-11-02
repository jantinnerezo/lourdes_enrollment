<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;

class CoordinatorController extends Controller
{
   // 
    public function coordinator(Request $request){

    	if(session('logged_in') == true){
            if(session('type') == 1){

            	
		        return redirect('user/login');

            }
            if(session('type') == 2){

            	$database = new Database();
            	$course_id = session('course_id');
            	$data['notifications'] = $database->fetchNotifications($course_id);
            	//$data['unverify'] = $database->fetchUnverify();
		        return view('coordinator.coordinator',$data);
            }
            else{

            	return redirect('login'); 
            }
        }
        else{

        	return redirect('user/login');

        }
    }

}
