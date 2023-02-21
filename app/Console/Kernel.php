<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\AcademicYear;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            // Get the current date
            $today = Carbon::now();
            
            // Get all the academic years from the academic_years table
            $academicYears = DB::table('academic_years')->get();
            
            // Loop through all the academic years
            foreach ($academicYears as $academicYear) {
              $startYear = Carbon::parse($academicYear->a_start_year);
              $endYear = Carbon::parse($academicYear->a_end_year);
            
              // Check if the current date is between the start and end year of the academic year
              if ($today->between($startYear, $endYear)) {
                // If it is, update the is_current column to 1
                DB::table('academic_years')
                  ->where('academic_year_id', $academicYear->academic_year_id)
                  ->update(['a_is_current' => 1]);
              } else {
                // If not, update the is_current column to 0
                DB::table('academic_years')
                  ->where('academic_year_id', $academicYear->academic_year_id)
                  ->update(['a_is_current' => 0]);
              }
            }
            
        })->everyMinute();

        $schedule->call(function () {

            // Get the current date
            $today = Carbon::now();
            
            // Get all the academic years from the academic_years table
            $semesters = DB::table('semesters')->get();
            
            // Loop through all the academic years
            foreach ($semesters as $semester) {
              $startsemester = Carbon::parse($semester->s_start);
              $endsemester = Carbon::parse($semester->s_end);
            
              // Check if the current date is between the start and end year of the academic year
              if ($today->between($startsemester, $endsemester)) {
                // If it is, update the is_current column to 1
                DB::table('semesters')
                  ->where('semester_id', $semester->semester_id)
                  ->update(['s_is_current' => 1]);
              } else {
                // If not, update the is_current column to 0
                DB::table('semesters')
                  ->where('semester_id', $semester->semester_id)
                  ->update(['s_is_current' => 0]);
              }
            }
            
        })->everyMinute();
        // $schedule->command('inspire')->hourly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    
}
