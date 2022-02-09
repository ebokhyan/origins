<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    protected function client(){
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14'
        ]);
    }

    public function getMember(){
        return $this->client()->lists->getAllLists();
    }

    public function subscribe(string $email){
        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'),[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function unsubscribe(){

    }
}
