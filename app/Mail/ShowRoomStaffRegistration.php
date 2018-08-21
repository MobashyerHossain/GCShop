<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShowRoomStaffRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($staff)
    {
        $this->staff = $staff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.showroom.showRoomStaffRegistration',['staff' => $this->staff]);
    }
}
