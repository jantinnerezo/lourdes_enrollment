<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Database;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $database = new Database();

        // Get current school year
        $first = Date('Y');
        $second = Date('Y',strtotime('+1 Year'));
        $school_year = $first.'-'.$second;

        $courses = $database->fetchCourses(); // Course list
        $course_studs = $database->fetchVerified();

        View::share('courses', $courses);
        View::share('school_year',$school_year);
        View::share('course_studs',$course_studs);

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
