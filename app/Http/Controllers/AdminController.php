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
                $data['courses'] = $database->fetchCoursesStudents(); // Course list

                $search = $request->search;
                $course = $request->course;
                $year_level = $request->year;

                $data['enrolled'] = $database->fetchEnrolled();
                $data['search'] = $search;
                $data['all'] = $database->fetchAll($search,$course,$year_level);
            	$data['unenrolled'] = $database->fetchUnenrolled($search,$course,$year_level);
                $data['enrolled'] = $database->fetchEnrolleds($search,$course,$year_level);
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
                $first = Date('Y');
                $second = Date('Y',strtotime('+1 Year'));
                $school_year = $first.'-'.$second;
                $semester = $database->currentSemester();
            	$data['information'] = $database->fetch_information($email);

                $data['firstyear'] = $database->studentSubjects($email,1);
                $data['secondyear'] = $database->studentSubjects($email,2);
                $data['thirdyear'] = $database->studentSubjects($email,3);
                $data['fourthyear'] = $database->studentSubjects($email,4);

                $data['schedules'] = $database->fetchMySchedules($email,$semester->semester, $school_year);
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
            	$data['subjects'] = $database->fetchSubjectsAdmin($semester,$year,$search,$course); 
                $data['all'] = $database->fetchAllSubjects();
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
                    'course_id' => $request->input('course_id'),
                    'semester' => $request->input('semester'),
                    'year_level' => $request->input('year_level')
                  
         );

      
        $inserted = $database->insertSubject($data);

        if($inserted){
        	 return redirect('account/registrar/subjects')->with('success',"New subject successfully added");
        }else{
        	 return redirect('account/registrar/subjects')->with("error","Can't add subject.");
        }
     
    }


    public function edit_subject(Request $request)
    {
        $username = session('username');
        $database = new Database();
        $subject_id = $request->input('subject_id');

        $data = array(

            'subject'  => $request->input('subject'),
            'descriptive' => $request->input('descriptive'),
            'lec' => $request->input('lec'),
            'lab' => $request->input('lab'),
            'credit_units' => $request->input('credit_units'),
            'total_hours' => $request->input('total_hours'),
            'pre_req' => $request->input('pre_req'),
            'course_id' => $request->input('course_id'),
            'semester' => $request->input('semester'),
            'year_level' => $request->input('year_level')
                  
         );

      
        $updated = $database->updateSubject($subject_id,$data);

        if($updated){
             return redirect('account/registrar/subjects')->with('success',"Subject updated successfully.");
        }else{
             return redirect('account/registrar/subjects')->with("success","No changes.");
        }
     
    }



     // Fetch Faculty
     public function faculties(Request $request){

        if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();

                $search = $request->search;
                $data['faculties'] = $database->fetchFaculty($search);
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


    // Fetch Faculty
     public function users(Request $request){

        if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();

                $search = $request->search;
                $data['users'] = $database->fetchUsers($search);
                return view('administrator.users',$data);

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

    public function store_user(Request $request)
    {
     
        $database = new Database();


        $data = array(
                    'username'  => $request->input('username'),
                    'name'  => $request->input('name'),
                    'password'  => $request->input('password'),
                    'user_type'  => $request->input('user_type'),
                    'course_id'  => $request->input('course_id')
        );

      
        $inserted = $database->insertUser($data);

        if($inserted){
             return redirect('account/registrar/users')->with('success',"New user successfully added!");
        }else{
             return redirect('account/registrar/users')->with("error","Can't add user.");
        }
     
    }


    public function onremove_fac(Request $request){


         if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();

                $faculty_id = $request->faculty_id;
                return redirect('account/registrar/faculties')->with('delete_faculty',$faculty_id);
   

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


    public function remove_faculty(Request $request){

        $database = new Database();
        $faculty_id = $request->faculty_id;
        

        //Remove first schedule records
        $remove_sched = $database->facultySchedDelete($faculty_id);

        $removed = $database->deleteFaculty($faculty_id);

        if($removed){
            return redirect('account/registrar/faculties')->with('success','Faculty successfully removed');
        }else{
            return redirect('account/registrar/faculties')->with('error','Something went wrong!');
        }
     
    
        
    }

    public function remove_subject(Request $request){

        $database = new Database();
        $subject_id = $request->subject_id;
        

        //Remove first schedule records
        $remove_sched = $database->removeSubjectSched($subject_id);

        $removed = $database->removeSubject($subject_id);

        if($removed){
            return redirect('account/registrar/subjects')->with('success','Subject successfully removed');
        }else{
            return redirect('account/registrar/subjects')->with('error','Something went wrong!');
        }
     
    
        
    }


     public function remove_user(Request $request){

        $database = new Database();
        $username = $request->username;
        

        //Remove first schedule records
     

        $removed = $database->deleteUser($username);

        if($removed){
            return redirect('account/registrar/users')->with('success','User successfully remoed');
        }else{
            return redirect('account/registrar/users')->with('error','Something went wrong!');
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
             return redirect('account/registrar/faculties')->with('success',"New faculty successfully added!");
        }else{
             return redirect('account/registrar/faculties')->with("error","Can't add faculty.");
        }
     
    }



     // Fetch schedules
     public function schedules(Request $request){

    
        if(session('logged_in') == true){
            if(session('type') == 1){

                $database = new Database();

                $schedule_day = $request->schedule_day;
                $semester = $request->semester;
                $school_year = $request->school_year;
                $search = $request->search;
                $data['faculties'] = $database->fetchFaculty();
                $data['schedules'] = $database->fetchSchedules($schedule_day,$semester, $school_year,$search);

                $data['results'] = $search;
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
        $semester = $database->currentSemester();

        $data = array(
            'schedule_day' => $request->input('schedule_day'),
            'school_year' => $school_year,
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'semester' => $semester->semester,
            'subject_id' => $request->input('subject_id'),
            'room' => $request->input('room'),
            'slots' => $request->input('slots'),
            'status' => 1,
            'faculty_id' => $request->input('faculty_id')
        );

       

        $conflicted = $database->checkSchedConflict($request->input('schedule_day'),$request->input('start_time'),$semester->semester,$school_year,$request->input('room'));

        if($conflicted){
            return redirect('account/registrar/subjects')->with("error","Schedule conflict!");
        }else{

             $inserted = $database->insertSchedule($data);

             if($inserted){
                 return redirect('account/registrar/subjects')->with('success',"New schedule successfully added!");
             }else{
                 return redirect('account/registrar/subjects')->with("error","Can't add schedule.");
             }
        }
       
     
    }

    public function edit_schedule(Request $request)
    {

        $database = new Database();

    
        $schedule_id = $request->input('schedule_id');

        $data = array(
            'schedule_day' => $request->input('schedule_day'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'room' => $request->input('room'),
            'slots' => $request->input('slots'),
            'status' => 1,
            'faculty_id' => $request->input('faculty_id')
        );

       

        $update = $database->updateSchedule($schedule_id,$data);

        if($update){
            return redirect('account/registrar/schedules')->with('success','Changes saved!');
        }else{

           
            return redirect('account/registrar/schedules')->with("error","Something went wrong!");
             
        }
       
     
    }

   public function remove_schedule(Request $request){

        $database = new Database();
        $schedule_id = $request->schedule_id;
        

        //Remove first schedule records
        $remove_sched = $database->removeSched($schedule_id);

     
        if($remove_sched){
            return redirect('account/registrar/schedules')->with('success','Deletion successful!');
        }else{
            return redirect('account/registrar/schedules')->with('error','Something went wrong!');
        }
     
    
        
    }



    public function update_semester(Request $request)
    {

        $database = new Database();

        $semester = $request->sem;

        $data1 = array(
            'status' => 0
        );


        $resetFirst = $database->resetFirst($data1);

        if($resetFirst){

            $data2 = array(
                'status' => 1
            );

            $updateStatus = $database->updateStatus($semester, $data2);

            return redirect('account/registrar/students')->with('success',"Semester changed");
        }else{
            return redirect('account/registrar/students')->with("error","Something went wrong!");
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
	   return redirect('account/registrar//students')->with('success', 'Verification successful, Password is successfully emailed');
    	
    }


    public function view_subjects(Request $request, $email){

        if(session('logged_in') == true){
                if(session('type') == 1){

                    $database = new Database();

                    $data['information'] = $database->fetch_information($email);
                    $data['schedules'] = $database->fetchEvaluated($email);

                    return view('administrator.view',$data);

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

    public function enroll(Request $request){

        if(session('logged_in') == true){
                if(session('type') == 1){

                    $database = new Database();

                    $email = $request->student_email;

                    $subjects = $database->fetchEval($email);

                    $standing = $database->latestStanding($email);

                    $getdate = Date('Y-m-d H:i:s');

                    foreach($subjects as $subject){

                        $data = array(

                            'schedule_id' => $subject->schedule_id,
                            'student_email' => $email,
                            'date_added' => $getdate
                        );

                        $database->insertStudSubjects($data);
                    }

                    $update = array(

                            'enrolled' => 1,
                            'year_level' => $standing->standing
                    );

                    $updateStanding = $database->updateStanding($email,$update);

                    if($updateStanding){

                         $delete = $database->removeSubjectRequest($email);

                        $username = session('username');
                        $data = array(
                            'notification' => "You're enrollment request is confirmed, you are now successfully enrolled.",
                            'sent_from' => $username,
                            'sent_to' => $email,
                            'type' => 1,
                            'status' => 0,
                            'date_sent' => Date('Y-m-d H:i:s')
                        );
                        $inserted = $database->insertNotification($data);

                         return redirect('account/registrar/students')->with('success','Student successfully enrolled.');

                    }else{

                        return redirect('account/registrar/students')->with('error','Something went wrong!');

                    }


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


     public function unenroll(Request $request){

            if(session('logged_in') == true){
                if(session('type') == 1){

                    $database = new Database();

                    
                    $data = array(
                        'enrolled' => 0
                    );
                    $update = $database->unenrolled($data);

                  
                    if($update){

                         return redirect('account/registrar/students')->with('success','All students successfully unenrolled');

                    }else{

                         return redirect('account/registrar/students')->with('error','Something went wrong!');
                    }
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
     


    public function reject(Request $request){

        if(session('logged_in') == true){
                if(session('type') == 1){

                    $database = new Database();

                    $username = session('username');

                    $email = $request->student_email;

                    $removed = $database->removeSubjectRequest($email);

                    if($removed){

                         $data = array(
                            'notification' => $request->notification,
                            'sent_from' => $username,
                            'sent_to' => $email,
                            'type' => 1,
                            'status' => 0,
                            'date_sent' => Date('Y-m-d H:i:s')
                        );

                         $inserted = $database->insertNotification($data);


                         return redirect('account/registrar/students')->with('success','Student enrollment rejected.');

                    }else{

                         return redirect('account/registrar/students')->with('error','Something went wrong!');

                    }


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
}
