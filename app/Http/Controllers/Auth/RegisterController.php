<?php

namespace App\Http\Controllers\Auth;

use App\EducationalGroup;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            return Validator::make($data, [
                'fname'                => ['required', 'string', 'max:255'],
                'lname'                => ['required', 'string', 'max:255'],
                'email'                => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'             => ['required', 'string', 'min:8', 'confirmed'],
                'id'                   => ['required', 'string', 'min:8', 'confirmed'],
                'group_id'             => ['required', 'string', 'max:255'],
                'guide_teacher_id'     => ['required', 'string', 'min:8', 'confirmed'],
                'units_no'             => ['required', 'string', 'min:8', 'confirmed'],
                'grade'                => ['required', 'string', 'min:8', 'confirmed'],
                'student_id'           => ['required', 'string', 'min:8', 'confirmed']
            ]);

        }
        elseif ($data['sORt']=='teacher'){
            return Validator::make($data, [
                'fname'                => ['required', 'string', 'max:255'],
                'lname'                => ['required', 'string', 'max:255'],
                'email'                => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'             => ['required', 'string', 'min:8', 'confirmed'],
                'id'                   => ['required', 'string', 'min:8', 'confirmed'],
                'group_id'             => ['required', 'string', 'max:255'],
                'academic_rank'        => ['required', 'string', 'min:8', 'confirmed'],
                'teacher_id'           => ['required', 'string', 'min:8', 'confirmed'],
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
        $this_token = Str::random(64);
        Session::put('remember_token',$this_token);
        $user = User::create([
            'fname'             => $data['fname'],
            'lname'             => $data['lname'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'group_id'          => $data['group'],
            'id'                => $data['id'],
            'remember_token'    => $this_token
        ]);
        if($data['sORt']=='student'){
            $student = Student::create([
                'u_id'                 => $user->id,
                'guide_teacher_id'     => $data['guide_teacher_id'],
                'units_no'             => $data['units_no'],
                'grade'                => $data['grade'],
                'id'                   => $data['student_id']
            ]);

        }
        elseif ($data['sORt']=='teacher'){
            $teacher = Teacher::create([
                'u_id'                 => $user->id,
                'academic_rank'        => $data['academic_rank'],
                'id'                   => $data['teacher_id']
            ]);
        }
    }


    public function showRegistrationForm() {
        $groups = EducationalGroup::all();
        return view ('auth.register',[
            'groups'    =>  $groups
        ]);
    }

}
