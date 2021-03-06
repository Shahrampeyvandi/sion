<?php

namespace App\Http\Controllers\Front;

use App\Actor;
use App\Episode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Slider;
use Carbon\Carbon;

use function GuzzleHttp\Psr7\try_fopen;

class MainController extends Controller
{
    public function index()
    {
        $year = Carbon::now()->year();
        $newSeries = Post::where(['type'=>'series','comming_soon'=>0])->latest()->take(10)->get();
        $newyear = Post::where(['year'=>$year,'comming_soon'=>0])->latest()->take(10)->get();
        $latestdoble = Post::whereHas('categories', function ($q) {
            $q->where('name', 'دوبله فارسی');
        })->latest()->take(10)->get();
         $newmovies = Post::where(['type'=>'movies','comming_soon'=>0])->latest()->take(10)->get();
        $sliders = Slider::latest()->get();
        
        $data['newmovies'] = $newmovies;
         $data['newseries'] = $newSeries;
        $data['latestdoble'] = $latestdoble;
        $data['newyear'] = $newyear;
        $data['year'] = $year;
        $data['sliders'] = $sliders;
        $data['title'] = 'صفحه اصلی';
        return view('Front.index', $data);
    }

    public function Play()
    {



        $model = Post::where('slug', request()->slug)->first();
        if (!$model) {
            abort(404);
        }

        if ($model->type == 'movies') {
            $post = $model;
            $videos = $model->videos;


            if (count($videos) == 0) {
                return back();
            }
        }
        if ($model->type == 'series') {
            $season = $model->seasons->where('name', request()->season)->first();
            if (!$season) {
                abort(404);
            }
            $post = $season->sections->where('section', request()->section)->first();
            if (!$post) {
                abort(404);
            }
            $videos = $post->videos;
        }
        return view('Front.play', compact(['videos', 'post']));
    }

    public function Trailer()
    {
        $model = Post::where('slug', request()->slug)->first();
        if (!$model) {
            abort(404);
        }
        $trailer = $model->trailer;
        if (!$trailer) {
            abort(404);
        }

        $post = $model;
        $trailer_url = $trailer->url;


        return view('Front.play', compact(['trailer_url', 'post']));
    }



    public function DownLoad($id)
    {



        $post = Post::find($id);
        $url = $post->videos->first()->url;
        $path      = parse_url($url, PHP_URL_PATH);
        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename  = pathinfo($path, PATHINFO_FILENAME);
        $filename = $post->slug . '.' . $extension;
        header("Content-disposition:attachment; filename=$filename");
        readfile($url);

        // $tempImage = tempnam(sys_get_temp_dir(), $filename);
        // copy($url, $tempImage);
        // return response()->download($tempImage, $filename);
    }

    public function MyFavorite()
    {
        if (auth()->check()) {

            $myfavorites = auth()->user()->favorite;
        }
        if (auth()->guard('admin')->check()) {
            $myfavorites = auth()->guard('admin')->user()->favorite;
        }
        return view('Front.MyFavorite', compact('myfavorites'));
    }

    public function ShowMore()
    {
        $year = Carbon::now()->year();
        $c = request()->c;
        $type = request()->type;
        if ($c == $year) {
            if ($type == 'all') {
                $data['posts'] = Post::where('year', $year)->latest()->get();
                $data['title'] = 'فیلم های امسال';
            }
            if ($type == 'movie') {
                $data['posts'] = Post::where(['year' => $year, 'type' => 'movies'])->latest()->get();
                $data['title'] = 'فیلم های امسال';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::where(['year' => $year, 'type' => 'serie'])->latest()->get();
                $data['title'] = 'سریال های امسال';
            }
        }
        if ($c == 'doble') {
            if ($type == 'all') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
            if ($type == 'movie') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->where('type', 'movies')->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::whereHas('categories', function ($q) {
                    $q->where('name', 'دوبله فارسی');
                })->where('type', 'series')->latest()->get();
                $data['title'] = 'دوبله فارسی';
            }
        }
        if ($c == 'new') {
            if ($type == 'movie') {
                $data['posts'] = Post::where('type', 'movies')->latest()->get();
                $data['title'] = 'تازه ترین ها';
            }
            if ($type == 'serie') {
                $data['posts'] = Post::where('type', 'series')->latest()->get();
                $data['title'] = 'تازه ترین ها';
            }
        }



        return view('Front.ShowMore', $data);
    }

    public function CommingSoon()
    {
        $data['commingsoon'] = Post::where('comming_soon', 1)->latest()->get();
        $data['title'] = 'به زودی ';
        return view('Front.CommingSoon', $data);
    }
    public function ShowCast($name)
    {

        if(request()->type == 'actor') {
            $cast = Actor::whereName($name)->first();
            if($cast) {
                 $data['cast'] = $cast;
                  $data['title'] = $name;
            }else{
                abort(404);
            }
        }
        $data['posts'] = Post::whereHas('actors', function ($q) use ($name) {
                        $q->where('name',$name);
                    })->latest()->get();
       
        return view('Front.Cast', $data);
    }

    
}
