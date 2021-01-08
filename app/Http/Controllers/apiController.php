<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\feedBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class apiController extends Controller
{
    public function send_mail(SendMailRequest $request)
    {
        $request->validated();

        $params = $request->all();
        $email = $request->get('email');

        Mail::to('info@realhunting.ru')->send(new feedBack($params));
        return ['error' => false];
    }
}
