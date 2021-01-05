<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\licensies;
use App\Models\Tour;
use App\Models\TourPictures;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function permissions()
    {
        $perms = licensies::with('picture')->get();

        return view('pages.permissions')->withPerms($perms);
    }

    public function permission($id)
    {
        $perm = licensies::whereId($id)->with('location')->with('seasons')->first();

        foreach ($perm->seasons as $k=>$season)
        {
            $season->date_from = date('d.m.Y', strtotime($perm->seasons[0]->date_from));
            $season->date_to = date('d.m.Y', strtotime($perm->seasons[0]->date_to));
            $perm->seasons[$k] = $season;
        }
        $tours = Tour::with('location')->orderBy('available_period_min')->limit(4)->get();

        return view('pages.permission')->withPerm($perm)->withTours($tours);
    }

    public function tours()
    {
        $tours = Tour::with('location')->get();

        return view('pages.tours')->withTours($tours);
    }

    public function tour($slug)
    {
        $tour = Tour::whereId($slug)->with('location')->first();
        $tour->pics = $tour->images();
        $origin = date_create($tour->available_period_min);
        $target = date_create($tour->available_period_max);
        $interval = date_diff($origin, $target);
        $tours = Tour::with('location')->orderBy('available_period_min')->limit(3)->get();
        foreach ($tours as $k=>$tour)
        {
            $origin = date_create($tour->available_period_min);
            $target = date_create($tour->available_period_max);
            $int = date_diff($origin, $target);
            $tour->days_av = $int->format('%a дней');
            $tours[$k] = $tour;
        }

        return view('pages.tour')->withTour($tour)->withDays($interval->format('%a дней'))->withTours($tours);
    }

    public function company()
    {
        return view('pages.company');
    }

    public function contacts()
    {
        return view('pages.contacts');
    }

    public function blog()
    {
        $blogs = blog::paginate(6);


        return view('pages.blog')->withBlogs($blogs);
    }

    public function post($slug)
    {
        $blog = blog::find($slug);
        return view('pages.post')->withBlog($blog);
    }
}
