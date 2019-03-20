<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Song;
use Auth;
use App\Http\Controllers\ScrapperController;
use Illuminate\Routing\UrlGenerator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $user_id = Auth::user()->id;
//        $profile = DB::table('users')->join('songs', 'users.id', '=', 'songs.user_id')
//            ->select('users.*', 'songs.*')->where(['songs.user_id' => $user_id])->first();
//       $songs = Song::all();
        $profile = DB::select('select * from songs where user_id = ?', [$user_id]);

// var_dump($profile);

//        foreach ($profile as $pro)
//        {
//            echo "".$pro->url;
//        }

      return view('profile', ['profile' => $profile]);

    }

    public function addSong()
    {




        $purl = url()->previous();

        $song = new Song();

        if($purl == "http://127.0.0.1:8000/") {
            $song->user_id = Auth::user()->id;
            $song->song_name = ScrapperController::getSongs()->title;
            $song->url = ScrapperController::getSongs()->link;
            $song->save();
            return redirect('/profile');
        }
        else{
            $song->user_id = Auth::user()->id;
//            $song->song_name = ScrapperController::searchSongByName()->title;
//            $song->url = ScrapperController::searchSongByName()->link;
//            $song->save();
            $title_file = fopen("title.txt", "r") or die("Unable to open file!");
            $song->song_name = fread($title_file,filesize("title.txt"));

            fclose($title_file);
            $link_file = fopen("link.txt", "r") or die("Unable to open file!");
            $song->url = fread($link_file,filesize("link.txt"));
            fclose($link_file);
           $song->save();
            return redirect('/profile');

        }
        }
        public function deleteSong($song_id)
        {
            Song::where('id', $song_id)->delete();
            return redirect('/profile');

        }


}