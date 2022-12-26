<?php

namespace App\Http\Controllers\Manager\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function index()
    {
        return view('manager.auth.login');
    }

    public function login(Request $request)
    {
        $request['remember'] = empty($request->remember) ? false : true;

        $this->validaLogin($request);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::guard('web')->attempt($credenciais, $request->remember)) {
            return redirect()->intended(route('manager.dash'));
        }

        return redirect()->back()->withInputs($request->only('email', 'remember'))->with('error', 'E-mail ou senha incorreto!');
    }

    protected function validaLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|exists:users,email,active,1',
            'password' => 'required',
        ]);
    }

    public function showForgot()
    {
        return view('manager.auth.forgot');
    }

    // Envia email de recuperação
    public function sendForgot(Request $request) 
    {
        $request->validate([
            'email' => 'required|exists:users,email,active,1'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('manager.reset.token', ['token' => $token, 'email' => $request->email]);
        $body = "Recebemos uma solicitação para redefinir a senha da sua conta <b>S.I.Q - Sistema de Inspeção e Qualidade - (Checklist)</b> associada a " . $request->email . ". Você pode redefinir sua senha clicando no link abaixo";

        Mail::send('manager.auth.email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('naoresponda@agropeu.com.br', 'S.I.Q - Checklist');
            $message->to($request->email, 'Seu nome')
                ->subject('Reset Password');
        });

        return back()->with('success', 'Enviamos o link de redefinição de senha por e-mail!');
    }

    // Direciona para página de nova senha, atráves do link recebido por email
    public function showResetPassword(Request $request, $token = null)
    {
        return view('manager.auth.reset-forgot')->with(['token' => $token, 'email' => $request->email]);
    }

    // Valida a nova senha e redireciona para pagina de login
    public function sendResetPassword(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email|exists:users,email,active,1',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Token invalido');
        } else {
            User::where('email', $request->email)->update([
                'password' => bcrypt($request->password)
            ]);
        }

        DB::table('password_resets')->where([
            'email' => $request->email
        ])->delete();



        return redirect()->route('manager.login')
            ->with('info', 'Sua senha foi alterada! Você pode fazer login com sua nova senha')
            ->with('email', $request->email);  

    }
}
