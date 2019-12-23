<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $query = request()->search;

        $videos = collect();
        $channels = collect();

        if ($query) {
            $videos = Video::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(10, ['*'], 'video_page');
            $channels = Channel::where('name', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->paginate(10, ['*'], 'channel_page');
        }

        return view('admin.dashboard')->with([
            'videos' => $videos,
            'channels' => $channels
        ]);
    }


}
