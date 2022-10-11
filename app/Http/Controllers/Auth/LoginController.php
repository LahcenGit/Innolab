<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']),$remember_me))
        {
            $patient = Patient::where('user_id',auth::user()->id)->first();

            if(auth::user()->type == 'patient'){
                if($patient->flag_etat == 0){
                    return redirect('dashboard-patient');
                }
                else{
                    $error = 'Votre compte à été désactivé.';
                    return view('welcome',compact('error'));
                }
                
            }
            else if(auth::user()->type == 'labo'){
                return redirect('dashboard-labo');
            }
            else if(auth::user()->type == 'doctor'){
                return redirect('dashboard-doctor');
            }
        }

        else{
           
            $error = 'Coordonnées incorrectes. Veuillez réessayer.';
            return view('welcome',compact('error'));
        }
          
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
        {

            return abort('404');
        }
}
