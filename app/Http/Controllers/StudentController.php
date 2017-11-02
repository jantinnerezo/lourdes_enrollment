<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;


class StudentController extends Controller
{
    
    public function profile(Request $request,$name){
       
    	if(session('logged_in') == true){
            if(session('type') == 1){

            }
            if(session('type') == 2){

            }
            else{

            	$database = new Database();

		        $email = $request->session()->get('email');
		        $course_id = $request->session()->get('course_id');

		        //$semester = $request->semester;
		        //$year = $request->year;
		        //$current_year = $request->session()->get('year');

		        $data['information'] = $database->fetch_information($email);
		        return view('student.profile',$data);

		        
            }
        }
        else{

        	return redirect('login');

        }
      

    }


     // Fetch All Subjects
     public function subjectsOffered($course){

        if(session('logged_in') == true){
            if(session('type') == 1){

               return redirect('user/login');

            }
            if(session('type') == 2){

                return redirect('user/login');
            }
            else{

                 $database = new Database();

                $course_id = session('course_id');
                $year = session('year');

                $data['subjects'] = $database->fetchSubjects($course_id, $year); // Course list
                return view('student.subjects',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }

}
