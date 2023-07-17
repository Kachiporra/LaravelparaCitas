<?php

namespace App\Http\Controllers\Auth;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $user->tokens()->delete();
            $token = $user->createToken("AppMobile");

            $token = explode("|", $token->plainTextToken);

            $arr = array('idUsr' => $user->id, 'token' => $token[1], 'nombre' => $user->name);

            return json_encode($arr);
        } else {
            $arr = array('idUsr' => 0, 'token' => "", 'nombre0' => "", 
            'error' => "No existe el usuaraio o contraeña es inválida");
            return json_encode(($arr));
        }
    }
}
