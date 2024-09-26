<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:10000'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($data['profile_picture'] == null) {
            return User::create([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'role_id' => 3,
                'is_active' => '1',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return User::create([
                'name' => $data['name'],
                'phone_number' => $data['phone_number'],
                'role_id' => 3,
                'is_active' => '1',
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'profile_picture' => $data['profile_picture']->store('upload_images', ['disk' => 'public']),
            ]);
        }
    }

    public function register(Request $request)
    {
        // $request['phone_number'] = strval($request['phone_number']);

        // $this->validator($request->all())->validate();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'phone_number' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'profile_picture' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:10000'],
        ], [
            'name.required' => 'Nama wajib diisi!',
            'name.string' => 'Nama wajib berupa karakter!',
            'name.max' => 'Nama maksimal terdiri dari 150 karakter!',
            'phone_number.required' => 'Nomor telepon wajib diisi!',
            'phone_number.string' => 'Nomor telepon wajib berupa karakter!',
            'phone_number.max' => 'Nomor telepon maksimal terdiri dari 50 karakter!',
            'email.required' => 'Email wajib diisi!',
            'email.string' => 'Email wajib berupa karakter!',
            'email.email' => 'Format email anda masih salah!',
            'email.max' => 'Email maksimal terdiri dari 150 karakter!',
            'email.unique' => 'Email sudah terdaftar dalam sistem!',
            'password.required' => 'Password wajib diisi!',
            'password.string' => 'Password wajib berupa karakter!',
            'password.min' => 'Password minimal terdiri dari 8 karakter!',
            'password.confirmed' => 'Konfirmasi password tidak sesuai!'
        ]);

        // if ($request->file('profile_picture')) {
        //     $validatedData['profile_picture'] = $request->file('profile_picture')->store('upload_images', ['disk' => 'public']);

        //     $user = User::create([
        //         'name' => $validatedData['name'],
        //         'phone_number' => $validatedData['phone_number'],
        //         'role_id' => 3,
        //         'is_active' => '1',
        //         'email' => $validatedData['email'],
        //         'password' => Hash::make($validatedData['password']),
        //         'profile_picture' => $validatedData['profile_picture'],
        //     ]);
        // } else {
        //     $user = User::create([
        //         'name' => $validatedData['name'],
        //         'phone_number' => $validatedData['phone_number'],
        //         'role_id' => 3,
        //         'is_active' => '1',
        //         'email' => $validatedData['email'],
        //         'password' => Hash::make($validatedData['password']),
        //     ]);
        // }

        User::create([
            'name' => $validatedData['name'],
            'phone_number' => $validatedData['phone_number'],
            'role_id' => 3,
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login');
    }
}
