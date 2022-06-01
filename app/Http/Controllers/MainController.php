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
    private $to_email;

    public function __construct()
    {
        $this->to_email = config('notify.to_email');
    }

    public function getIndex(){
        $settings = Setting::first();
        return view('welcome',compact('settings'));
    }

    public function verifySubscription(Request $request,Newsletter $newsletter){
        $subscribed = Subscription::where('verify_token',$request->token)->first();
        if($subscribed){
            try{
                $subscriber = $newsletter->subscribe($subscribed->email);

                Notification::route('mail', $this->to_email)
                    ->notify(new \App\Notifications\Subscription($subscriber->email_address));

                Notification::route('mail', $subscriber->email_address)
                    ->notify(new \App\Notifications\SuccessfullySubscribed());

                $subscribed->verify_token = null;
                $subscribed->unique_email_id = $subscriber->unique_email_id;
                $subscribed->list_id = $subscriber->list_id;
                $subscribed->status = $subscriber->status;
                $subscribed->web_id = $subscriber->web_id;
                $subscribed->contact_id = $subscriber->contact_id;
                $subscribed -> save();
            }
            catch (\Exception $e){
                switch ($e->getCode()){
                    case(400) :
                    case(422):
                        $message = trans('main.validation.email.already_subscribed');
                        return redirect('/')->with(['success' => $message]);
                        break;
                    case(503) :
                        $message = trans('main.validation.email.error_sending');
                        break;
                    default :
                        $message = trans('main.smt_went_wrong');
                };
                throw ValidationException::withMessages(['email' => $message]);
            }
            return redirect('/')->with(['success' => trans('main.subscription_success')]);
        }else{
            abort(404);
        }
    }


    public function subscribe(EmailSubscriptionRequest $request){

        // The incoming request is valid...
        // Retrieve the validated input data...
        $validated = $request->validated();
        try{
            Notification::route('mail', $request->email)
                ->notify(new \App\Notifications\EmailVerification($request->_token));

            $subscription = new Subscription();
            $subscription->email = $request->email;
            $subscription->verify_token = $request->_token;
            $subscription -> save();
        }
        catch (\Exception $e){
            switch ($e->getCode()){
                case(400) :
                case(422):
                    $message = trans('main.validation.email.already_subscribed');
                    break;
                case(503) :
                    $message = trans('main.validation.email.error_sending');
                    break;
                default :
                    $message = trans('main.cant_add');
            };
            throw ValidationException::withMessages(['email' => $message]);
        }
        if($request->ajax()){
            return response()->json(['success' => Lang::get('main.subscription.success_mgs')]);
        }
        return redirect()->back()->with(['success' => trans('main.subscription_verify_msg')]);
    }

    public function unsubscribe($email){}

}
