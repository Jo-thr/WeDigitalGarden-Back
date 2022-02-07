<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The email subject
     *
     * @var
     */
    public $subject;

    /**
     * The email last name
     *
     * @var
     */
    public $lastName;

    /**
     * The email first name
     *
     * @var
     */
    public $firstName;

    /**
     * The email company name
     *
     * @var
     */
    public $companyName;

    /**
     * The email email
     *
     * @var
     */
    public $email;

    /**
     * The email phone number
     *
     * @var
     */
    public $phoneNumber;

    /**
     * The email content
     *
     * @var
     */

    public $content;
    /**
     * Create a new message instance.
     *
     * @param $slot
     * @return void
     */
    public function __construct($slot)
    {
        $this->subject = "Prise de contact";
        $this->lastName = $slot['lastName'];
        $this->firstName = $slot['firstName'];
        $this->companyName = $slot['companyName'];
        $this->email = $slot['email'];
        $this->phoneNumber = $slot['phoneNumber'];
        $this->content = $slot['message'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->subject)
            ->from('mnibas@wedigital.garden')
            ->replyTo($this->email)
            ->view('emails.contact')->with([
                $this->lastName = $this->lastName,
                $this->firstName = $this->firstName,
                $this->companyName = $this->companyName,
                $this->email = $this->email,
                $this->phoneNumber = $this->phoneNumber,
                $this->content = $this->content,
            ]);

        return $this;
    }
}
