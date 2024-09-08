<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NeedHelpMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $message_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $message_text)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message_text = $message_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('mail.need_help_message')->subject('Обращение в службу поддержки');
        return $this->view('mail.need_help_message')->subject('Всероссийская Олимпиада по туризму - Обращение в службу поддержки')->phone;
    }
}
