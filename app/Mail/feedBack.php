<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class feedBack extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $data;
    public $fields = [
        'name' => 'Имя пользователя',
        'phone' => 'Номер телефона',
        'email' => 'Электронный адрес',
        'note' => 'Комментарий',
        'season' => 'Сезон',
        'date' => 'Дата заезда',
        'hunters' => 'Количество охотников',
        'guests' => 'Количество гостей',
    ];

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.default');
    }
}
