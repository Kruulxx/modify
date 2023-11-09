<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportStudents implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    use Importable;

    public function model(array $row)
{
    // dd($row); // Add this line for debugging

    return new Student([
        'lrn' => $row['lrn'],
        'lname' => $row['last_name'],
        'fname' => $row['first_name'],
        'mname' => $row['middle_name'],
        'gender' => $row['sex_mf'],
        'date_of_birth' => $row['birth_date_mmddyyyy'],
        'age' => $row['age_as_of_october_31st'],
        'religion' => $row['religious_affilication'],
        'no_street_purok' => $row['house_street_sitio_purok'],
        'barangay' => $row['barangay'],
        'municipality' => $row['municipality_city'],
        'province' => $row['province'],
        'father_name' => $row['fathers_name_last_name_first_name_middle_name'],
        'mother_name' => $row['mothers_maiden_name_last_name_first_name_middle_name'],
        'guardian' => $row['guardian'],
        'relationship' => $row['relationship'],
        'contact_number' => $row['contact_number_of_parent_or_guardian'],
        'modality' => $row['learning_modality'],
        'remarks' => $row['remarks'],
        
        // Add more columns as needed
    ]);
}
}


