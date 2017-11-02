<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Database extends Model
{
    // Courses Table =================================================================================
     public function fetchCourses(){

    	$rows = DB::table('tbl_course')->get();

    	if($rows){
    		return $rows;
    	}else{
    		return false;
    	}
        
    }


    // Countries Table =================================================================================
     public function fetchCountries(){

    	$rows = DB::table('tbl_countries')->get();

    	if($rows){
    		return $rows;
    	}else{
    		return false;
    	}
        
    }


    // Students Table =================================================================================
     public function newStudent($data){

         $inserted = DB::table('tbl_students')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }

    // Confirm Student
    public function confirmStudent($email,$updated){
        
        $confirmed = DB::table('tbl_students')
        ->where('email', $email)
        ->update($updated);

        if($confirmed){
            return true;
        }else{

            return false;
        }
    }  

    // Check email if exist
     public function checkIfExist($email){

      $result = DB::table('tbl_students')->where('email', '=', $email)->first(); 
	    if($result){
	        return true;
	    }else{
	        return false;
	    }
    }


    // Fetch All Verified
     public function fetchVerified(){

      $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.confirmed', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    // Fetch All Verified
     public function fetchUnverify(){

      $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->join('tbl_countries', 'tbl_countries.country_code', '=', 'tbl_students.country_code')
                      ->select('tbl_students.*','tbl_course.*','tbl_countries.*')
                      ->where('tbl_students.confirmed', '=', 0)
                      ->orderBy('tbl_students.date_enrolled', 'desc')
                      ->get(); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    // Compare email and password
    public function loggedIn($email,$password){

        $results = DB::table('tbl_students')
                         ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                         ->select('tbl_students.*','tbl_course.*')
                         ->where('tbl_students.email', '=', $email)
                         ->where('tbl_students.password', '=', $password)->first(); 
         
        if($results){
            return $results;
        }else{
            return false;
        }
    }

    // Fetch student information
    public function fetch_information($email){

        $row = DB::table('tbl_students')
         ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
         ->join('tbl_countries', 'tbl_countries.country_code', '=', 'tbl_students.country_code')
         ->select('tbl_students.*','tbl_course.*','tbl_countries.*')
         ->where('email',$email)->first();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }

     // Admin Table =================================================================================
    public function loginUser($username,$password){

        $results = DB::table('tbl_user')
                         ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_user.course_id')
                         ->select('tbl_user.*','tbl_course.*')
                         ->where('tbl_user.username', '=', $username)
                         ->where('tbl_user.password', '=', $password)->first(); 
         
        if($results){
            return $results;
        }else{
            return false;
        }


    }


   
    // Subjects Table =================================================================================
     public function insertSubject($data){

         $inserted = DB::table('tbl_subjects')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }


    // Fetch All subjects
     public function fetchSubjects($semester = FALSE, $year = FALSE,$search = FALSE, $course = FALSE){


        if($semester || $year || $search || $course){
            $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->where(function ($query) use($search) {
                    $query->where('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_subjects.descriptive', 'like', "%$search%");
                })
            ->where(function ($query) use($course) {
                    $query->where('tbl_course.course', '=', $course)
                          ->orWhere('tbl_course.course', '=', 'Universal');
                })
            ->where('tbl_subjects.semester','=',$semester)
            ->where('tbl_subjects.year_level','=',$year)
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }

        }else{
              $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }

     
        }
      
    }

    // Faculty Table =================================================================================
    public function fetchFaculty(){

        $rows = DB::table('tbl_faculty')->get();

        if($rows){
            return $rows;
        }else{
            return false;
        }
        
    }

    public function insertFaculty($data){

         $inserted = DB::table('tbl_faculty')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }


     // Schedule Table =================================================================================

     public function fetchSchedules(){

      $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

      public function fetchSchedulesYear($course_id,$year_level){

      $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_subjects.course_id','=',$course_id)
                      ->where('tbl_subjects.year_level','=',$year_level)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }



     public function fetchRequested($email){

      $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->join('tbl_subreq', 'tbl_subreq.schedule_id', '=', 'tbl_schedule.schedule_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*','tbl_subreq.*')
                      ->where('tbl_subreq.student_email',$email)
                      ->orderBy('tbl_subreq.request_date', 'DESC')
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

     public function insertRequest($data){

         $inserted = DB::table('tbl_subreq')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }

      public function insertNotification($data){

         $inserted = DB::table('tbl_notification')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }

     public function fetchNotifications($course_id){

      $result = DB::table('tbl_notification')
                      ->join('tbl_students', 'tbl_students.email', '=', 'tbl_notification.student_email')
                      ->select('tbl_notification.*')
                      ->where('tbl_students.course_id',$course_id)
                      ->orderBy('tbl_notification.date_sent', 'DESC')
                      ->get(); 

        if($result){
            return $result;
        }else{
            return false;
        }
    }


     public function removeRequest($request_id){

         $removed = DB::table('tbl_subreq')->where('request_id', '=',$request_id)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

    public function insertSchedule($data){

         $inserted = DB::table('tbl_schedule')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }

    // Check schedule conflict
     public function checkSchedConflict($day,$start_time,$semester,$school_year,$room){

      $result = DB::table('tbl_schedule')
                    ->where('schedule_day', '=', $day)
                    ->where('start_time', '=', $start_time)
                    ->where('semester', '=', $semester)
                    ->where('school_year', '=', $school_year)
                    ->where('room', '=', $room)
                    ->first(); 
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function fetchYear(){

      $result =  DB::table('tbl_schedule')
      ->select('school_year')
      ->distinct()
      ->get();


        if($result){
            return $result;
        }else{
            return false;
        }
    }

   
}
