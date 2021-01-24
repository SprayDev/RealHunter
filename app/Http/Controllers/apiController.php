<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendMailRequest;
use App\Mail\feedBack;
use App\Models\licensies;
use App\Models\location;
use Illuminate\Database\Eloquent\Builder;
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

    public function licenses_filter(Request $request)
    {
        $params = $request->all();
        $location_id = $params['location_id'];
        $location_id = $location_id == 'null' ? null : $location_id;

        $season_date = $params['season_date'];
        $season_date = $season_date == 'null' ? null : $season_date;
//        var_dump($season_date);
        $licenses = [];
        $licenses = licensies::whereHas('location', function ($q) use ($location_id, $season_date) {
            $q->when($location_id, function ($query, $location_id){
                return $query->where('location_id', $location_id);
            })->when($season_date, function ($query, $season_date){
                return $query->where('season_start', '<=', $season_date)
                    ->where('season_end', '>=', $season_date);
            });
        })
            ->with('picture')
            ->get();
        return $licenses;
    }
}
