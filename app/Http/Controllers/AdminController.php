<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;


class AdminController extends Controller
{

	// Fetch all students - verified and unverified
    public function students(Request $request,$username){

    	if(session('logged_in') == true){
            if(session('type') == 1){

            	$database = new Database();
            	$data['verified'] = $database->fetchVerified();
            	$data['unverify'] = $database->fetchUnverify();
		        return view('administrator.students',$data);

            }
            if(session('type') == 2){

            	return redirect('user/login');
            }
            else{

            	return redirect('login'); 
            }
        }
        else{

        	return redirect('user/login');

        }
    }



    // Fetch all students - verified and unverified
    public function student(Request $request,$username,$email){

    	if(session('logged_in') == true){
            if(session('type') == 1){

            	$database = new Database();
            	$data['information'] = $database->fetch_information($email);
		        return view('administrator.student',$data);

            }
            if(session('type') == 2){

            	return redirect('user/login');
            }
            else{

            	return redirect('login'); 
            }
        }
        else{

        	return redirect('user/login');

        }
    }


    // Fetch All Subjects
     public function subjects(Request $request,$username){

    	if(session('logged_in') == true){
            if(session('type') == 1){

            	$database = new Database();
            	$course = $request->course;
            	$data['courses'] = $database->fetchCourses(); // Course list
            	$data['subjects'] = $database->fetchSubjects($course); // Course list
		        return view('administrator.subjects',$data);

            }
            if(session('type') == 2){

            	return redirect('user/login');
            }
            else{

            	return redirect('login'); 
            }
        }
        else{

        	return redirect('user/login');

        }
    }

    public function store_subject(Request $request)
    {
    	$username = session('username');
        $database = new Database();
        $data = array(

                    'subject'  => $request->input('subject'),
                    'descriptive' => $request->input('descriptive'),
                    'lec' => $request->input('lec'),
                    'lab' => $request->input('lab'),
                    'credit_units' => $request->input('credit_units'),
                    'total_hours' => $request->input('total_hours'),
                    'pre_req' => $request->input('pre_req'),
                    'availability' => $request->input('availability'),
                    'course_id' => $request->input('course_id'),
                    'semester' => $request->input('semester'),
                    'year_level' => $request->input('year_level'),
                    'status' => 1
                  
         );

      
        $inserted = $database->insertSubject($data);

        if($inserted){
        	 return redirect('account/registrar/'.$username.'/subjects')->with('dialog_success',true);
        }else{
        	 return redirect('account/registrar/'.$username.'/subjects')->with("Error");
        }

      
     
    }



    public function verify_students(Request $request){

    	$emails = $request->emails;
    	$database = new Database();
    	$username = session('username');
   
    	foreach($emails as $email){ 
    		  
              $informations = $database->fetch_information($email);

        	  $data['email'] = $email;
       		  $data['name'] = $informations->firstname . ' ' .$informations->lastname;
              $data['password'] = $informations->password;
              
		      try{

                 Mail::send('emails.confirm', $data, function($message) use($data) {
                    $message->to($data['email']);
                    $message->subject('Lourdes College BUSAC-IT Enrollment - Enrollment Registration Response');

                 });

                   $data = array(
            				'confirmed' => 1
        			);
        			$updated = $database->confirmStudent($email,$data);
         
	        }catch(\Exception $e){

	            return redirect('account/registrar/'.$username.'/students')->with('error', 'Registration unsuccessful, cannot send email because there is no internet connection. Please try again later. ');

	        }
		
		 }
	   return redirect('account/registrar/'.$username.'/students')->with('success', true);
    	
    }
}
