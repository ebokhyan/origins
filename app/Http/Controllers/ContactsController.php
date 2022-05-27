<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\ValidationException;
use App\Models\ContactRequest as Contact;


class ContactsController extends Controller
{
    private $to_email;

    public function __construct()
    {
        $this->to_email = config('notify.to_email');
    }


    public function getContacts($locale){
        return view('contacts');
    }

    public function sendContact(ContactRequest $request) {
        $validated = $request->validated();

        if($request->ajax()){
            try {
                Notification::route('mail', $this->to_email)
                    ->notify(new \App\Notifications\ContactRequest($request->all()));

                Contact::create(array_except($request->all(),['_token']));

                return response()->json(['success' => trans('main.contact_success_msg')]);
            }
            catch (\Exception $e) {
                return response()->json(['error' => trans('main.smt_went_wrong')]);
            }
        }
    }
}
