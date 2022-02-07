<?php

namespace App\Http\Controllers;

use App\Mail\StartNewProject;
use App\Mail\Subscribe;
use App\Models\Project_requests;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    private $notifiableEmail = "emma@wedo.design";

    public function subscribe(Request $request){
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            Notification::route('mail', $this->notifiableEmail)
                ->notify(new \App\Notifications\Subscription($request->email));

            $subscription = new Subscription();
            $subscription->email = $request->email;
            $subscription -> save();

            return redirect()->back()->with(['success' => 'Request successfully sent!']);
        }
    }
}
