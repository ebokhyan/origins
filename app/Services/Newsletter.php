<?php

namespace App\Services;
use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email){
        return $this->client()->lists->addListMember(config('services.mailchimp.lists.subscriptions'),[
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    protected function client(){
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
//            'server' => 'YOUR_SERVER_PREFIX'
            'server' => 'us6'
        ]);
    }
    public function unsubscribe(){

    }
}
