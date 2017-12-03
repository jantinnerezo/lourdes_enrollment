<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Database extends Model
{

    // Courses Table =================================================================================
     public function currentSemester(){

      $row = DB::table('tbl_semester')->where('status',1)->first();

      if($row){
        return $row;
      }else{
        return false;
      }
        
    }

    // Courses Table =================================================================================
     public function fetchCourses(){

    	$rows = DB::table('tbl_course')->get();

    	if($rows){
    		return $rows;
    	}else{
    		return false;
    	}
        
    }

     // Courses Table =================================================================================
     public function fetchCoursesStudents(){

      $rows = DB::table('tbl_course')->where('course_id','!=','4')->get();

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


     public function checkConflict($sched_id){

        $result = DB::table('tbl_studsubjects')->where('tbl_studsubjects.schedule_id', '=', $sched_id)
          ->join('tbl_schedule', 'tbl_studsubjects.schedule_id', '=', 'tbl_schedule.schedule_id')
          ->join('tbl_subjects', 'tbl_schedule.subject_id', '=', 'tbl_subjects.subject_id')
          ->select('tbl_schedule.*','tbl_subjects.*')
          ->first(); 

        if($result){
           return $results;
        }else{
            return false;
        }

    }
    public function checkConflicted($schedule_day, $semester, $start_time, $room){

        $result = DB::table('tbl_schedule')
                    ->where('schedule_day', '=', $schedule_day)
                    ->where('semester', '=', $semester)
                    ->where('start_time', '=', $start_time)
                    ->where('room', '=', $room)
                    ->first(); 

        if($result){
            return true;
        }else{
            return false;
        }

    }


    // Fetch All Unenrolled
     public function fetchUnenrolled($search = FALSE,$course = False, $year_level = FALSE){

        if($search){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where(function ($query) use($search) {
                         $query->where('tbl_students.lastname', 'like', "%$search%")
                          ->orWhere('tbl_students.firstname', 'like', "%$search%")
                          ->orWhere('tbl_students.middlename', 'like', "%$search%");
                      })
                      ->where('tbl_students.confirmed', '=', 1)
                       ->where('tbl_students.enrolled', '=', 0)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        
        else if($course && $year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 0)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }
        else if($course){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 0)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

         else if($year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 0)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        else{

             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 0)
                      ->orderBy('tbl_students.firstname', 'asc')
                            ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
        }
    }

     // Fetch All Unenrolled
     public function fetchEnrolleds($search = FALSE,$course = False, $year_level = FALSE){

        if($search){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where(function ($query) use($search) {
                         $query->where('tbl_students.lastname', 'like', "%$search%")
                          ->orWhere('tbl_students.firstname', 'like', "%$search%")
                          ->orWhere('tbl_students.middlename', 'like', "%$search%");
                      })
                      ->where('tbl_students.confirmed', '=', 1)
                       ->where('tbl_students.enrolled', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        

        else if($course && $year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->gfet(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }
        else if($course){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

         else if($year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        else{

             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.confirmed', '=', 1)
                      ->where('tbl_students.enrolled', '=', 1)
                      ->orderBy('tbl_students.firstname', 'asc')
                            ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
        }
    }


     //
     public function fetchEnrollees($search = FALSE,$course = False, $year_level = FALSE){

        if($search){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where(function ($query) use($search) {
                         $query->where('tbl_students.lastname', 'like', "%$search%")
                          ->orWhere('tbl_students.firstname', 'like', "%$search%")
                          ->orWhere('tbl_students.middlename', 'like', "%$search%");
                      })
                      ->where('tbl_students.confirmed', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        

        else if($course && $year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }
        else if($course){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_course.course',  $course)
                      ->where('tbl_students.confirmed', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

         else if($year_level){
             $result = DB::table('tbl_students')
                      ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_students.course_id')
                      ->select('tbl_students.*','tbl_course.*')
                      ->where('tbl_students.year_level',  $year_level)
                      ->where('tbl_students.confirmed', '=', 1)
                       ->orderBy('tbl_students.firstname', 'asc')
                      ->get(); 
              if($result){
                  return $result;
              }else{
                  return false;
              }
              
        }

        else{

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
    }



    public function fetchAll($search = FALSE,$course = False, $year_level = FALSE){

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

    // Admin Table =================================================================================
    public function getCoordinator($course_id){

        $results = DB::table('tbl_user')
                         ->where('tbl_user.course_id', '=', $course_id)->first(); 
         
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

      
        if($semester && $year){
             $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
              ->where(function ($query) use($search) {
                    $query->where('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_subjects.descriptive', 'like', "%$search%");
                })
            ->where(function ($query) use($course) {
                    $query->where('tbl_course.course', '=', $course)
                          ->orWhere('tbl_course.course', '=', "Universal");
                })
            ->where('tbl_subjects.semester','=',$semester)
            ->where('tbl_subjects.year_level','=',$year)
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }
        }
      
        else{

            $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->where(function ($query) use($course) {
                    $query->where('tbl_course.course', '=', $course)
                          ->orWhere('tbl_course.course', '=', 'Universal');
                })
             ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }

      
        }

      
    }


     // Fetch All subjects
     public function fetchSubjectsAdmin($semester = FALSE, $year = FALSE,$search = FALSE, $course = FALSE){

      
        if($semester){
             $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->where('tbl_subjects.semester','=',$semester)
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }
        }


        else if($year){
             $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->where('tbl_subjects.year_level','=',$year)
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }
        }

        else if($search){
             $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
              ->where(function ($query) use($search) {
                    $query->where('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_subjects.descriptive', 'like', "%$search%");
                })
           
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }
        }

         else if($semester && $year && $search && $course){
             $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
              ->where(function ($query) use($search) {
                    $query->where('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_subjects.descriptive', 'like', "%$search%");
                })
            ->where(function ($query) use($course) {
                    $query->where('tbl_course.course', '=', $course)
                          ->orWhere('tbl_course.course', '=', "Universal");
                })
            ->where('tbl_subjects.semester','=',$semester)
            ->where('tbl_subjects.year_level','=',$year)
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }
        }
        else{

            $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->paginate(20);


            if($rows){
                return $rows;
            }else{
                return false;
            }

      
        }

      
    }



     public function fetchAllSubjects(){


            $rows = DB::table('tbl_subjects')
            ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
            ->select('tbl_subjects.*','tbl_course.*')
            ->orderBy('tbl_subjects.subject', 'ASC')
            ->get();


            if($rows){
                return $rows;
            }else{
                return false;
            }

      
    }

    // Faculty Table =================================================================================
    public function fetchFaculty($search = FALSE){


        if($search){

          $rows = DB::table('tbl_faculty')
                  ->where('faculty_name','like',"%$search%")
                  ->get();

          if($rows){
              return $rows;
          }else{
              return false;
          }

        }else{

          $rows = DB::table('tbl_faculty')->get();

          if($rows){
              return $rows;
          }else{
              return false;
          }

        }

       
        
    }


      public function fetchUsers($search = FALSE){


        if($search){

          $rows = DB::table('tbl_user')
                  ->where('name','like',"%$search%")
                  ->get();

          if($rows){
              return $rows;
          }else{
              return false;
          }

        }else{

          $rows = DB::table('tbl_user')->get();

          if($rows){
              return $rows;
          }else{
              return false;
          }

        }

       
        
    }


    // Faculty Table =================================================================================
    public function facultyRecords($faculty_id){

          $rows = DB::table('tbl_schedule')->where('faculty_id',$faculty_id)->get();

          if($rows){
              return true;
          }else{
              return false;
          }
        
    }


    public function deleteFaculty($faculty_id){

         $removed = DB::table('tbl_faculty')->where('faculty_id', '=',$faculty_id)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

     public function deleteUser($username){

         $removed = DB::table('tbl_user')->where('username', '=',$username)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

    public function facultySchedDelete($faculty_id){

        $removed = DB::table('tbl_schedule')->where('faculty_id', '=',$faculty_id)->delete();

        if($removed){
            return true;
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

     public function insertUser($data){

         $inserted = DB::table('tbl_user')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }


     // Schedule Table =================================================================================

     public function fetchSchedules($schedule_day = FALSE,  $semester, $school_year, $search = FALSE){

        if($schedule_day){

           $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_schedule.schedule_day',$schedule_day)
                      ->where('tbl_schedule.semester',$semester)
                      ->where('tbl_schedule.school_year',$school_year)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 

            if($result){
                return $result;
            }else{
                return false;
            }

        }
        else if($search){

            $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where(function ($query) use($search) {
                           $query->where('tbl_schedule.schedule_day', 'like', "%$search%")
                          ->orWhere('tbl_schedule.room', 'like', "%$search%")
                          ->orWhere('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_schedule.room', 'like', "%$search%")
                          ->orWhere('tbl_faculty.faculty_name', 'like', "%$search%");
                        })
                      ->where('tbl_schedule.semester',$semester)
                      ->where('tbl_schedule.school_year',$school_year)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 

            if($result){
                return $result;
            }else{
                return false;
            }
        }
      else{

            $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_schedule.semester',$semester)
                      ->where('tbl_schedule.school_year',$school_year)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 

            if($result){
                return $result;
            }else{
                return false;
            }


        }
       
    }

    public function getSlots($sched_id){

       $result = DB::table('tbl_schedule')
                      ->select('slots')
                      ->where('schedule_id','=',$sched_id)
                      ->first(); 
        if($result){
            return $result;
        }else{
            return false;
        }

    }

     public function updateSlots($sched_id,$slots){
        
        $updated = DB::table('tbl_schedule')
        ->where('schedule_id', $sched_id)
        ->update($slots);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  


    public function resetFirst($data){
        
        $updated = DB::table('tbl_semester')
        ->update($data);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

    public function updateStatus($semester,$data){
        
        $updated = DB::table('tbl_semester')
        ->where('semester',$semester)
        ->update($data);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

    public function updateSubject($subject_id,$data){
        
        $updated = DB::table('tbl_subjects')
        ->where('subject_id', $subject_id)
        ->update($data);

        if($updated){
            return true;
        }else{
            return false;
        }
    }  

     public function updateStanding($email,$update){
        
        $updated = DB::table('tbl_students')
        ->where('email', $email)
        ->update($update);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

     public function updateSchedule($schedule_id,$data){
        
        $updated = DB::table('tbl_schedule')
        ->where('schedule_id',$schedule_id)
        ->update($data);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

      public function unenrolled($update){
        
        $updated = DB::table('tbl_students')
        ->update($update);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

      public function fetchSchedulesYear($course_id,$semester,$year_level, $day = FALSE, $search = FALSE){

        if($day){

            $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_schedule.schedule_day','=',$day)
                      ->where(function ($query) use($course_id) {
                           $query->where('tbl_subjects.course_id','=',$course_id)
                          ->orWhere('tbl_subjects.course_id','=',4);
                        
                        })
                      ->where('tbl_schedule.semester','=',$semester)
                      ->where('tbl_subjects.year_level','=',$year_level)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 

            if($result){
                return $result;
            }else{
                return false;
            }

        }else if($search){
           $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                       ->where(function ($query) use($course_id) {
                           $query->where('tbl_subjects.course_id','=',$course_id)
                          ->orWhere('tbl_subjects.course_id','=',4);
                        
                        })
                      ->where(function ($query) use($search) {
                           $query->where('tbl_subjects.subject', 'like', "%$search%")
                          ->orWhere('tbl_schedule.room', 'like', "%$search%")
                          ->orWhere('tbl_faculty.faculty_name', 'like', "%$search%");
                        
                        })
                      ->where('tbl_schedule.semester','=',$semester)
                      ->where('tbl_subjects.year_level','=',$year_level)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 
            if($result){
                return $result;
            }else{
                return false;
            }
        }
       
        else{

             $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_subjects.course_id','=',$course_id)
                      ->orWhere('tbl_subjects.course_id','=',4)
                      ->where('tbl_schedule.semester','=',$semester)
                      ->where('tbl_subjects.year_level','=',$year_level)
                      ->orderBy('tbl_schedule.start_time', 'ASC')
                      ->paginate(20); 

            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }



     public function fetchRequested($email){

      $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->join('tbl_subreq', 'tbl_subreq.schedule_id', '=', 'tbl_schedule.schedule_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*','tbl_subreq.*')
                      ->where('tbl_subreq.student_email',$email)
                      ->where('tbl_subreq.evaluated',0)
                      ->orderBy('tbl_subreq.request_date', 'DESC')
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }



     public function fetchEvaluated($email){

      $result = DB::table('tbl_schedule')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->join('tbl_subreq', 'tbl_subreq.schedule_id', '=', 'tbl_schedule.schedule_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*','tbl_subreq.*')
                      ->where('tbl_subreq.student_email',$email)
                      ->where('tbl_subreq.evaluated',1)
                      ->orderBy('tbl_subreq.request_date', 'DESC')
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }



    public function fetchMySchedules($email,$semester, $school_year){

      $result = DB::table('tbl_studsubjects')
                      ->join('tbl_schedule', 'tbl_schedule.schedule_id', '=', 'tbl_studsubjects.schedule_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*','tbl_studsubjects.*')
                      ->where('tbl_studsubjects.student_email',$email)
                      ->where('tbl_schedule.semester',$semester)
                      ->where('tbl_schedule.school_year',$school_year)
                      ->get(); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    

    public function fetchEval($email){

      $result = DB::table('tbl_subreq')
                      ->where('student_email',$email)
                      ->where('evaluated',1)
                      ->paginate(20); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function fetchEnrolled(){

      $result = DB::table('tbl_students')->where('enrolled','=',1)->get(); 
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getSubject_id($sched_id){

        $result = DB::table('tbl_schedule')
                      ->where('schedule_id','=',$sched_id)
                      ->first(); 
        if($result){
            return $result;
        }else{
            return false;
        }  
    }

    public function checkExisted($subject_id){

        $result = DB::table('tbl_studsubjects')
                      ->join('tbl_schedule', 'tbl_schedule.schedule_id', '=', 'tbl_studsubjects.schedule_id')
                      ->select('*')
                      ->where('tbl_schedule.subject_id','=',$subject_id)
                      ->first(); 
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


    public function confirmEnrollment(){

        $rows = DB::table('tbl_subreq')
        ->select('student_email')
        ->distinct()
        ->where('evaluated',1)
        ->orderBy('request_date', 'desc')
        ->get();

         if($rows){
                return $rows;
         }else{
                return false;
         }

    }

     public function confirmList(){

        $rows = DB::table('tbl_subreq')
        ->join('tbl_students', 'tbl_students.email', '=', 'tbl_subreq.student_email')
        ->select('tbl_students.lastname', 'tbl_students.firstname', 'tbl_subreq.student_email', 'tbl_subreq.standing','tbl_subreq.request_date')
        ->distinct()
        ->where('tbl_subreq.evaluated',1)
        ->orderBy('tbl_subreq.request_date', 'ASC')
        ->get();

         if($rows){
                return $rows;
         }else{
                return false;
         }

    }


     public function latestStanding($email){

        $row = DB::table('tbl_subreq')
        ->select('standing','student_email')
        ->distinct()
        ->where('student_email',$email)
        ->first();

         if($row){
                return $row;
         }else{
                return false;
         }

    }

    public function removeSubjectRequest($email){

        $removed = DB::table('tbl_subreq')->where('student_email', '=',$email)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

      public function removeSched($schedule_id){

        $removed = DB::table('tbl_schedule')->where('schedule_id', '=',$schedule_id)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

     public function removeSubjectSched($subject_id){

        $removed = DB::table('tbl_schedule')->where('subject_id', '=',$subject_id)->delete();

         if($removed){
            return true;
         }else{
            return false;
         }
    }

    public function removeSubject($subject_id){

        $removed = DB::table('tbl_subjects')->where('subject_id', '=',$subject_id)->delete();

         if($removed){
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

    public function insertStudSubjects($data){

         $inserted = DB::table('tbl_studsubjects')->insert($data);

         if($inserted){
            return true;
         }else{
            return false;
         }
    }

     public function fetchNotifications($email = FALSE, $username = FALSE){

        if($email){

            $result = DB::table('tbl_notification')
                          ->join('tbl_students', 'tbl_students.email', '=', 'tbl_notification.sent_to')
                          ->join('tbl_user', 'tbl_user.username', '=', 'tbl_notification.sent_from')
                          ->select('tbl_notification.*','tbl_user.*')
                          ->where('tbl_notification.sent_to',$email)
                          ->orderBy('tbl_notification.date_sent', 'DESC')
                          ->get(); 

            if($result){
                return $result;
            }else{
                return false;
            }
        }
       else if($username){

            $result = DB::table('tbl_notification')
                          ->join('tbl_students', 'tbl_students.email', '=', 'tbl_notification.sent_from')
                          ->select('tbl_notification.*')
                          ->where('tbl_notification.sent_to',$username)
                          ->orderBy('tbl_notification.date_sent', 'DESC')
                          ->get(); 

            if($result){
                return $result;
            }else{
                return false;
            }
        }
        else{


            $result = DB::table('tbl_notification')
                          ->join('tbl_students', 'tbl_students.email', '=', 'tbl_notification.sent_to')
                          ->select('tbl_notification.*','tbl_students.*')
                          ->where('tbl_notification.sent_from',$email)
                          ->orderBy('tbl_notification.date_sent', 'DESC')
                          ->get(); 

            if($result){
                return $result;
            }else{
                return false;
            }
        }
    }

      public function fetchUnread($email){

       

            $result = DB::table('tbl_notification')
                          ->join('tbl_students', 'tbl_students.email', '=', 'tbl_notification.sent_to')
                          ->join('tbl_user', 'tbl_user.username', '=', 'tbl_notification.sent_from')
                          ->select('tbl_notification.*','tbl_user.*')
                          ->where('tbl_notification.sent_to',$email)
                          ->where('tbl_notification.status',0)
                          ->orderBy('tbl_notification.date_sent', 'DESC')
                          ->get(); 

            if($result){
                return $result;
            }else{
                return false;
            }
      
      
    }

    public function deleteNotification($notification_id){

         $removed = DB::table('tbl_notification')->where('notification_id', '=',$notification_id)->delete();

         if($removed){
            return true;
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

      public function updateRequest($schedule_id,$email,$data){
        
        $updated = DB::table('tbl_subreq')
        ->where('schedule_id', $schedule_id)
        ->where('student_email', $email)
        ->update($data);

        if($updated){
            return true;
        }else{

            return false;
        }
    }  

      public function rejectRequest($schedule_id,$email){

         $removed = DB::table('tbl_subreq')
         ->where('schedule_id', '=',$schedule_id)
         ->where('student_email', '=',$email)
         ->delete();

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


    /* Subject Request */
    public function fetchSubjectRequest($email){

        $result = DB::table('tbl_subreq')
                      ->join('tbl_schedule', 'tbl_schedule.schedule_id', '=', 'tbl_subreq.schedule_id')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->select('tbl_subreq.*','tbl_schedule.*','tbl_subjects.*','tbl_faculty.*')
                      ->where('tbl_subreq.student_email',$email)
                      ->where('tbl_subreq.evaluated',0)
                      ->orderBy('tbl_subreq.request_date', 'DESC')
                      ->get(); 

        if($result){
            return $result;
        }else{
            return false;
        }

    }



    // Student subjects



     public function studentSubjects($email,$year_level){

      $result = DB::table('tbl_studsubjects')
                      ->join('tbl_schedule', 'tbl_schedule.schedule_id', '=', 'tbl_studsubjects.schedule_id')
                      ->join('tbl_faculty', 'tbl_faculty.faculty_id', '=', 'tbl_schedule.faculty_id')
                      ->join('tbl_subjects', 'tbl_subjects.subject_id', '=', 'tbl_schedule.subject_id')
                      ->select('tbl_schedule.*','tbl_subjects.*','tbl_faculty.*','tbl_studsubjects.*')
                      ->where('tbl_studsubjects.student_email',$email)
                      ->where('tbl_subjects.year_level',$year_level)
                      ->get(); 
        if($result){
            return $result;
        }else{
            return false;
        }
    }

   
}
