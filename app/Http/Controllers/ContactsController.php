<?php

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    public function getContacts($locale){
        return view('contacts');
    }
}
