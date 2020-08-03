<?php

namespace App\Http\Controllers\Front;

use App\Post;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerieController extends Controller
{
    public function Show($slug, $season = 1)
    {
        $post = Post::whereSlug($slug)->first();
        if (is_null($post)) {
            abort(404);
        }
        $relatedPosts = $post->relatedPosts();
        // dd($relatedPosts);
        $seasons = $post->episodes->where('season', $season);
         $title = $post->title;

        return view('Front.ShowSerie',
         ['post' => $post, 'relatedPosts' => $relatedPosts, 'seasons' => $seasons,'title'=>$title]);
    }

    public function All()
    {
        $year = Carbon::now()->year();
        $newseries = Post::where('type', 'series')->latest()->take(10)->get();

        $newyear = Post::where(['year' => $year, 'type' => 'series'])->latest()->take(10)->get();
        $latestdoble = Post::whereHas('categories', function ($q) {
            $q->where('name', 'دوبله فارسی');
        })->where('type', 'series')->latest()->take(10)->get();

        $sliders = Slider::whereHas('post', function ($q) {
            $q->where('type', 'series');
        })->latest()->get();

        $data['newseries'] = $newseries;
        $data['latestdoble'] = $latestdoble;
        $data['newyear'] = $newyear;
        $data['year'] = $year;
        $data['sliders'] = $sliders;
        return view('Front.AllSeries', $data);
    }
}