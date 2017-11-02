<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Database;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;


class PagesController extends Controller
{


    // Login Form view - Student
    public function login()
    {
       if(session('logged_in') == true){
            if(session('type') == 1){

                $username = session('username');
                return redirect('account/registrar/students');  
            }
            if(session('type') == 2){

            }
            else{

               $urlname = session('urlname');
               return redirect('account/student/profile/'.$urlname); 
            }
        }
        else{

            $database = new Database();
            return view('pages.login'); 

        }
       

    }

    // Login Form view - User
    public function user_login()
    {


         if(session('logged_in') == true){
            if(session('type') == 1){

                $username = session('username');
                return redirect('account/registrar/students');  
            }
            if(session('type') == 2){

            }
            else{

               $urlname = session('urlname');
               return redirect('account/student/profile/'.$urlname); 
            }
        }
        else{

            $database = new Database();
            return view('pages.user'); // return to registration page

        }
       
      
        

    }
    public function executeLogin(Request $request){

         $database = new Database(); // Initialize Database Model

        // Determine if student or users like registrar and coordinator
        if($request->user == 'student'){ // Student

                $email = $request->email; // Get user email
                $password = $request->password; // Get user password
           
                $logged = $database->loggedIn($email,$password);

                if($logged){ // Email and password is correct

                    if($logged->confirmed){ // Check if student is confirmed
                        $email = $logged->email;
                        $name = $logged->firstname . ' ' . $logged->lastname;
                        $course_id = $logged->course_id;
                        $course = $logged->course;
                        $year = $logged->year_level;
                        $urlname = $logged->firstname . $logged->lastname . Date('Y');

                        // Store user data as an array
                        $userdata = array(
                            'email' => $email,
                            'name' => $name,
                            'type' => 3,
                            'course_id' => $course_id,
                            'course' => $course,
                            'year' => $year,
                            'urlname' => $urlname,
                            'enrolled' => $logged->enrolled,
                            'logged_in' => true
                        );


                         // Store userdata array to session
                         $request->session()->put($userdata);

                         return redirect('account/student/profile/'.$urlname); 


                    }else{

                        return redirect('login')->with('error', 'Your account is not yet confirmed by the office of registrar. Please Check your email account.');
                    }
                   
                   
                  
                   
                }else{ //  Email or password is incorrect
                    
                    return redirect('login')->with('error', 'Email or password is incorrect!');

                }

        }else{


                $username = $request->username; // Get user email
                $password = $request->password; // Get user password
           
                $logged = $database->loginUser($username,$password);

                if($logged){ // Username and password is correct

                    if($logged->user_type == 1){

                        $username = $logged->username;
                        $name = $logged->name;
                        $course_id = $logged->course_id;
                        $img = $logged->img;
                        $user_type = $logged->user_type;

                        // Store user data as an array
                        $userdata = array(
                            'username' => $username,
                            'name' => $name,
                            'type' => $user_type,
                            'type_long' => 'Registrar',
                            'course_id' => $course_id,
                            'img' => $img,
                            'logged_in' => true
                        );


                         // Store userdata array to session
                         $request->session()->put($userdata);

                         return redirect('account/registrar/students');  


                    }else{

                         $username = $logged->username;
                         $name = $logged->name;
                         $course_id = $logged->course_id;
                         $img = $logged->img;
                         $user_type = $logged->user_type;

                          $userdata = array(
                            'username' => $username,
                            'name' => $name,
                            'type' => $user_type,
                            'type_long' => 'Coordinator',
                            'course_id' => $course_id,
                            'img' => $img,
                            'course' =>  $logged->course,
                            'logged_in' => true
                        );


                         // Store userdata array to session
                         $request->session()->put($userdata);

                         return redirect('account/coordinator/coordinator');  
                    }
                       
  
                }else{ //  Email or password is incorrect
                    
                    return redirect('user/login')->with('error', 'Username or password is incorrect!');

                }
                    }
        

    

    }

    // Registration Form view
    public function registration_form()
    {
      
        $database = new Database();

        $data['countries'] = $database->fetchCountries(); // Country list
        $data['courses'] = $database->fetchCourses(); // Course list
        return view('pages.register',$data); // return to registration page
    }

    // Submit registration form
    public function submit_form(Request $request){

    	$database = new Database();

      
        $fileNameToStore = 'noimage.jpg'; // Default student image
       

        // Get date enrolled
        $token = str_random(10);
        $year_enrolled = Date('Y');
        $raw = $request->input('firstname') .$request->input('lastname').$token.$year_enrolled;
        $date_enrolled = Date('Y-m-d');

        $date_of_birth = Date('Y-m-d',strtotime($request->input('date_of_birth')));
        // Store form inputs to array
        $inputs = array(

                    'lastname'  => $request->input('lastname'),
                    'firstname' => $request->input('firstname'),
                    'middlename' => $request->input('middlename'),
                    'course_id' => $request->input('course_id'),
                    'year_level' => 1,
                    'gender' => $request->input('gender'),
                    'religion' => $request->input('religion'),
                    'nationality' => $request->input('nationality'),
                    'date_of_birth' => $date_of_birth,
                    'place_of_birth' => $request->input('place_of_birth'),
                    'civil_status' => $request->input('civil_status'),
                    'email' => $request->input('email'),
                    'home_address' => $request->input('home_address'),
                    'city' => $request->input('city'),
                    'province' => $request->input('province'),
                    'country_code' => $request->input('country_code'),
                    'zipcode' => $request->input('zipcode'),
                    'guardian' => $request->input('guardian'),
                    'guardian_relationship' => $request->input('guardian_relationship'),
                    'basic_education' => $request->input('basic_education'),
                    'secondary_education' => $request->input('secondary_education'),
                    'college_education' => $request->input('college_education'),
                    'phone' => $request->input('phone'),
                    'img' => $fileNameToStore,
                    'password' => $raw,
                    'confirmed' => 0,
                    'enrolled' => 0,
                    'date_enrolled' => $date_enrolled
                  
          );


        $email = $request->input('email');

        $existed = $database->checkIfExist($email);

    	if($existed){

    		return redirect('registration')->with('error', "Email address already exist! It looks like you've already created an account.");

    	}else{

    		$inserted = $database->newStudent($inputs);
            if($inserted){

                return redirect('registration')->with('success', 'Registration successful, The office of registrar of Lourdes College will review the information you submitted and will send you an email confirmation with password to be able to login and proceed to the enrollment. Thank you!');

            }else{

                 return redirect('registration')->with('error', 'Registration unsuccessful, please try again later.');
            }

    
    	}
       

    }


    // User has confirm from email account
    public function confirmation($email){

        $database = new Database();

        $data = array(
            'confirmed' => 1
        );
        $updated = $database->confirmStudent($email,$data);

        if($updated){
              return redirect('login')->with('success', 'Registration Confirmation Successful, you can now proceed');
        }else{
              return redirect('login')->with('error', 'Registration Confirmation Failed, please try again later!');
        }   

    }

    // Log the user out to the site
    public function logout(Request $request){

        $userdata = array('email','name,','type','course_id','course','year','urlname','type_long','logged_in','img','username','enrolled');

        $request->session()->forget($userdata);
        return redirect('login');
    }


    // Dump

    /*

        $data['email'] = $request->input('email');
        $data['name'] = $request->input('firstname');
        $data['password'] = $raw;
        $email = $request->input('email');
        
        try{


            // Check if email existed
            $existed = $database->checkIfExist($email);

            if($existed){

                return redirect('registration')->with('error', "Email address already exist! It looks like you've already created an account.");

            }else{

                $inserted = $database->newStudent($inputs);
                if($inserted){

                    Mail::send('emails.confirm', $data, function($message) use($data) {
                        $message->to($data['email']);
                        $message->subject('Lourdes College BUSAC-IT Enrollment - Enrollment Registration Response');

                     });

                     return redirect('registration')->with('success', 'Registration successful, The office of registrar of Lourdes College will review the information you submitted and will send you an email confirmation with password to be able to login and proceed to the enrollment. Thank you!');

                }else{

                     return redirect('registration')->with('error', 'Registration unsuccessful, cannot send email because there is no internet connection. Please try again later.');
                }

        
            }

            

        }catch(\Exception $e){

            return redirect('registration')->with('error', 'Registration unsuccessful, cannot send email because there is no internet connection. Please try again later. ');

        }


    */


}
