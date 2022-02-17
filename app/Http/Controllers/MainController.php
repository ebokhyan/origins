<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailSubscriptionRequest;
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
//     private $notifiableEmail = "emma@wedo.design";
    private $notifiableEmail = "info@originswinemag.com";

    public function getIndex(){
        $settings = Setting::first();
        return view('welcome',compact('settings'));
    }


    public function subscribe(EmailSubscriptionRequest $request, Newsletter $newsletter){
        // The incoming request is valid...

        // Retrieve the validated input data...
        $validated = $request->validated();
            try{
                $newsletter->subscribe($request->email);

                Notification::route('mail', $this->notifiableEmail)
                    ->notify(new \App\Notifications\Subscription($request->email));

                Notification::route('mail', $request->email)
                    ->notify(new \App\Notifications\SuccessfullySubscribed());

                $subscription = new Subscription();
                $subscription->email = $request->email;
                $subscription -> save();
            }
            catch (\Exception $e){
                throw ValidationException::withMessages([
                    'email' => 'This email could not be added to our subscribers list'
                ]);
            }

            return redirect()->back()->with(['success' => 'Thank you for subscribing to Origins Magazine and welcome to our community!']);
    }

    public function unsubscribe($email){}
}
