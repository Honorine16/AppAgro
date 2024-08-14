<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\ForgottenPasswordRequest;
use App\Http\Requests\Authentication\LoginRequest;

use App\Http\Requests\Authentication\OtpCodeRequest;
use App\Http\Requests\Authentication\RegistrationRequest;
use App\Interfaces\AuthenticationInterface;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private AuthenticationInterface $authInterface;

    // constructeur
    public function __construct(AuthenticationInterface $authInterface)
    {
        $this->authInterface = $authInterface;
    }

    // fonction de connexion
    public function login(LoginRequest $request)
    {
        // récupération des informations
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // if (Auth::check()) {
        //     return redirect()->route('dashboard');
        // }

        // traitement de la requête login
        try {
            if ($this->authInterface->login($data))
                return redirect()->route('dashboard');
            else
                return back()->with('error', 'email ou mot de passe incorrect');
        } catch (\Exception $ex) {
            return redirect()->route('account.login')->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function registration(RegistrationRequest $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            $user = $this->authInterface->registration($data);
            
            Auth::login($user);
            
            if (Auth::check()) 
                return redirect('/dashboard'); 
            else
                return view('registration');
            // return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function forgottenPassword(ForgottenPasswordRequest $request)
    {
        $data = [
            'email' => $request->email,
        ];

        try {
            
            if ($this->authInterface->forgottenPassword($data['email'])) 
                return redirect('otpCode'); 
            else
                return back()->with('error', 'Email non trover.');
            // return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }

    public function checkOtpCode(OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        try {

            $code = $this->authInterface->checkOtpCode($data);
            
            if (!$code) 
                return back()->with('error', 'Code confirmation invalide.');
            else
                return redirect()->route('newPassword'); 
            // return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }
    
    public function newPassword(OtpCodeRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'passwordConfirm' => $request->passwordConfirm,
            'code' => $request->code,
        ];

        try {

            $user = $this->authInterface->newpassword($data);
            
            if (!$user) 
                return back()->with('error', 'Impossible de faire la mise à jour, reprendre.');
            else
                return redirect()->route('newPassword'); 
            // return redirect()->route('dashboard');
        } catch (\Exception $ex) {
            return back()->with('error', 'Une erreur est survenue lors du traitement, Réessayez !');
        }
    }
}
