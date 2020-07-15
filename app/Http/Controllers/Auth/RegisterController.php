<?php

namespace App\Http\Controllers\Auth;

use App\EducationalGroup;
use App\Http\Controllers\Controller;
use App\PersonTeacherViews;
use App\Providers\RouteServiceProvider;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['sORt']=='student'){
            $d =  Validator::make($data, [
                'fname'                => ['required', 'string', 'max:255'],
                'lname'                => ['required', 'string', 'max:255'],
                'email'                => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'             => ['required', 'string', 'confirmed'],
//TODO                'id'                   => ['required', 'string','confirmed'],
//TODO                'group_id'             => ['required', 'string', 'max:255'],
//TODO                'guide_teacher_id'     => ['required', 'string', 'confirmed'],
//TODO                'grade'                => ['required', 'string', 'confirmed'],
//TODO                'student_id'           => ['required', 'string', 'confirmed']
            ]);
//            dd($d);
            return $d;
        }
        elseif ($data['sORt']=='teacher'){
            return Validator::make($data, [
                'fname'                => ['required', 'string', 'max:255'],
                'lname'                => ['required', 'string', 'max:255'],
                'email'                => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'             => ['required', 'string', 'min:8', 'confirmed'],
//TODO                'id'                   => ['required', 'string', 'min:8', 'confirmed'],
//TODO                'group_id'             => ['required', 'string', 'max:255'],
//TODO                'academic_rank'        => ['required', 'string', 'min:8', 'confirmed'],
//TODO                'teacher_id'           => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        try {
            $this_token = Str::random(64);
            Session::put('remember_token', $this_token);
            $user = new User();
            $user->id = ($data['id']);
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->group_id = $data['group_id'];
            $user->remember_token = $this_token;
            $user->save();

            if ($data['sORt'] == 'student') {
                $student = new Student();
                $student->u_id = ($data['id']);
                $student->guide_teacher_id = $data['guide_teacher_id'];
                $student->units_no = 0;
                $student->grade = $data['grade'];
                $student->id = rand(10000000, 100000000);
                $student->save();
            } elseif ($data['sORt'] == 'teacher') {
                $teacher = Teacher::create([
                    'u_id' => $user->id,
                    'academic_rank' => $data['academic_rank'],
                    'id' => rand(10000000, 100000000)
                ]);
            }
        }catch (\Exception $e){
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

        return $user;
    }


    public function showRegistrationForm() {
        $groups      = EducationalGroup::all();
        $teachers    = PersonTeacherViews::all();
        return view ('auth.register',[
            'groups'    =>  $groups,
            'teachers'  =>  $teachers
        ]);
    }

}
