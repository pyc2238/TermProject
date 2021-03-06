<?php

namespace App\Listeners;

use App\Events\ResetPwMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;


class ResetPwMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ResetPwMail  $event
     * @return void
     */
    public function handle(ResetPwMail $event)
    {
        $uemail = $event->email;
        $uname = $event->name;

        Mail::send(['html'=>'component.mail'],['name','Sathak'],function($message) use ($uemail,$uname){
            $message->to($uemail,$uname.'님')->subject('안녕하세요 NEITTER입니다.');
            $message->from('pyc2238@gmail.com','보근');
        });
    }
}
