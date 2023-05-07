<?php

namespace App\Http\Controllers;

use App\About;
use App\Banner;
use App\Blog;
use App\Contact;
use App\Partners;
use App\Slider;

use App\Tags;
use App\UniqueIP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function index(){

        $pgname = 'home';
        $sliders = Slider::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogs8 = Blog::where('status', 1)->orderBy('view', 'desc')->where('type', 1)->take(8)->get();
        $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->where('type', 1)->take(8)->get();
        $birjaYeniliklers = Blog::where('status', 1)->orderBy('id', 'desc')->where('type', 2)->take(6)->get();
        $contact = Contact::all();

        return view('front.homepage', compact( 'pgname', 'sliders', 'partners', 'blogs8', 'blogs', 'birjaYeniliklers', 'contact', 'banner'));
    }

    public function aboutus(){

        $about = About::all();
        $contact = Contact::all();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $pgname = 'about';

        return view('front.aboutus', compact( 'pgname', 'partners', 'about', 'contact', 'banner'));
    }

    public function contact(){

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();

        $pgname = 'contact';

        return view('front.contact', compact( 'pgname', 'contact', 'partners', 'banner'));
    }

    public function herracElanlar(Request $request){

        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $contact = Contact::all();
        $totalRecords = Blog::where('status', 1)->where('type', 1);
        $limit = 10;    //set limit

        if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
            $string = $request->keyword;

            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            $elan_id_list = [];
            foreach ($searchValues as $value) {
                $str = str_replace("I","ı",$value);
                $str = mb_strtolower($str, 'UTF-8');
                $find_tags = Tags::where('name', $str)->get();
                foreach ($find_tags as $founded_tag){
                    array_push($elan_id_list, $founded_tag->elan_id);
                }
            }
            $unique_array = array_unique($elan_id_list);

            $totalRecords = $totalRecords->where(function ($q) use ($unique_array) {
                $q->orWhereIn('id', $unique_array);
            });

        }
        $totalRecordsAll = $totalRecords->count();

        $pages =  ceil($totalRecordsAll / $limit); //total pagination pages

        if(isset($_GET['page']) && $_GET['page'] != 1){
            //==================If page was changed====================
            if($_GET['page'] ==1)
            {
                $offset = 0;
            }else{
                $offset = ($_GET['page']-1) * $limit ;
            }

            $totalRecords = $totalRecords->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();

        }else{
            $totalRecords = $totalRecords->limit($limit)->orderBy('id', 'desc')->get();
        }

        if(isset($_GET["page"])){

            $totalPage = count($totalRecords)/$limit;
            if($totalPage < 1){
                return redirect(route('herracElanlar'));
            }
        }

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }

        if ($page > $pages) {
            $page = $pages;
        }
        if ($page < 1) {
            $page = 1;
        }

        $pgname = 'elanlar';

        return view('front.elanlar', compact('pgname', 'partners', 'totalRecords', 'page', 'pages', 'contact', 'banner'));
    }

    public function birjaYenilikler(Request $request){

        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $contact = Contact::all();
        $totalRecords = Blog::where('status', 1)->where('type', 2);
        $limit = 10;    //set limit

        if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
            $string = $request->keyword;
            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            $totalRecords = $totalRecords->where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('title_'.app()->getLocale(), 'like', "%{$value}%");
                }
            });
        }
        $totalRecordsAll = $totalRecords->count();

        $pages =  ceil($totalRecordsAll / $limit); //total pagination pages

        if(isset($_GET['page']) && $_GET['page'] != 1){
            //==================If page was changed====================
            if($_GET['page'] ==1)
            {
                $offset = 0;
            }else{
                $offset = ($_GET['page']-1) * $limit ;
            }

            $totalRecords = $totalRecords->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();

        }else{
            $totalRecords = $totalRecords->limit($limit)->orderBy('id', 'desc')->get();
        }


        if(isset($_GET["page"])){

            $totalPage = count($totalRecords)/$limit;
            if($totalPage < 1){
                return redirect(route('herracElanlar'));
            }
        }



        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }

        if ($page > $pages) {
            $page = $pages;
        }
        if ($page < 1) {
            $page = 1;
        }


        $pgname = 'elanlar';

        return view('front.yenilikler', compact('pgname', 'partners', 'totalRecords', 'page', 'pages', 'contact', 'banner'));

    }

    public function elanlar_by_herrac(Request $request){


        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $selectedPartner = Partners::where('status', 1)->where('id', $request->id)->get();
        $contact = Contact::all();
        $totalRecords = Blog::where('status', 1)->where('partner_id', $request->id);
        $limit = 10;    //set limit

        if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
            $string = $request->keyword;
            $searchValues = preg_split('/\s+/', $string, -1, PREG_SPLIT_NO_EMPTY);

            $totalRecords = $totalRecords->where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('title_'.app()->getLocale(), 'like', "%{$value}%");
                }
            });
        }
        $totalRecordsAll = $totalRecords->count();

        $pages =  ceil($totalRecordsAll / $limit); //total pagination pages

        if(isset($_GET['page']) && $_GET['page'] != 1){
            //==================If page was changed====================
            if($_GET['page'] ==1)
            {
                $offset = 0;
            }else{
                $offset = ($_GET['page']-1) * $limit ;
            }

            $totalRecords = $totalRecords->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();

        }else{
            $totalRecords = $totalRecords->limit($limit)->orderBy('id', 'desc')->get();
        }


        if(isset($_GET["page"])){

            $totalPage = count($totalRecords)/$limit;
            if($totalPage < 1){
                return redirect(route('herracElanlar'));
            }
        }



        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = (int) $_GET['page'];
        } else {
            $page = 1;
        }

        if ($page > $pages) {
            $page = $pages;
        }
        if ($page < 1) {
            $page = 1;
        }


        $pgname = 'elanlar';

        return view('front.elanlarByHerrac', compact('pgname', 'partners', 'totalRecords', 'page', 'pages', 'contact', 'selectedPartner', 'banner'));

    }

    public function elan(Request $request){

        $requestID =  $request->id;

        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();
        $contact = Contact::all();
        $blogMain = Blog::where('id', $requestID)->first();

        if($blogMain->type == 1){
            $pgname = 'herrac';
            $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->where('type', 1)->take(4)->get();
        }else{
            $pgname = 'yenilik';
            $blogs = Blog::where('status', 1)->orderBy('id', 'desc')->where('type', 2)->take(4)->get();
        }

        $view = $blogMain->view + 1;

        $visitorIP = $request->ip();
        $uniquedata = UniqueIP::where('ip', $visitorIP)->where('elan_id', $requestID);

        if($uniquedata->count() == 0){

            $blogMain->update(['view'=>$view]);

            UniqueIP::create(['elan_id' => $requestID, 'ip' => $visitorIP, 'view' => 1]);
        }else{
            $maindata = $uniquedata->first();
            $viewCount = $maindata->view + 1;

            $maindata->update(['view'=>$viewCount]);
        }

        return view('front.elan', compact( 'pgname', 'blogMain', 'partners', 'requestID', 'contact', 'blogs', 'banner'));
    }

    public function herracTeshkilatlari(){

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();


        return view('front.teshkilatlar', compact( 'contact', 'partners', 'banner'));
    }

    public function notfound(){

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $banner = Banner::where('status', 1)->orderBy('id', 'desc')->take(1)->get();

        return view('front.notfound', compact( 'contact', 'partners', 'banner'));
    }

}

