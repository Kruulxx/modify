<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $user = User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),

        // ]);
        // $role = Role::create(['name' => 'Superadmin']);
        // Role::create(['name' => 'Principal']);
        // Role::create(['name' => 'Adviser']);
        // Role::create(['name' => 'Subject Teacher']);
        // $user->assignRole($role);

        // Create the initial admin user
        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // Create roles
        $superadminRole = Role::create(['name' => 'Superadmin']);
        $principalRole = Role::create(['name' => 'Principal']);
        $adviserRole = Role::create(['name' => 'Adviser']);
        $subjectTeacherRole = Role::create(['name' => 'Subject Teacher']);

        // Assign roles to the admin user
        $user->assignRole($superadminRole);

        $adviserUser = User::factory()->create([
            'name' => 'Adviser User',
            'email' => 'adviser@example.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $adviserUser->assignRole($adviserRole);

        $teacherUser = User::factory()->create([
            'name' => 'Subject Teacher User',
            'email' => 'teacher@example.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $teacherUser->assignRole($subjectTeacherRole);

        // Create more users and assign roles
        $principalUser = User::factory()->create([
            'name' => 'Principal User',
            'email' => 'principal@example.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
        $principalUser->assignRole($principalRole);

        $subject_Core1_1 = Subject::create ([
            'subject_name' => 'Oral Communication in Context',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_2 = Subject::create ([
            'subject_name' => 'Komunikasyon at Pananaliksik sa Wikang Filipino at Kulturang Pilipino',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_3 = Subject::create ([
            'subject_name' => 'General Mathematics',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_4 = Subject::create ([
            'subject_name' => 'Earth and Life Science',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_5 = Subject::create ([
            'subject_name' => 'Physical Education and Health 1',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_6 = Subject::create ([
            'subject_name' => '21st Century Literature from the Philippines and the World',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_7 = Subject::create ([
            'subject_name' => 'Introduction to the Philosophy of the Human Person',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_8 = Subject::create ([
            'subject_name' => 'Understanding Culture, Society and Politics',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_9 = Subject::create ([
            'subject_name' => 'Contemporary Philippine Arts from the Regions',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);
$subject_Core1_10 = Subject::create ([
            'subject_name' => 'Earth Science',
            'subject_type' => 'Core',
            'semester' => '1',
        ]);


$subject_Applied1_1 = Subject::create ([
            'subject_name' => 'English for Academic and Professional Purposes',
            'subject_type' => 'Applied',
            'semester' => '1',
        ]);
$subject_Applied1_2 = Subject::create ([
            'subject_name' => 'Entrepreneurship',
            'subject_type' => 'Applied',
            'semester' => '1',
        ]);
$subject_Applied1_3 = Subject::create ([
            'subject_name' => 'Practical Research 2',
            'subject_type' => 'Applied',
            'semester' => '1',
        ]);


$subject_Specialized1_1 = Subject::create ([
            'subject_name' => 'Business Mathematics',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_2 = Subject::create ([
            'subject_name' => 'Organization and Management',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_3 = Subject::create ([
            'subject_name' => 'Fundamentals of Accountancy, Business and Management 2',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_4 = Subject::create ([
            'subject_name' => 'Pre-Calculus',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_5 = Subject::create ([
            'subject_name' => 'General Biology 1',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_6 = Subject::create ([
            'subject_name' => 'General Physics 1',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_7 = Subject::create ([
            'subject_name' => 'General Chemistry 1',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_8 = Subject::create ([
            'subject_name' => 'Elective 1 (Principles of Marketing)',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_9 = Subject::create ([
            'subject_name' => 'Introduction to World Religions and Belief Systems',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_10 = Subject::create ([
            'subject_name' => 'Philippine Politics and Governance',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_11 = Subject::create ([
            'subject_name' => 'Front Office Services (NC II)',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_12 = Subject::create ([
            'subject_name' => 'Bread and Pastry Production (NC II)',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_13 = Subject::create ([
            'subject_name' => '_NET 1',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
$subject_Specialized1_14 = Subject::create ([
            'subject_name' => 'JAVA (NC III)',
            'subject_type' => 'Specialized',
            'semester' => '1',
        ]);
        $subject_Core2_1 = Subject::create ([
            'subject_name' => 'Reading and Writing Skills',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_2 = Subject::create ([
            'subject_name' => 'Pagbasa at Pagsusri ng Iba’t ibang Teksto Tungo sa Pananaliksik',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_3 = Subject::create ([
            'subject_name' => 'Statistics and Probability',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_4 = Subject::create ([
            'subject_name' => 'Physical Science',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_5 = Subject::create ([
            'subject_name' => 'Physical Education and Health 2',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_6 = Subject::create ([
            'subject_name' => 'Media and Information Literacy',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_7 = Subject::create ([
            'subject_name' => 'Personal Development',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);
$subject_Core2_8 = Subject::create ([
            'subject_name' => 'Disaster Readiness and Risk Reduction',
            'subject_type' => 'Core',
            'semester' => '2',
        ]);



$subject_Applied2_1 = Subject::create ([
            'subject_name' => 'Filipino sa Piling Larang (Akademik)',
            'subject_type' => 'Applied',
            'semester' => '2',
        ]);
$subject_Applied2_1 = Subject::create ([
            'subject_name' => 'Practical Research 1',
            'subject_type' => 'Applied',
            'semester' => '2',
        ]);
$subject_Applied2_1 = Subject::create ([
            'subject_name' => 'Empowerment Technologies',
            'subject_type' => 'Applied',
            'semester' => '2',
        ]);
$subject_Applied2_1 = Subject::create ([
            'subject_name' => 'Inquiries, Investigations and Immersion',
            'subject_type' => 'Applied',
            'semester' => '2',
        ]);
$subject_Applied2_1 = Subject::create ([
            'subject_name' => 'Filipino sa Piling Larang (Tech-Voc)',
            'subject_type' => 'Applied',
            'semester' => '2',
        ]);


$subject_Specialized2_1 = Subject::create ([
            'subject_name' => 'Fundamentals of Accountancy, Business and Management 1',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_2 = Subject::create ([
            'subject_name' => 'Principles of Marketing',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_3 = Subject::create ([
            'subject_name' => 'Applied Economics',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_4 = Subject::create ([
            'subject_name' => 'Business Ethics and Social Responsibility',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_5 = Subject::create ([
            'subject_name' => 'Business Finance',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_6 = Subject::create ([
            'subject_name' => 'Business Enterprise Simulation',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_7 = Subject::create ([
            'subject_name' => 'Basic Calculus',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_8 = Subject::create ([
            'subject_name' => 'General Biology 2',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_9 = Subject::create ([
            'subject_name' => 'General Physics 2',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_10 = Subject::create ([
            'subject_name' => 'General Chemistry 2',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_11 = Subject::create ([
            'subject_name' => 'Research / Capstone Project',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_12 = Subject::create ([
            'subject_name' => 'Disaster Readiness and Risk Reduction',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_13 = Subject::create ([
            'subject_name' => 'Creative Writing',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_14 = Subject::create ([
            'subject_name' => 'Elective 2 (Business Math)',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_15 = Subject::create ([
            'subject_name' => 'Work Immersion / Culminating Activity',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_16 = Subject::create ([
            'subject_name' => 'Housekeeping',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_17 = Subject::create ([
            'subject_name' => 'Food and Beverages Services (NC II)',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_18 = Subject::create ([
            'subject_name' => '_NET 2',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
$subject_Specialized2_19 = Subject::create ([
            'subject_name' => 'JAVA (NC III) 2',
            'subject_type' => 'Specialized',
            'semester' => '2',
        ]);
        $teacherUser1_1 = User::create([
            'name' => 'ANTONIO D. CARPIO',
            'email' => 'antonio_carpio@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_2 = User::create([
            'name' => 'ISHREA R. ORTIZ',
            'email' => 'ishrea_ortiz@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_3 = User::create([
            'name' => 'PHILIP B. REYES',
            'email' => 'philip_reyes@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_4 = User::create([
            'name' => 'CAROLINE U. ACLAN',
            'email' => 'caroline_aclan@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_5 = User::create([
            'name' => 'ALDHE B. CRUZ',
            'email' => 'aldhe_cruz@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_6 = User::create([
            'name' => 'EPRIL P. DELA CRUZ',
            'email' => 'epril_delacruz@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_7 = User::create([
            'name' => 'MARY ANGELIQUE L. RIVERA',
            'email' => 'maryangelique_rivera@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_8 = User::create([
            'name' => 'RYAN F. VALERIO',
            'email' => 'ryan_valerio@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_9 = User::create([
            'name' => 'EMMANUEL SM. ENRIQUEZ',
            'email' => 'emmanuel_enriquez@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser1_10 = User::create([
            'name' => 'CORAZON V. FAJARDO',
            'email' => 'corazon_fajardo@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);


		
$teacherUser2_1 = User::create([
            'name' => 'JONALDO F. BERNARDO',
            'email' => 'jonaldo_bernardo@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_2 = User::create([
            'name' => 'DAISY C. SANTOS',
            'email' => 'daisy_santos@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_3 = User::create([
            'name' => 'BABY JANE A. MORALES',
            'email' => 'babyjane_morales@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_4 = User::create([
            'name' => 'MA. TERESA R. MARCELO',
            'email' => 'materesa_marcelo@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_5 = User::create([
            'name' => 'CHERILYN C. ROBLES',
            'email' => 'cherilyn_robles@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_6 = User::create([
            'name' => 'AGATA CHRISTINE MELODY C. GUTIERREZ',
            'email' => 'agatachristinemelody_gutierrez@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_7 = User::create([
            'name' => 'EMMARIE ROSE V. SORIANO',
            'email' => 'emmarierose_soriano@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_8 = User::create([
            'name' => 'JONALD GRACE C. ZAFRA',
            'email' => 'jonaldgrace_zafra@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_9 = User::create([
            'name' => 'JENIELYN L. CASELA',
            'email' => 'jenielyn_casela@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);
$teacherUser2_10 = User::create([
            'name' => 'EDITHA A. LANGA',
            'email' => 'editha_langa@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

    }
}
