<?php

namespace App\Filament\Resources\MyClassResource\Widgets;

use App\Models\User;
use App\Models\Classes;
use App\Models\SchoolYear;
use App\Models\SubjectLoad;
use App\Models\StudentOfClass;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class MyClassOverview extends BaseWidget
{
    protected function getCards(): array
    {
        if(!SchoolYear::where('current', 1)->first()){
            return [];
        }
        return [
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
            Card::make('Gender', function(){
                $currentSchoolYearId = SchoolYear::where('current', true)->value('id');
                // Get the student LRNs of the classes owned by the current adviser
                $studentLRNs = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', $currentSchoolYearId)
                    ->pluck('students')
                    ->flatten()
                    ->toArray();
                return StudentOfClass::whereIn('lrn', $studentLRNs)->where('school_year_id', $currentSchoolYearId)->where('gender', 'M')->count().':'.StudentOfClass::whereIn('lrn', $studentLRNs)->where('school_year_id', $currentSchoolYearId)->where('gender', 'F')->count();
            })
            ->description('Male to Female Ratio')
            ->descriptionIcon('heroicon-o-calendar')
            ->color('primary'),
            Card::make('Total Outstanding Students', function () {
                $class = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->first();
            
                if ($class) {
                    $classId = $class->id;
                    
                    // Count students with "outstanding" in the student_grades column
                    $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                        ->where('student_grades', 'like', '%Outstanding%')
                        ->count();
            
                    return $outstandingStudentsCount;
                }
            
                return 0; // No class found
            })
            ->description('Outstanding Students in My Class')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('success'),
            Card::make('Total Very Satisfactory Students', function () {
                $class = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->first();
            
                if ($class) {
                    $classId = $class->id;
                    
                    // Count students with "outstanding" in the student_grades column
                    $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                        ->where('student_grades', 'like', '%Very Satisfactory%')
                        ->count();
            
                    return $outstandingStudentsCount;
                }
            
                return 0; // No class found
            })
            ->description('Very Satisfactory Students in My Class')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('success'),
            Card::make('Total Satisfactory Students', function () {
                $class = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->first();
            
                if ($class) {
                    $classId = $class->id;
                    
                    // Count students with "outstanding" in the student_grades column
                    $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                        ->where('student_grades', 'like', '%Satisfactory%')
                        ->count();
            
                    return $outstandingStudentsCount;
                }
            
                return 0; // No class found
            })
            ->description('Satisfactory Students in My Class')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('success'),
            Card::make('Total Fairly Satisfactory Students', function () {
                $class = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->first();
            
                if ($class) {
                    $classId = $class->id;
                    
                    // Count students with "outstanding" in the student_grades column
                    $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                        ->where('student_grades', 'like', '%Fairly Satisfactory%')
                        ->count();
            
                    return $outstandingStudentsCount;
                }
            
                return 0; // No class found
            })
            ->description('Fairly Satisfactory Students in My Class')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('success'),
            Card::make('Did Not Meet Expectations', function () {
                $class = Classes::where('adviser_id', auth()->user()->id)
                    ->where('school_year_id', SchoolYear::where('current', 1)->first()->id)
                    ->first();
            
                if ($class) {
                    $classId = $class->id;
                    
                    // Count students with "outstanding" in the student_grades column
                    $outstandingStudentsCount = SubjectLoad::where('class_id', $classId)
                        ->where('student_grades', 'like', '%Did Not Meet Expectations%')
                        ->count();
            
                    return $outstandingStudentsCount;
                }
            
                return 0; // No class found
            })
            ->description('Did Not Meet Expectations')
            ->descriptionIcon('heroicon-s-user-group')
            ->color('success'),
            
           
            
            
            
            
            
            
            
        
            
            
            
        ];
    }
}
