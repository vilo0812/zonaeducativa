<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UsuarioRegistrado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $first_name;
    public $last_name;
    public $identification_card;
    public $email;
    public $phone;
    public $password;
    public $rol_id;
    public function __construct($first_name,$last_name,$identification_card,$email,$phone,$password,$rol_id)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->identification_card=$identification_card;
        $this->email=$email;
        $this->phone=$phone;
        $this->password=$password;
        $this->rol_id=$rol_id;
    }
    public function build()
    {

        return $this->view('emails.test');
    }
}
