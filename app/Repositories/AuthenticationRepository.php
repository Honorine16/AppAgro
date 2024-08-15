<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterface;
use App\Mail\OtpCodeEmail;
use App\Models\OtpCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Mail;

class AuthenticationRepository implements AuthenticationInterface
{
    public function login(array $data)
    {
        return Auth::attempt($data);
    }

    public function registration(array $data)
    {
        return User::create($data);
    }

    public function forgottenPassword($email)
    {
        $user = User::where('email', $email)->first();

        $otpCode = [
            'email' => $email,
            'code' => rand(121111, 999999),
        ];

        if ($user) {
            OtpCode::where('email', $email)->delete();
            OtpCode::create($otpCode);
            session()->put('email', $email);
            Mail::to($email)->send(new OtpCodeEmail($user->name, $otpCode['code']));
        }

        return $user;
    }

    public function checkOtpCode(array $data)
    {
        $code = OtpCode::where('email', $data['email'])->first();

        if ($code)
            if (!Hash::check($data['code'], $code->code))
                return false;
        
        session()->put('code', $data['code']);

        return $code;
    }

    public function newPassword(array $data)
    {
        $code = OtpCode::where('email', $data['email'])->first();

        if ($code)
            if (Hash::check($data['code'], $code->code)) {
                $user = User::where('email',$data['email'])->first();
                if (!$user)
                    return false;
                else {
                    $user->password = $data['password'];
                    $user->save();
                    Auth::login($user);
                    OtpCode::where('email', $data['email'])->delete();

                    return $user;
                }
            }
        
        return false;
    }
}