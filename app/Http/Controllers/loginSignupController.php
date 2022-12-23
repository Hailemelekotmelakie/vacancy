<?php

namespace App\Http\Controllers;

use App\Models\UsersList;

use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Hash as FacadesHash;
use session;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class loginSignupController extends Controller
{
    public function login()
    {
        return view('authentics.login');
    }

    public function signup()
    {
        return view('authentics.signup');
    }


    public function register(Request $request)
    {
        $request->validate([
            'fullName' => 'required|string|max:70',
            'email' => 'required|email|max:255|unique:users_lists',
            'password' => 'required|min:8|max:200',
            'passwordConfirmation' => 'required|min:8|max:200|same:password'
        ]);

        $fullName = $request->fullName;
        $email = $request->email;
        $password = Hash::make($request->password);
        $code = '0';
        $status = 'Unverified';
        $role = '0';
        $timeAgo = time();
        $registeredDate = date("Y-m-d");

        $NewUsersList = new UsersList();

        $NewUsersList->fullName = $fullName;
        $NewUsersList->email = $email;
        $NewUsersList->password = $password;
        $NewUsersList->role = $role;
        $NewUsersList->status = $status;
        $NewUsersList->code = $code;
        $NewUsersList->timeAgo = $timeAgo;
        $NewUsersList->registeredDate = $registeredDate;
        $NewUsersList->save();

        session()->put('email', $email);
        return redirect('activation');
    }

    public function loginChecker(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:200'
        ]);

        $email = $request->email;
        $user = UsersList::where('email', $email)->first();
        if ($user) {
            if ($user->status == 'Unverified' and $user->status != '1') {
                return redirect('activation')->with('activateEmail', $email);
            } else {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loginId', $user->id);
                    $request->session()->put('remotLogin', $email);

                    if ($user->role == '1') {
                        $request->session()->put('adminRole', $user->id);
                        return redirect('adminoC');
                    }
                    return redirect('post-job');
                } else {
                    return back()->with('NotFound', 'Password not matches.');
                }
            }
        } else {
            return back()->with('NotFound', 'Email is not registered. Please signup first');
        }
    }

    public function logout()
    {
        if (session('loginId')) {
            session()->pull('loginId');
            if (session('adminRole')) {
                session()->pull('adminRole');
            }
            return redirect('/')->with('NotFound', "You have to login first");
        }
    }

    public function passwordRecovery()
    {
        return view('authentics.password-recovery');
    }

    public function sendReset(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users_lists'
        ]);
        $email = $request->email;
        $request->session()->put('email', $email);
        return redirect('codeSent');
    }




    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////



    public function codeSent()
    {
        $code = rand(1000, 9999999);
        $email = session('email');
        $name = "Vacancy Ethiopia";  // Name of your website or yours
        $to = $email; // "respectjemora@gmail.com";  // mail of reciever
        $subject = "vacancy Ethiopia";
        $body = "Password recovery link " . 'http://localhost:8000/passwordRecoveryLink/' . $to . '/' . $code;
        $from = "youraddress1991@gmail.com";  // you mail
        $password = "ubqxpafmyhpfbtek";  // your mail password

        //create a instance phpmailer
        $mail = new PHPMailer();
        //set mailer to use smtp
        $mail->isSMTP();
        //define smtp host
        $mail->Host = "smtp.gmail.com";
        //enable smtp authentication
        $mail->SMTPAuth = "true";
        //set type of encryption (ssl/tls)
        $mail->SMTPSecure = "tls";
        //set port to connect smtp
        $mail->Port = "587";
        //set gmail user
        $mail->Username = "youraddress1991@gmail.com";
        //set gmail password
        $mail->Password = "ubqxpafmyhpfbtek";
        //set gmail subject
        $mail->Subject = $subject; // subject
        //set sender email
        $mail->setFrom($from, $name); // from
        //email body
        $mail->Body = $body; //body
        //add recipient
        $mail->addAddress($to); // to
        // $mail->addCC($CC);
        // $mail->addCC();
        // $mail->addBCC($BCC);
        // $mail->addAttachment($name);


        if ($mail->send()) {
            UsersList::where('email', '=', $to)->update([
                'code' => $code
            ]);
            return  "We've sent password recovery link to your email adress - $to";
        } else {
            return "Failed while sending code!"; //. $mail->ErrorInfo;
        }
    }


    public function verify(Request $request, $email, $code)
    {
        $user = UsersList::where('email', $email)->first();
        if ($user->code == $code) {
            UsersList::where('email', '=', $email)->update([
                'code' => '1',
                'status' => 'Verified'
            ]);

            $request->session()->put('codeWithEmail', $code);
            $request->session()->put('emailWithCode', $email);
            $request->session()->put('remotLogin', $email);
            return redirect('setNewPassword');
        }
        return 'Link expired';
    }

    public function setNewPassword()
    {
        return view('authentics.setNewPassword');
    }

    public function putNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|max:200',
            'passwordConfirmation' => 'required|min:8|max:200|same:password'
        ]);
        $email = session('emailWithCode');
        $c = session('codeWithEmail');
        $newPassword = FacadesHash::make($request->password);

        UsersList::where('email', '=', $email)->update([
            'password' => $newPassword
        ]);
        return redirect('/login')->with('Success', 'Password Reseted Successfully, Now you can login with email and password');; //view('setNewPassword');
    }

    public function activation()
    {
        $code = rand(1000, 9999999);
        $email = session('email');
        $name = "Vacancy Ethiopia";  // Name of your website or yours
        $to = $email; // "respectjemora@gmail.com";  // mail of reciever
        $subject = "Vacant jobs in Ethiopia";
        $body = "Account activation link " . 'http://localhost:8000/ActivationLink/' . $to . '/' . $code;
        $from = "youraddress1991@gmail.com";  // you mail
        $password = "ubqxpafmyhpfbtek";  // your mail password

        //create a instance phpmailer
        $mail = new PHPMailer();
        //set mailer to use smtp
        $mail->isSMTP();
        //define smtp host
        $mail->Host = "smtp.gmail.com";
        //enable smtp authentication
        $mail->SMTPAuth = "true";
        //set type of encryption (ssl/tls)
        $mail->SMTPSecure = "tls";
        //set port to connect smtp
        $mail->Port = "587";
        //set gmail user
        $mail->Username = "youraddress1991@gmail.com";
        //set gmail password
        $mail->Password = "ubqxpafmyhpfbtek";
        //set gmail subject
        $mail->Subject = $subject; // subject
        //set sender email
        $mail->setFrom($from, $name); // from
        //email body
        $mail->Body = $body; //body
        //add recipient
        $mail->addAddress($to); // to
        // $mail->addCC($CC);
        // $mail->addCC();
        // $mail->addBCC($BCC);
        // $mail->addAttachment($name);


        if ($mail->send()) {
            UsersList::where('email', '=', $to)->update([
                'code' => $code
            ]);
            return  view('authentics.activationConfirmation');
        } else {
            return "Failed while sending code!"; //. $mail->ErrorInfo;
        }
    }

    public function ActivationLink($email, $code)
    {
        $user = UsersList::where('email', $email)->first();
        if ($user->code == $code) {
            UsersList::where('email', '=', $email)->update([
                'code' => '1',
                'status' => 'Verified'
            ]);

            return redirect('/login')->with('Success', 'Email Activated Successfully, Now you can login with email and password');
        }
        return 'Link expaired.';
    }
}
