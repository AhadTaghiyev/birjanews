<?php

namespace App\Http\Controllers;

use App\About;
use App\AllowModel;
use App\Blog;
use App\BlogCategory;
use App\BlogComents;
use App\BlogSeven;
use App\BlogsSeo;
use App\BlogVideo;
use App\Contact;
use App\Files;
use App\GalleryCategory;
use App\GallerySeo;
use App\Instagram;
use App\Partners;
use App\Project;
use App\ProjectsSeo;
use App\Service;
use App\ServicesSeo;
use App\Slider;
use App\SpecialBlogsSeo;
use App\Subscribe;
use App\VideoBlogsSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    public function index(){

//        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $sliders = Slider::where('status', 1)->orderBy('id', 'desc')->get();
        $services = Service::where('status', 1)->where('parent', 0)->orderBy('id', 'desc')->get();
        $contact = Contact::all();
        $projects = Project::where('status', 1)->take(6)->get();
        $blogseven = BlogSeven::where('status', 1)->orderBy('imgType', 'asc')->take(7)->get();
        $blogs = Blog::where('status', 1)->orderBy('view', 'desc')->take(4)->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $videos = BlogVideo::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'home';

        return view('front.homepage', compact( 'AllowPartner', 'AllowProject', 'partners', 'pgname', 'sliders', 'contact', 'blogseven', 'services', 'projects', 'blogs','blogs2', 'videos', 'instagrams'));
    }

    public function aboutus(){

        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $services = Service::where('status', 1)->where('parent', 0)->orderBy('id', 'desc')->get();
        $contact = Contact::all();
        $projects = Project::where('status', 1)->take(6)->get();
        $gallery_photos = Files::where('status', 1)->where('assign', 'gallery')->take(9)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $about = About::all();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();
        $pgname = 'about';

        return view('front.aboutus', compact( 'AllowPartner', 'AllowProject', 'instagrams', 'blogs2', 'pgname', 'partners', 'services', 'contact', 'projects', 'gallery_photos', 'about'));
    }

    public function services(){

        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $services = Service::where('status', 1)->where('parent', 0)->orderBy('id', 'desc')->get();
        $servicesSeo = ServicesSeo::all();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $contact = Contact::all();
        $projects = Project::where('status', 1)->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();
        $pgname = 'services';

        return view('front.services', compact( 'AllowPartner', 'AllowProject','partners', 'services', 'contact', 'blogs2', 'pgname', 'instagrams', 'projects', 'servicesSeo'));
    }

    public function service(Request $request){

        $requestID =  $request->id;
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $services = Service::where('status', 1)->where('parent', 0)->orderBy('id', 'desc')->get();
        $serviceMain = Service::where('id', $requestID)->get();
        $servicesUnder = Service::where('status', 1)->where('parent', $serviceMain[0]->id)->orderBy('id', 'desc')->get();

        $contact = Contact::all();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $projects = Project::where('status', 1)->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();
        $pgname = 'services';

        return view('front.service', compact( 'AllowPartner', 'AllowProject','servicesUnder','requestID', 'partners', 'services', 'contact', 'serviceMain', 'blogs2', 'instagrams', 'projects', 'pgname'));
    }

    public function blogs(Request $request){

        $totalRecords = Blog::where('status', 1);
        $limit = 8;    //set limit

        if(isset($_GET['category']) && $_GET['category'] != ''){
            $totalRecords = $totalRecords->where('category_id', $_GET['category']);
        }

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

            $totalPage = count($totalRecords)/8;
            if($totalPage < 1){
                return redirect(route('blogs', app()->getLocale()));
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

        $blogSeo = BlogsSeo::all();
        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogsCategories = BlogCategory::where('status', 1)->where('showStatus', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'blogs';

        return view('front.blogs', compact( 'AllowPartner', 'AllowProject','pages','page', 'blogSeo', 'contact', 'blogs2', 'instagrams', 'pgname','totalRecords',  'partners', 'blogsCategories'));
    }

    public function blog(Request $request){

        $requestID =  $request->id;

        $blogMain = Blog::where('id', $requestID)->get();

        if(count($blogMain) < 1){
            return redirect(route('blogs', app()->getLocale()));
        }
        Blog::find($requestID)->update(['view'=> (($blogMain[0]->view)+1) ]);

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogsCategories = BlogCategory::where('status', 1)->where('showStatus', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $commentsForBlogs = BlogComents::where('status', 1)->where('type', 1)->where('approve_status', 1)->where('blog_id', $blogMain[0]->id)->orderBy('id', 'desc')->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();
        $pgname = 'blogs';

        return view('front.blog', compact( 'AllowPartner', 'AllowProject','commentsForBlogs','contact', 'requestID', 'blogsCategories', 'blogMain', 'blogs2', 'partners', 'instagrams', 'pgname'));
    }

    public function SpecialBlogs(Request $request){

        $totalRecords = BlogSeven::where('status', 1);
        $limit = 7;    //set limit

        if(isset($_GET['category']) && $_GET['category'] != ''){
            $totalRecords = $totalRecords->where('category_id', $_GET['category']);
        }

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

            $totalPage = count($totalRecords)/7;
            if($totalPage < 1){
                return redirect(route('SpecialBlogs', app()->getLocale()));
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

        $blogSeo = SpecialBlogsSeo::all();
        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogsCategories = BlogCategory::where('status', 1)->where('showStatus', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'blogs';

        return view('front.SpecialBlogs', compact( 'AllowPartner', 'AllowProject','pages','page', 'blogSeo', 'contact', 'blogs2', 'instagrams', 'pgname','totalRecords',  'partners', 'blogsCategories'));
    }

    public function SpecialBlog(Request $request){
        $requestID =  $request->id;

        $blogMain = BlogSeven::where('id', $requestID)->get();

        $blogsSide = BlogSeven::where('status', 1)->whereNotIn('id', [$requestID])->get();

        if(count($blogMain) < 1){
            return redirect(route('SpecialBlogs', app()->getLocale()));
        }
        BlogSeven::find($requestID)->update(['view'=> (($blogMain[0]->view)+1) ]);

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogsCategories = BlogCategory::where('status', 1)->where('showStatus', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $commentsForBlogs = BlogComents::where('status', 1)->where('type', 2)->where('approve_status', 1)->orderBy('id', 'desc')->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();
        $pgname = 'blogs';

        return view('front.SpecialBlog', compact( 'AllowPartner', 'AllowProject','blogsSide', 'commentsForBlogs','contact', 'requestID', 'blogsCategories', 'blogMain', 'blogs2', 'partners', 'instagrams', 'pgname'));
    }

    public function commentStore(Request $request){

        $rules = [
            'fullname' => 'required|max:100|min:3',
            'email'=>'required|email|max:100',
            'text' => 'required|min:3|max:600',
        ];

        $customMessages = [
            'fullname.required' => __('validation.name'),
            'fullname.max' => __('validation.name_max'),
            'fullname.min' => __('validation.name_min'),

            'email.required' => __('validation.c_email'),
            'email.email' => __('validation.c_email_email'),
            'email.max' => __('validation.c_email_max'),

            'text.required' => __('validation.c_message'),
            'text.max' => __('validation.c_message_max'),
            'text.min' => __('validation.c_message_min'),
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        $input['blog_id']=$request->blog_id;
        $input['fullname']=$request->fullname;
        $input['email']=$request->email;
        $input['phone']=$request->phone;
        $input['text']=$request->text;
        $input['type']=$request->type;
        $input['lang']=app()->getLocale();
        $input['approve_status']=0;
        $input['status']=1;



        BlogComents::create($input);

        return redirect()->back()->withInput()->with('SuccessComment', 'error on modal');

    }

    public function contact(){

        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'contact';

        return view('front.contact', compact( 'AllowPartner', 'AllowProject','contact', 'partners', 'blogs2', 'instagrams', 'pgname'));
    }

    public function projects(Request $request){

        $totalRecords = Project::where('status', 1);
        $limit = 9;    //set limit

        if(isset($_GET['category']) && $_GET['category'] != ''){
            $totalRecords = $totalRecords->where('category_id', $_GET['category']);
        }
        $totalRecordsAll = $totalRecords->count();
        $pages =  ceil($totalRecordsAll / $limit); //total pagination pages

        if(isset($_GET['page']) && $_GET['page'] != 1){
            //==================If page was changed====================
            if($_GET['page'] ==1)
            {
                $offset = 0;
            }else{
                $offset = ($_GET['page']-1) * $limit;
            }

            $totalRecords = $totalRecords->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();

        }else{
            $totalRecords = $totalRecords->limit($limit)->orderBy('id', 'desc')->get();
        }


        if(isset($_GET["page"])){

            $totalPage = count($totalRecords)/9;
            if($totalPage < 1){
                return redirect(route('projects', app()->getLocale()));
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


        $projectSeo = ProjectsSeo::all();
        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $serviceCategories = Service::where('status', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'projects';

        return view('front.projects', compact( 'AllowPartner', 'AllowProject','page', 'pages', 'projectSeo','instagrams', 'serviceCategories','partners', 'totalRecords', 'contact', 'blogs2', 'pgname'));
    }

    public function project(Request $request){


        $requestID =  $request->id;
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $services = Service::where('status', 1)->orderBy('id', 'desc')->get();
        $projectMain = Project::where('id', $requestID)->get();

        $contact = Contact::all();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'projects';

        return view('front.project', compact( 'AllowPartner', 'AllowProject', 'requestID', 'partners', 'services', 'projectMain', 'contact', 'blogs2', 'instagrams', 'pgname'));
    }

    public function gallery(Request $request){

        $totalRecords = Files::where('status', 1)->where('assign', 'gallery');
        $limit = 9;    //set limit

        if(isset($_GET['category']) && $_GET['category'] != ''){
            $totalRecords = $totalRecords->where('category_id', $_GET['category']);
        }
        $totalRecordsAll = $totalRecords->count();
        $pages =  ceil($totalRecordsAll / $limit); //total pagination pages

        if(isset($_GET['page']) && $_GET['page'] != 1){
            //==================If page was changed====================
            if($_GET['page'] ==1)
            {
                $offset = 0;
            }else{
                $offset = ($_GET['page']-1) * $limit;
            }

            $totalRecords = $totalRecords->offset($offset)->limit($limit)->orderBy('id', 'desc')->get();

        }else{
            $totalRecords = $totalRecords->limit($limit)->orderBy('id', 'desc')->get();
        }


        if(isset($_GET["page"])){

            $totalPage = count($totalRecords)/9;
            if($totalPage < 1){
                return redirect(route('gallery', app()->getLocale()));
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

        $gallerySeo = GallerySeo::all();
        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $galleryCategories = GalleryCategory::where('status', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'gallery';

        return view('front.gallery', compact( 'AllowPartner', 'AllowProject','totalRecords', 'gallerySeo', 'contact', 'partners', 'galleryCategories', 'blogs2', 'instagrams', 'pgname', 'pages', 'page'));
    }

    public function videoblogs(Request $request){
        $totalRecords = BlogVideo::where('status', 1);
        $limit = 9;    //set limit

        if(isset($_GET['category']) && $_GET['category'] != ''){
            $totalRecords = $totalRecords->where('category_id', $_GET['category']);
        }

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

            $totalPage = count($totalRecords)/9;
            if($totalPage < 1){
                return redirect(route('blogs', app()->getLocale()));
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

        $blogSeo = VideoBlogsSeo::all();
        $contact = Contact::all();
        $partners = Partners::where('status', 1)->orderBy('id', 'desc')->get();
        $blogsCategories = BlogCategory::where('status', 1)->where('showStatus', 1)->orderBy('id', 'desc')->get();
        $blogs2 = Blog::where('status', 1)->orderBy('view', 'desc')->take(2)->get();
        $instagrams = Instagram::where('status', 1)->orderBy('id', 'desc')->take(6)->get();
        $AllowPartner = AllowModel::where('model_name', 'Partner')->get();
        $AllowProject = AllowModel::where('model_name', 'Projects')->get();

        $pgname = 'blogs';

        return view('front.videoBlogs', compact( 'AllowPartner', 'AllowProject','pages','page', 'blogSeo', 'contact', 'blogs2', 'instagrams', 'pgname','totalRecords',  'partners', 'blogsCategories'));
    }

    public function videoblog(Request $request){

    }




    public function notfound(){

        $contact = Contact::all();

        return view('front.notfound', compact( 'contact'));
    }

    public function subscribe(Request $request){

        $rules = [
            'emailSubsc'=>'required|email',
        ];

        $customMessages = [
            'emailSubsc.required' => 'Email-ınızı qeyd edin',
            'emailSubsc.email' => 'Email-ınızı düzgün qeyd edin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerrorSubscribe', 'error on modal');
        }
        $input = $request->all();

        $getExistEmail = Subscribe::where('email', $request->emailSubsc)->get();
        if(count($getExistEmail)>0){
            if($getExistEmail[0]->status == 1){
                Subscribe::where('email', $request->emailSubsc)->update(["status"=>0]);
                $valid = 'validation.unsubscribe';

            }elseif ($getExistEmail[0]->status == 0){
                Subscribe::where('email', $request->emailSubsc)->update(["status"=>1]);
                $valid = 'contact.mail_sent_subsc';
            }
        }else {
            $valid = 'contact.mail_sent_subsc';
            $input["email"] = $request->emailSubsc;
            $input["status"] = 1;
            Subscribe::create($input);
        }
        return redirect(url()->previous() .'#SubscribeForm')->with('SuccessSubscribe', __($valid));
//        return redirect()->back()->withInput()->with('SuccessSubscribe', 'error on modal');
    }
}

