<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;
     /** * Where to redirect users after login. * * @var string */ 

        protected $redirectTo = '/home';
         /** * Create a new controller instance.
          *  * * @return void */ 
         
        public function __construct() 
         { 
             $this->middleware('guest')->except('logout'); 
             $this->middleware('guest:admin')->except('login'); 
             $this->middleware('guest:admin')->except('logout'); 
            //  $this->middleware('guest:blogger')->except('logout'); 
        } 
        
        public function showAdminLoginForm() 
        { 
            return view('admins.auth.login', ['url' => 'admin']);
        } 
        
        public function adminLogin(Request $request) 
        { 
            // return $request->all();
            $this->validate($request, [ 'email' => 'required|email', 'password' => 'required|min:6' ]); 
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                 return redirect()->intended('/admin');
                } 
            return back()->withInput($request->only('email', 'remember'));
        } 

        public function logout(Request $request)
        {
            $this->guard('admin')->logout();
    
            $request->session()->invalidate();
    
            return redirect('/login');
        }
    
         protected function guard() // And now finally this is our custom guard name
        {
            return Auth::guard('admin');
        }

    
        
      
     


}
