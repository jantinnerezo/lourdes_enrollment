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
            	$username = session('username');
            	$data['notifications'] = $database->fetchNotifications(false,$username);
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



     public function evaluation(Request $request, $email, $notification_id){

        if(session('logged_in') == true){
            if(session('type') == 1){

                
                return redirect('user/login');

            }
            if(session('type') == 2){

                $database = new Database();
                $data['information'] = $database->fetch_information($email);
                $data['schedules'] = $database->fetchSubjectRequest($email);
                $data['notification_id'] = $notification_id;
                return view('coordinator.evaluation',$data);
            }
            else{

                return redirect('login'); 
            }
        }
        else{

            return redirect('user/login');

        }
    }



     public function evaluated(Request $request){

        $database = new Database();
        $schedule_id = $request->schedule_id;
        $username = session('username');
        $student_email = $request->student_email;
        $notification_id = $request->notification_id;

        if(!IS_NULL($request->notification)){

            foreach($schedule_id as $sched_id){ 

                $delete = $database->rejectRequest($sched_id, $student_email);
            }

            $data = array(
                'notification' => $request->notification,
                'sent_from' => $username,
                'sent_to' => $request->student_email,
                'type' => 1,
                'status' => 0,
                'date_sent' => Date('Y-m-d H:i:s')
            );

            $hasRequest = $database->fetchSubjectRequest($student_email);

           if(count($hasRequest) > 0){

                 $inserted = $database->insertNotification($data);

                   if($inserted){


                         return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('success', "Subjects successfully rejected and notification successfully sent.");
                   }else{
                        return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('error', "Something went wrong.");
                   }

           }else{

                 $removed = $database->deleteNotification($notification_id);

                 $inserted = $database->insertNotification($data);

                   if($inserted){

                         return redirect('account/coordinator/coordinator')->with('success', "Subjects successfully rejected and notification successfully sent.");
                   }else{
                        return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('error', "Something went wrong.");
                   }
           }

          




        }else{

            
             foreach($schedule_id as $sched_id){ 

                $conflicted = $database->checkConflict($sched_id);

                $schedule_day = $conflicted->schedule_day;
                $semester = $conflicted->school_year;
                $start_time = $conflicted->start_time;
                $room = $conflicted->room;
                $subject = $conflicted->subject;

                $schedule = $database->checkConflicted($schedule_day, $semester, $start_time, $room);

                if($conflicted){

                     return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('error', "Subject " .$subject. " has conflict.");


                }else{

                      $data = array(

                        'standing' => $request->standing,
                        'evaluated' => 1
                     );

                

                         $update = $database->updateRequest($sched_id, $student_email,$data);

                }


              
            
             }

              $notify = array(
                'notification' => 'Subjects you requested for enrollment evaluated successfully and already submitted to registrar for confirmation.',
                'sent_from' => $username,
                'sent_to' => $request->student_email,
                'type' => 1,
                'status' => 0,
                'date_sent' => Date('Y-m-d H:i:s')
             );


             $hasRequest = $database->fetchSubjectRequest($student_email);


              if(count($hasRequest) > 0){

                 $inserted = $database->insertNotification($notify);

                   if($inserted){


                         return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('success', "Subjects successfully evaluated and submitted to registrar for confirmation.");
                   }else{
                        return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('error', "Something went wrong.");
                   }

               }else{

                     $removed = $database->deleteNotification($notification_id);

                     $inserted = $database->insertNotification($notify);

                       if($inserted){

                             return redirect('account/coordinator/coordinator')->with('success', "Subjects successfully evaluated and submitted to registrar for confirmation.");
                       }else{
                            return redirect('account/coordinator/request/'.$request->student_email.'/'.$notification_id)->with('error', "Something went wrong.");
                       }
               }



        }


      
        
    }


     public function student_prof(Request $request, $email){

        if(session('logged_in') == true){
            if(session('type') == 1){

                
                return redirect('user/login');

            }
            if(session('type') == 2){

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
                return view('coordinator.student',$data);
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
