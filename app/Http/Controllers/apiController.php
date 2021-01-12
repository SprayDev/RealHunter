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
        $params = $request->all();
        $email = $request->get('email');
        if (isset($params['season']))
            $params['season'] = json_decode($params['season']);

        Mail::to('info@realhunting.ru')->send(new feedBack($params));
        return ['error' => false, 'params' => $params];
    }
}
