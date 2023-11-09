<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\SchoolYear;
use App\Models\Classes;
use App\Models\SubjectLoad;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class SYOverview extends BaseWidget
{
    protected function getCards(): array
    {   
        if(!SchoolYear::where('current', 1)->first()){
            return [];
        }
        if(auth()->user()->hasRole('Superadmin') || auth()->user()->hasRole('Principal')){
            return [
                Card::make('School Year', SchoolYear::where('current', 1)->first()->sy)
                ->description('Current School Year')
                ->descriptionIcon('heroicon-s-calendar')
                ->color('warning'),
                Card::make('Total', Classes::where('school_year_id', SchoolYear::where('current', 1)->first()->id)->count())
                ->description('Classes for this S.Y.')
                ->descriptionIcon('heroicon-s-bookmark')
                ->color('warning'),
                Card::make('Total', Student::count())
                ->description('Registered students in the system')
                ->descriptionIcon('heroicon-s-user-group')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('secondary'),
                Card::make('Total Outstanding Students', function () {
                    // Get all classes for the current school year
                    $currentSchoolYearId = SchoolYear::where('current', 1)->first()->id;
                    $classes = Classes::where('school_year_id', $currentSchoolYearId)->get();
                
                    $totalOutstandingStudentsCount = 0;
                
                    foreach ($classes as $class) {
                        $classId = $class->id;
                        
                        // Count students with "outstanding" in the student_grades column for each class
                        $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                            ->where('student_grades', 'like', '%Outstanding%')
                            ->count();
                
                        $totalOutstandingStudentsCount += $outstandingStudentsCount;
                    }
                
                    return $totalOutstandingStudentsCount;
                })
                ->description('Overall Outstanding Students')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                Card::make('Total Very Satisfactory Students', function () {
                    // Get all classes for the current school year
                    $currentSchoolYearId = SchoolYear::where('current', 1)->first()->id;
                    $classes = Classes::where('school_year_id', $currentSchoolYearId)->get();
                
                    $totalOutstandingStudentsCount = 0;
                
                    foreach ($classes as $class) {
                        $classId = $class->id;
                        
                        // Count students with "outstanding" in the student_grades column for each class
                        $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                            ->where('student_grades', 'like', '%Very Satisfactory%')
                            ->count();
                
                        $totalOutstandingStudentsCount += $outstandingStudentsCount;
                    }
                
                    return $totalOutstandingStudentsCount;
                })
                ->description('Overall Very Satisfactory Students')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                Card::make('Total Satisfactory Students', function () {
                    // Get all classes for the current school year
                    $currentSchoolYearId = SchoolYear::where('current', 1)->first()->id;
                    $classes = Classes::where('school_year_id', $currentSchoolYearId)->get();
                
                    $totalOutstandingStudentsCount = 0;
                
                    foreach ($classes as $class) {
                        $classId = $class->id;
                        
                        // Count students with "outstanding" in the student_grades column for each class
                        $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                            ->where('student_grades', 'like', '%Satisfactory%')
                            ->count();
                
                        $totalOutstandingStudentsCount += $outstandingStudentsCount;
                    }
                
                    return $totalOutstandingStudentsCount;
                })
                ->description('Overall Satisfactory Students')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                Card::make('Total Fairly Satisfactory Students', function () {
                    // Get all classes for the current school year
                    $currentSchoolYearId = SchoolYear::where('current', 1)->first()->id;
                    $classes = Classes::where('school_year_id', $currentSchoolYearId)->get();
                
                    $totalOutstandingStudentsCount = 0;
                
                    foreach ($classes as $class) {
                        $classId = $class->id;
                        
                        // Count students with "outstanding" in the student_grades column for each class
                        $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                            ->where('student_grades', 'like', '%Fairly Satisfactory%')
                            ->count();
                
                        $totalOutstandingStudentsCount += $outstandingStudentsCount;
                    }
                
                    return $totalOutstandingStudentsCount;
                })
                ->description('Overall Fairly Satisfactory Students')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                Card::make('Did Not Meet Expectations', function () {
                    // Get all classes for the current school year
                    $currentSchoolYearId = SchoolYear::where('current', 1)->first()->id;
                    $classes = Classes::where('school_year_id', $currentSchoolYearId)->get();
                
                    $totalOutstandingStudentsCount = 0;
                
                    foreach ($classes as $class) {
                        $classId = $class->id;
                        
                        // Count students with "outstanding" in the student_grades column for each class
                        $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                            ->where('student_grades', 'like', '%Did Not Meet Expectations%')
                            ->count();
                
                        $totalOutstandingStudentsCount += $outstandingStudentsCount;
                    }
                
                    return $totalOutstandingStudentsCount;
                })
                ->description('Did Not Meet Expectations')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                
         
            ];
        } else if(auth()->user()->hasRole('Adviser') && !auth()->user()->hasRole('Subject Teacher')){
            return [
                Card::make('School Year', SchoolYear::where('current', 1)->first()->sy)
                ->description('Current School Year')
                ->descriptionIcon('heroicon-s-calendar')
                ->color('warning'),
                Card::make('Total Students', Classes::where('adviser_id', auth()->user()->id)
                ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                ->pluck('students')
                ->flatMap(function ($students) {
                    return $students;
                })
                ->count())
                ->description('My Class')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
            ];
        } else if(auth()->user()->hasRole('Subject Teacher') && !auth()->user()->hasRole('Adviser')){
            return [
                Card::make('School Year', SchoolYear::where('current', 1)->first()->sy)
                ->description('Current School Year')
                ->descriptionIcon('heroicon-s-calendar')
                ->color('warning'),
                Card::make('Total Subject Loads', function(){
                    return SubjectLoad::where('teacher_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->count();
                })
                ->description('For this S.Y.')
                ->descriptionIcon('heroicon-s-bookmark')
                ->color('success'),
            ];
        } else if(auth()->user()->hasRole('Adviser') && auth()->user()->hasRole('Subject Teacher')){
            return [
                Card::make('School Year', SchoolYear::where('current', 1)->first()->sy)
                ->description('Current School Year')
                ->descriptionIcon('heroicon-s-calendar')
                ->color('warning'),
                Card::make('Total Students', Classes::where('adviser_id', auth()->user()->id)
                ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                ->pluck('students')
                ->flatMap(function ($students) {
                    return $students;
                })
                ->count())
                ->description('My Class')
                ->descriptionIcon('heroicon-s-user-group')
                ->color('success'),
                Card::make('Total Subject Loads', function(){
                    return SubjectLoad::where('teacher_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->count();
                })
                ->description('For this S.Y.')
                ->descriptionIcon('heroicon-s-bookmark')
                ->color('success'),
            ];
        }
        else {
            return [];
        }

        
        
    }
}
