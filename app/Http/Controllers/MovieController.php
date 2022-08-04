<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MovieController extends Controller
{
    public function index()
    {
        $now_playing = http_request("movie/now_playing");
        $now_playing = json_decode($now_playing);        
        $popular = http_request("movie/popular");
        $popular = json_decode($popular);
        $top_rated = http_request("movie/top_rated");
        $top_rated = json_decode($top_rated);
        $upcoming = http_request("movie/upcoming");
        $upcoming = json_decode($upcoming);        
        $genre = http_request("genre/movie/list");
        $genre = json_decode($genre);
        $trending_daily = http_request("trending/all/day");
        $trending_daily = json_decode($trending_daily);
        $trending_weekly = http_request("trending/all/week");
        $trending_weekly = json_decode($trending_weekly);
        

        $data = [];
        $data['title'] = 'Movie';
        $data['now_playing'] = array_slice($now_playing->results, 0, 8);
        $data['popular'] = array_slice($popular->results, 0, 6);
        $data['top_rated'] = array_slice($top_rated->results, 0, 6);
        $data['upcoming'] = array_slice($upcoming->results, 0, 6);
        $data['genres'] = $genre->genres;
        $data['daily'] = array_slice($trending_daily->results, 0, 12);
        $data['weekly'] = array_slice($trending_weekly->results, 0, 12);
        
        return view('index', $data);
    }

    public function detail(Request $request, $id)
    {
        $detail = http_request("movie/".$id);
        $detail = json_decode($detail);
        $video = http_request("movie/".$id."/videos");
        $video = json_decode($video);        
        
        $data = [];
        $data['title'] = 'Movie | '.$detail->title;
        $data['detail'] = $detail;
        $data['video'] = $video;
        //dd($data);
      
        return view('detail', $data);
    }

    public function list(Request $request, $slug)
    {        
        $list = http_request("movie/".$slug);
        $list = json_decode($list); 
        $genre = http_request("genre/movie/list");
        $genre = json_decode($genre);

        $data = [];
        $data['title'] = 'Movie | '.upper($slug);
        $data['list'] = $list->results;
        $data['genres'] = $genre->genres;
        $data['slug'] = upper($slug);
        //dd($data);

        return view('list', $data);
    }

    public function about()
    {
        $data = [];
        $data['title'] = 'About';
        return view('about', $data);
    }

    public function contact()
    {
        $data = [];
        $data['title'] = 'Contact';
        return view('contact', $data);
    }

    public function contact_form(Request $request)
    {
        $data = $request->all();
        $data["subject"] = "Contact Form";

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        
        if($validator->fails()) {            
            return back()->withErrors($validator)
                            ->withInput();
        }
        
        Mail::to("lxalt07@gmail.com")->send(new ContactMail($data));
        
        return redirect()->route('contact')->with('success', 'Your data has been sent successfully!');
         
    }

    public function list_api(Request $request)
    {   
        return response()->json([
            'status' => 200,      
            'message' => 'ok'                  
        ]);
    }

}
