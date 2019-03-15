<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\Events\SendMail;
use Socialite;
use Event;
use Session;

use Auth;
use App\Models\User;


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

    use AuthenticatesUsers { logout as performLogout; }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request) {
         $this->performLogout($request); 
         return redirect()->route('home.index');
         } 


     public function redirect(Request $request,$social)
     {
       
          
         Session::put('name',$request->name);
         Session::put('age',$request->age);
         Session::put('gender',$request->gender);
         Session::put('address',$request->address);
         Session::put('country',$request->country);
         
       
         return Socialite::driver($social)->redirect();
     }
 
 
     public function callback(Request $request,$social)
     {
        
    
         try {
             $socialiteLogin = true;            
            
             if($social == 'twitter'){
                $socialUser = Socialite::driver($social)->user();
             }else{
                $socialUser = Socialite::driver($social)->stateless()->user();
             }
                   
            

             $existUser = User::where('email',$socialUser->email)->first();
              
             if($existUser) {    
                 Auth::loginUsingId($existUser->id);
                 return redirect()->to('/home');
             }
             else {
                 if(!Session::get('age')){
                    Session::put('social',$social);
                
                     return redirect()->route('socialite.register');
                 }  
 
                 $user = new User;
                 $user->name = Session::get('name');
                 $user->email = $socialUser->email;
                 $user->gender = Session::get('gender');
                 $user->age = Session::get('age');
                 $user->address = Session::get('address');
                 $user->country = Session::get('country');
                 $user->socialite = 1;
                 $user->save();
                 Session::put('newUser',$socialUser->name);
                 if($socialUser->email && $socialUser->name){
                 Event::fire(new SendMail($socialUser->email,$socialUser->name));
                }
                 Auth::loginUsingId($user->id);
               
                 return redirect()->to('/home')->with('socialiteLogin',$socialiteLogin);
             }
             
         } 
         catch (Exception $e) {
             return 'error';
         }
     }
 
 
}
