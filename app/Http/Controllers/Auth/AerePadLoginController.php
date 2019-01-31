<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class AerePadLoginController extends Controller
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
    protected $redirectTo = 'aerepad/desk';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
     /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()

    {    if(!Auth::guard('aerepad')->user()){

        return view('auth.aerepad-login');
           }
           else{
               return redirect()->route('userdesk');
           }
       
    }
     

    public function login(Request $request){       // either use this or built in log in 
// validate form data
     $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:6',
     ]);
     // attempt to login the user
          $credentials = ["email"=>$request->email,"password"=>$request->password];
       
          // if successful
       if(Auth::guard('aerepad')->attempt($credentials,$request->remember)){   //  attempt automatically hashes the password
            return redirect()->intended(route('userdesk')); //intended sends people to page where they were going before prompted to log in                                       // remember checks if value is true or false
       }                                                           // default value in intented can be passed 
       else {
           return redirect()->back()->withInput($request->only('email','remember'));  // withinput sends the filled data to show again in form no need to type again
             }                                                        
        } 





    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */

    protected function attemptLogin(Request $request)
    {
      //  dd( $this->guard('individual')->attempt()); to test 
        return $this->guard('aerepad')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('aerepad');  // without parameter it guards web(user) it is overwriting the authenticateusers func
    }
}
