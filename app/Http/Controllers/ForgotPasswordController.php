<?php

namespace App\Http\Controllers;

use App\Mail\forgotemail;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Events\ForgotActivationEmail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Sentinel;
use Reminder;
use App\User;
use Mail;
use auth;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function email()
    {
        return view('page.email');
    }

    public function postforgot(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users'
        ]);
        $user = User::whereEmail($request->email)->first();
        if ($user == null) {
            return redirect()->back()->with('error', 'Email yang anda masukkan tidak cocok, mohon isi dengan benar');
        } else {
            $user->update([
                'active_token' => rand(100000, 999999),
            ]);
            event(new ForgotActivationEmail($user));
            return redirect('/password/reset')->with('success', 'Link Merubah password telah dikirim ke email anda');
        }
    }

    public function verifytoken()
    {
        return view('page.verifotp');
    }

    public function postverifytoken(Request $request)
    {
        $user = User::whereActive_token($request->active_token)->first();

        if ($user == null) {
            return redirect()->back()->with('error', 'error, token tidak valid');
        } else {

            return redirect('/resetpassword/' . $user->id)->with('success', 'silahkan masukkan password baru');
        }
    }



    public function reset($id)
    {
        // $user=User::whereActive_token($request->active_token)->first();
        $user = \App\User::find($id);
        return view('page.reset', ['user' => $user]);
    }


    public function sendEmail($user, $code)
    {
        Mail::send(
            'email.forgot',
            ['user' => $user, 'code' => $code],
            function ($message) use ($user) {
                $message->to($user->email);
                $message->subject("user->username, reset your password");
            }
        );
    }
    public function updatepass(Request $request, $id)
    {

        $user = \App\User::find($id);
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect('/login')->with('sukses', 'password berhasil diperbarui');
    }
}
