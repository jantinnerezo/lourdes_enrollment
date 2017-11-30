<?php

namespace App\Providers;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Database;
use Illuminate\Support\Facades\Session;
use Illuminate\Session\Middleware\StartSession;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.  
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $database = new Database();

        // Get current school year
        $first = Date('Y');
        $second = Date('Y',strtotime('+1 Year'));
        $school_year = $first.'-'.$second;

        $semester = $database->currentSemester();
        $courses = $database->fetchCourses(); // Course list
        $course_studs = $database->fetchEnrollees($request->search);

    
        View::share('courses', $courses);
        View::share('semester',$semester);
        View::share('school_year',$school_year);
        View::share('course_studs',$course_studs);

        // Admin
        $enrollment = $database->confirmEnrollment();
        $lists = $database->confirmList();

        View::share('request', $enrollment);
        View::share('lists', $lists);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
