<?php

namespace App\Http\Controllers;

use App\Mail\StartNewProject;
use App\Mail\Subscribe;
use App\Models\Project_requests;
use App\Models\Setting;
use App\Models\Subscription;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MainController extends Controller
{
//    private $notifiableEmail = "emma@wedo.design"; //dev email
    private $notifiableEmail = "info@originswinemag.com";

    public function getIndex(){
        $settings = Setting::first();
        return view('welcome',compact('settings'));
    }


    public function subscribe(Request $request, Newsletter $newsletter){

        $messages = [
            'email.unique' => "The email has already been registered.",
        ];

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscriptions|max:255',
        ],$messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            try{
                $newsletter->subscribe($request->email);

                Notification::route('mail', $this->notifiableEmail)
                    ->notify(new \App\Notifications\Subscription($request->email));

                $subscription = new Subscription();
                $subscription->email = $request->email;
                $subscription -> save();
            }
            catch (\Exception $e){
                throw ValidationException::withMessages([
                    'email' => 'This email could not be added to out newsletter list'
                ]);
            }

            return redirect()->back()->with(['success' => 'Request successfully sent!']);
        }
    }

    public function addAudience($email){




//        $response = $mailchimp->ping->get();
//        print_r($response);
    }
}
