<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
include('simple_html_dom.php');

class ScrapperController extends Controller
{

    //For recommended songs
    public static function getSongs()
    {
        // For recommended songs
        $html = file_get_html("https://www.youtube.com/results?search_query=Old+Bangla+Songs");
        $i = 1;
        $songlist = array();
        foreach($html->find('div') as $elements)
        {
            foreach ($elements->find('h3') as $h) {

                foreach ($h->find('a') as $a) {
                    if ($i > 6) {
                        break;
                    }
                    //getting song link from youtube
                    $link = $a->attr['href'];
                    $link = substr($link, 9);
                    $title = $a->title;
                    $title = substr($title, 0, 40);
                    $songlist[] = [
                        'title' => $title,
                        'url' => $link
                    ];
                    $i++;
                }
            }

        }


        //For latest songs
        $html = file_get_html("https://www.youtube.com/results?search_query=Lates+Bangla+Songs");
        $i = 1;
        $lsonglist = array();
        foreach($html->find('div') as $elements)
        {
            foreach ($elements->find('h3') as $h) {

                foreach ($h->find('a') as $a) {
                    if ($i > 6) {
                        break;
                    }
                    //getting song link from youtube
                    $li = $a->attr['href'];
                    $li = substr($li, 9);
                    $tit = $a->title;
                    $tit = substr($tit, 0, 45);
                    $lsonglist[] = [
                        'tit' => $tit,
                        'li' => $li
                    ];
                    $i++;
                }
            }

        }

        return view('home', compact('songlist', 'lsonglist', 'link', 'title'));
    }


    // search song by name method
    public static function searchSongByName(){
       global $title;
       global $link;
        $searchsong = $_GET['songname'];
        $searchsong = preg_replace("/ /", '+', $searchsong);
        $html = file_get_html("https://www.youtube.com/results?search_query=$searchsong+bangla+song");
        $i = 1;
        $songlist = array();
        foreach($html->find('div') as $elements)
        {
            foreach ($elements->find('h3') as $h) {

                foreach ($h->find('a') as $a) {
                    if ($i > 6) {
                        break;
                    }
                    //getting song link from youtube
                    $link = $a->attr['href'];
                    $link = substr($link, 9);
                    $title = $a->title;
                    $songlist[] = [
                        'title' => $title,
                        'url' => $link
                    ];
                    $i++;
                }
            }

        }

        //For latest songs
        $html = file_get_html("https://www.youtube.com/results?search_query=Latest+Bangla+Songs");
        $i = 1;
        $lsonglist = array();
        foreach($html->find('div') as $elements)
        {
            foreach ($elements->find('h3') as $h) {

                foreach ($h->find('a') as $a) {
                    if ($i > 6) {
                        break;
                    }
                    //getting song link from youtube
                    $li = $a->attr['href'];
                    $li = substr($li, 9);
                    $tit = $a->title;
                    $tit = substr($tit, 0, 45);
                    $lsonglist[] = [
                        'tit' => $tit,
                        'li' => $li
                    ];
                    $i++;
                }
            }

        }

//        file create for title
        $title_file = fopen("title.txt", "w") or die("Unable to open file!");
        $txt = $title;
        fwrite($title_file, $txt);
        fclose($title_file);

//        file create for link
        $link_file = fopen("link.txt", "w") or die("Unable to open file!");
        $txt = $link;
        fwrite($link_file, $txt);
        fclose($link_file);
        return view('home', compact('songlist','lsonglist', 'link', 'title'));

    }


    public function filterSearch()
    {
       $p_year = $_GET['pyear'];
       $t_year = $_GET['tyear'];
       $artist_name = $_GET['aname'];
       $genre = $_GET['genre'];

       if(empty($p_year || $t_year || $artist_name))
       {
           $all = "".$genre;


           global $title;
           global $link;
           $searchsong = $all;
           $html = file_get_html("https://www.youtube.com/results?search_query=$searchsong+bangla+song");
           $i = 1;
           $songlist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $link = $a->attr['href'];
                       $link = substr($link, 9);
                       $title = $a->title;
                       $songlist[] = [
                           'title' => $title,
                           'url' => $link
                       ];
                       $i++;
                   }
               }

           }

           //For latest songs
           $html = file_get_html("https://www.youtube.com/results?search_query=Latest+Bangla+Songs");
           $i = 1;
           $lsonglist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $li = $a->attr['href'];
                       $li = substr($li, 9);
                       $tit = $a->title;
                       $tit = substr($tit, 0, 45);
                       $lsonglist[] = [
                           'tit' => $tit,
                           'li' => $li
                       ];
                       $i++;
                   }
               }

           }

//        file create for title
           $title_file = fopen("title.txt", "w") or die("Unable to open file!");
           $txt = $title;
           fwrite($title_file, $txt);
           fclose($title_file);

//        file create for link
           $link_file = fopen("link.txt", "w") or die("Unable to open file!");
           $txt = $link;
           fwrite($link_file, $txt);
           fclose($link_file);
           return view('home', compact('songlist','lsonglist', 'link', 'title'));







       }
       elseif(empty( $p_year || $t_year))
       {
           $all = "".$artist_name."+".$genre;
           global $title;
           global $link;
           $searchsong = $all;
           $html = file_get_html("https://www.youtube.com/results?search_query=$searchsong+bangla+song");
           $i = 1;
           $songlist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $link = $a->attr['href'];
                       $link = substr($link, 9);
                       $title = $a->title;
                       $songlist[] = [
                           'title' => $title,
                           'url' => $link
                       ];
                       $i++;
                   }
               }

           }

           //For latest songs
           $html = file_get_html("https://www.youtube.com/results?search_query=Latest+Bangla+Songs");
           $i = 1;
           $lsonglist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $li = $a->attr['href'];
                       $li = substr($li, 9);
                       $tit = $a->title;
                       $tit = substr($tit, 0, 45);
                       $lsonglist[] = [
                           'tit' => $tit,
                           'li' => $li
                       ];
                       $i++;
                   }
               }

           }

//        file create for title
           $title_file = fopen("title.txt", "w") or die("Unable to open file!");
           $txt = $title;
           fwrite($title_file, $txt);
           fclose($title_file);

//        file create for link
           $link_file = fopen("link.txt", "w") or die("Unable to open file!");
           $txt = $link;
           fwrite($link_file, $txt);
           fclose($link_file);
           return view('home', compact('songlist','lsonglist', 'link', 'title'));
       }
       elseif(empty($artist_name))
       {
           $all = "".$genre."+year+".$p_year."+to+".$t_year;

           global $title;
           global $link;
           $searchsong = $all;
           $html = file_get_html("https://www.youtube.com/results?search_query=$searchsong+bangla+song");
           $i = 1;
           $songlist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $link = $a->attr['href'];
                       $link = substr($link, 9);
                       $title = $a->title;
                       $songlist[] = [
                           'title' => $title,
                           'url' => $link
                       ];
                       $i++;
                   }
               }

           }

           //For latest songs
           $html = file_get_html("https://www.youtube.com/results?search_query=Latest+Bangla+Songs");
           $i = 1;
           $lsonglist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $li = $a->attr['href'];
                       $li = substr($li, 9);
                       $tit = $a->title;
                       $tit = substr($tit, 0, 45);
                       $lsonglist[] = [
                           'tit' => $tit,
                           'li' => $li
                       ];
                       $i++;
                   }
               }

           }

//        file create for title
           $title_file = fopen("title.txt", "w") or die("Unable to open file!");
           $txt = $title;
           fwrite($title_file, $txt);
           fclose($title_file);

//        file create for link
           $link_file = fopen("link.txt", "w") or die("Unable to open file!");
           $txt = $link;
           fwrite($link_file, $txt);
           fclose($link_file);
           return view('home', compact('songlist','lsonglist', 'link', 'title'));
       }
       else{
           $all = "".$artist_name."+".$genre."+year+".$p_year."+to+".$t_year;
           global $title;
           global $link;
           $searchsong = $all;
           $html = file_get_html("https://www.youtube.com/results?search_query=$searchsong+bangla+song");
           $i = 1;
           $songlist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $link = $a->attr['href'];
                       $link = substr($link, 9);
                       $title = $a->title;
                       $songlist[] = [
                           'title' => $title,
                           'url' => $link
                       ];
                       $i++;
                   }
               }

           }

           //For latest songs
           $html = file_get_html("https://www.youtube.com/results?search_query=Latest+Bangla+Songs");
           $i = 1;
           $lsonglist = array();
           foreach($html->find('div') as $elements)
           {
               foreach ($elements->find('h3') as $h) {

                   foreach ($h->find('a') as $a) {
                       if ($i > 6) {
                           break;
                       }
                       //getting song link from youtube
                       $li = $a->attr['href'];
                       $li = substr($li, 9);
                       $tit = $a->title;
                       $tit = substr($tit, 0, 45);
                       $lsonglist[] = [
                           'tit' => $tit,
                           'li' => $li
                       ];
                       $i++;
                   }
               }

           }

//        file create for title
           $title_file = fopen("title.txt", "w") or die("Unable to open file!");
           $txt = $title;
           fwrite($title_file, $txt);
           fclose($title_file);

//        file create for link
           $link_file = fopen("link.txt", "w") or die("Unable to open file!");
           $txt = $link;
           fwrite($link_file, $txt);
           fclose($link_file);
           return view('home', compact('songlist','lsonglist', 'link', 'title'));
       }

    }



}
