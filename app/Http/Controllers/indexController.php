<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\licensies;
use App\Models\location;
use App\Models\Tour;
use App\Models\TourPictures;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $tours = Tour::limit(3)->orderby('created_at')->get();
        return view('pages.index')->withTours($tours);
    }

    public function permissions()
    {
        $perms = licensies::with('picture')->get();
        $locations = location::all();
        return view('pages.permissions')->with([
            'perms' => $perms,
            'locations' => $locations,
        ]);
    }

    public function permission($id)
    {
        $perm = licensies::whereId($id)->with('location')->with('seasons')->first();
        if (!$perm)
            abort(403);
        foreach ($perm->seasons as $k=>$season)
        {
            $season->date_from = date('d.m.Y', strtotime($season->date_from));
            $season->date_to = date('d.m.Y', strtotime($season->date_to));
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
        $tour = Tour::whereId($slug)->with('facilities')->with('prices')->with('location')->first();
        if (!$tour)
            abort(403);
        $tour->pics = $tour->images();
        $origin = date_create($tour->available_period_min);
        $target = date_create($tour->available_period_max);
        $interval = date_diff($origin, $target);
        $tours = Tour::with('location')->with('facilities')->orderBy('available_period_min')->limit(3)->get();
        foreach ($tours as $k=>$item)
        {
            $origin = date_create($item->available_period_min);
            $target = date_create($item->available_period_max);
            $int = date_diff($origin, $target);
            $item->days_av = $int->format('%a дней');
            $tours[$k] = $item;
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
        $blogs = blog::with('picture')->paginate(6);


        return view('pages.blog')->withBlogs($blogs);
    }

    public function post($slug)
    {
        $blog = blog::with('picture')->whereId($slug)->first();
        $blog->views_number++;
        $blog->save();
        $blog->date = date('d.m.Y', $blog->created_at->timestamp);
        return view('pages.post')->withBlog($blog);
    }
}
