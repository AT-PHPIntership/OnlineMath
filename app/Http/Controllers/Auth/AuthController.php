<?php
namespace App\Http\Controllers\Auth;

use Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Exceptions\InvalidConfirmationCodeException;
use App\Repositories\Eloquent\UserRepositoryEloquent;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * The user repository eloquent instance.
     *
     * @var PostRepository
     */
    protected $user;

    /**
     * Create a new authentication controller instance.
     *
     * @param UserRepositoryEloquent $user the user repository
     *
     * @return void
     */
    public function __construct(UserRepositoryEloquent $user)
    {
        $this->user=$user;
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data request data to validate
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'=>'required|min:2|max:128',
            'username' => 'required|min:2|max:280|unique:users',
            'password' => 'required|confirmed|min:6|max:32',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data the data to create user
     *
     * @return User
     */
    protected function create(array $data)
    {
        return $this->user->create([
            'name' => $data['name'],
            'username'=>$data['username'],
            'password' => bcrypt($data['password']),
            'birtday'=>$data['birthday'],
            'address'=>$data['address'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request The registration request
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->only([
            'name',
            'username',
            'password',
            'password_confirmation',
            'birthday',
            'address',
        ]);

        $validator = $this->validator($input);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator);
        }

        try {
            $this->create($input);
            return redirect()->route('login')
                         ->withMessage(trans('common.auth.activated'));
        } catch (Exception $e) {
            return redirect()->route('register')
                             ->withErrors(trans('common.auth.failure_creating'));
        }
    }

   /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }
}
