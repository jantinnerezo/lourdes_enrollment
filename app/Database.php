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
                         ->where('username', '=', $username)
                         ->where('password', '=', $password)->first(); 
         
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
     public function fetchSubjects($course_id = FALSE, $year = FALSE,$search = FALSE, $course = FALSE){

        if($course_id && $year){

             $rows = DB::table('tbl_subjects')
             ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
             ->select('tbl_subjects.*','tbl_course.*')
             ->where('tbl_subjects.course_id', '=', $course_id)
             ->orwhere('tbl_subjects.course_id', '=', 4)
             ->paginate(10);

            if($rows){
                return $rows;
            }else{
                return false;
            }

        }

         if($course){

             $rows = DB::table('tbl_subjects')
             ->join('tbl_course', 'tbl_course.course_id', '=', 'tbl_subjects.course_id')
             ->select('tbl_subjects.*','tbl_course.*')
             ->where('tbl_subjects.course', '=', $course)
             ->orwhere('tbl_subjects.course_id', '=', 4)
             ->paginate(10);

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
             ->paginate(10);

            if($rows){
                return $rows;
            }else{
                return false;
            }

        }

      
        
    }



}
