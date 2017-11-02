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
    public function students(Request $request){

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
    public function student(Request $request,$email){

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
     public function subjects(Request $request){

    	if(session('logged_in') == true){
            if(session('type') == 1){

            	$database = new Database();

            	$course = $request->course;
                $semester = $request->semester;
                $year = $request->year;
                $search = $request->search;

            	$data['courses'] = $database->fetchCourses(); // Course list
            	$data['subjects'] = $database->fetchSubjects($semester,$year,$search,$course); 
                $data['faculties'] = $database->fetchFaculty();
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
        	 return redirect('account/registrar/subjects')->with('success_subject',true);
        }else{
        	 return redirect('account/registrar/subjects')->with("error_subject",true);
        }
     
    }



     // Fetch Faculty
     public function faculties(){

        if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();
                $data['faculties'] = $database->fetchFaculty();
                return view('administrator.faculties',$data);

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

    public function store_faculty(Request $request)
    {
     
        $database = new Database();
        $data = array(
                    'faculty_name'  => $request->input('faculty_name'),
         );

      
        $inserted = $database->insertFaculty($data);

        if($inserted){
             return redirect('account/registrar/faculties')->with('success',true);
        }else{
             return redirect('account/registrar/faculties')->with("error",true);
        }
     
    }



     // Fetch schedules
     public function schedules(){

        if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();
                $data['schedules'] = $database->fetchSchedules();
                $data['sy'] = $database->fetchYear();
                return view('administrator.schedules',$data);

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




    public function store_schedule(Request $request)
    {

        $database = new Database();

        $first = Date('Y');
        $second = Date('Y',strtotime('+1 Year'));
        $school_year = $first.'-'.$second;


        $data = array(
            'schedule_day' => $request->input('schedule_day'),
            'school_year' => $school_year,
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'semester' => $request->input('semester'),
            'subject_id' => $request->input('subject_id'),
            'room' => $request->input('room'),
            'faculty_id' => $request->input('faculty_id')
        );

        $conflicted = $database->checkSchedConflict($request->input('schedule_day'),$request->input('start_time'),$request->input('semester'),$school_year,$request->input('room'));

        if($conflicted){
            return redirect('account/registrar/subjects')->with("conflict_schedule",true);
        }else{

             $inserted = $database->insertSchedule($data);

             if($inserted){
                 return redirect('account/registrar/subjects')->with('success_schedule',true);
             }else{
                 return redirect('account/registrar/subjects')->with("error_schedule",true);
             }
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

	            return redirect('account/registrar/students')->with('error', 'Registration unsuccessful, cannot send email because there is no internet connection. Please try again later. ');

	        }
		
		 }
	   return redirect('account/registrar/'.$username.'/students')->with('success', true);
    	
    }
}
