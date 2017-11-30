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
     public function subjectsOffered(Request $request,$course){

        if(session('logged_in') == true){
            if(session('type') == 1){

               return redirect('user/login');

            }
            if(session('type') == 2){

                return redirect('user/login');
            }
            else{

                $database = new Database();

                // Sort variables
                $course_id = session('course_id');
                $semester = $request->semester;
                $year = $request->year;
                $search = $request->search;
                //$course = session('course');
                

                $data['subjects'] = $database->fetchSubjects($semester,$year,$search,$course); // Course list
                return view('student.subjects',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }



    // Fetch All Subjects
     public function scheduleList(Request $request,$course){

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
                $year_level = session('year');
                $day = $request->day;
                $search = $request->search;
                $semester = $database->currentSemester();
                $data['schedules'] = $database->fetchSchedulesYear($course_id, $semester->semester, $year_level, $day, $search);
                return view('student.schedules',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }


     // Fetch All Subjects
     public function my_schedules(Request $request,$name){

        if(session('logged_in') == true){
            if(session('type') == 1){

               return redirect('user/login');

            }
            if(session('type') == 2){

                return redirect('user/login');
            }
            else{

                $first = Date('Y');
                $second = Date('Y',strtotime('+1 Year'));
                $school_year = $first.'-'.$second;

                $database = new Database();
                $semester = $database->currentSemester();
                $email = session('email');
                $data['information'] = $database->fetch_information($email);
                $data['schedules'] = $database->fetchMySchedules($email,$semester->semester, $school_year);
                return view('student.my_schedules',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }


     // Fetch All Subjects
     public function my_subjects(Request $request,$name){

        if(session('logged_in') == true){
            if(session('type') == 1){

               return redirect('user/login');

            }
            if(session('type') == 2){

                return redirect('user/login');
            }
            else{

                $first = Date('Y');
                $second = Date('Y',strtotime('+1 Year'));
                $school_year = $first.'-'.$second;

                $database = new Database();
                $semester = $database->currentSemester();
                $email = session('email');
                $data['firstyear'] = $database->studentSubjects($email,1);
                $data['secondyear'] = $database->studentSubjects($email,2);
                $data['thirdyear'] = $database->studentSubjects($email,3);
                $data['fourthyear'] = $database->studentSubjects($email,4);
                return view('student.my_subjects',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }


      // Fetch All Subjects
     public function requestedSubjects(Request $request,$name){

        if(session('logged_in') == true){
            if(session('type') == 1){

               return redirect('user/login');

            }
            if(session('type') == 2){

                return redirect('user/login');
            }
            else{

                $database = new Database();
                $email = session('email');
                $data['schedules'] = $database->fetchRequested($email);
                return view('student.request',$data);
            }
        }
        else{

            return redirect('user/login');

        }
    }

    public function notifications(Request $request,$name){
       
        if(session('logged_in') == true){
            if(session('type') == 1){

            }
            if(session('type') == 2){

            }
            else{

                $database = new Database();

                $email = $request->session()->get('email');
                $course_id = $request->session()->get('course_id');
                $data['notifications'] = $database->fetchNotifications($email,false);
                return view('student.notifications',$data);

                
            }
        }
        else{

            return redirect('login');

        }
      

    }



    public function submit_enrollment(Request $request){

        $schedule_id = $request->schedule_id;
        $database = new Database();
        $email = session('email');
        $course = session('course');
        $course_id = session('course_id');
        $studentname = session('name');
        $urlname = session('urlname');

        $requested = $database->fetchRequested($email);
        $coordinator = $database->getCoordinator($course_id);

    
        if(count($requested) > 0){
             return redirect('schedules/'.$course)->with('error', "You still have subject request that needs to be evaluated.");
        }else{
              foreach($schedule_id as $sched_id){ 

               $getSlots = $database->getSlots($sched_id);

               $new_slot = $getSlots->slots - 1;

               $slots = array(
                    'slots' => $new_slot
               );

               $updateSlots = $database->updateSlots($sched_id, $slots);

               $data = array(
                        'schedule_id' => $sched_id,
                        'student_email' => $email,
                        'standing' => 0,
                        'evaluated' => 0,
                        'request_date' => Date('Y-m-d H:i:s')
                );

                $getsubject_id = $database->getSubject_id($sched_id);

                $checkExisted = $database->checkExisted($getsubject_id->subject_id);

               if($checkExisted){

                 return redirect('schedules/'.$course)->with('success', "There are subjects that you already enrolled, please review your subjects taken.");

               }else{

                     $inserted = $database->insertRequest($data);
               }    

              

            }

           $count = count($schedule_id);
           $data = array(
                'notification' => $studentname. ' submitted '.$count.' subjects for evaluation',
                'sent_from' => $email,
                'sent_to' => $coordinator->username,
                'type' => 2,
                'status' => 0,
                'date_sent' => Date('Y-m-d H:i:s')
           );
           $inserted = $database->insertNotification($data);

           if($inserted){
                 return redirect('account/student/request/'.$urlname)->with('success', "Subjects requested submitted to your course coordinator for evaluation, you will receive a notification from your coordinator after evaluation.");
           }else{

           }
          
        }
   
      
        
    }




    public function cancel_request(Request $request){

        $request_id = $request->request_id;
        $database = new Database();
        $email = session('email');
        $course = session('course');
        $urlname = session('urlname');

        $requested = $database->fetchRequested($email);

      
        foreach($request_id as $req_id){ 
              
           

               $removed = $database->removeRequest($req_id);

         
        }
   
      return redirect('account/student/request/'.$urlname)->with('success', "Subjects requested cancelled");
        
    }

}
