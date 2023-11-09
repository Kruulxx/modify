<?php

namespace App\Filament\Resources\StudentResource\Pages;

use App\Models\Student;
use Filament\Pages\Actions;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\ImportStudent;
use App\Imports\ImportStudents;
use  Maatwebsite\Excel\Facades\Excel;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification; 
use App\Filament\Resources\StudentResource;

Str::macro('capitalizeWords', function ($value) {
    return ucwords($value);
});

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
            Actions\Action::make('importStudents')
            ->label('Import Students')
            ->color('danger')
            ->form([
                FileUpload::make('attachment'),
            ])
            ->action(function (array $data) {
                // $data is an array which consists of all the form data 
                $file = public_path("storage/" . $data['attachment']);

                Excel::import(new ImportStudents, $file);

                Notification::make()
                    ->success()
                    ->title('Students Imported')
                    ->body('Students data imported successfully.')
                    ->send();
            }),

        ];
    }
    
    // public $file = '';
    // public function Import()
    // {
    //     if ($this->file != '') {
    //         Excel::import(new ImportStudents, $this->file);
    //     }
    // }
    
 
    // public function ImportExcels(Request $request)
    // {
    //     // Validate and process the uploaded file
    //     $request->validate([
    //         'upload' => 'required|file|mimes:xlsx,xls',
    //     ]);
    
    //     // Use the imported class to handle the import
    //     Excel::import(new ImporStudents, $request->file('upload'));
    
    //     // Redirect back or perform other actions as needed
    // }

  

    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StudentResource\Widgets\StudentArchiveOverview::class,
        ];
    }

}

