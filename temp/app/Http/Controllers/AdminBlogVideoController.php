<?php

namespace App\Http\Controllers;

use App\Author;
use App\BlogCategory;
use App\BlogVideo;
use App\Files;
use App\User;
use App\VideoBlogsSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBlogVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = BlogVideo::all();
        $blogsSeo = VideoBlogsSeo::all();

        return view('admin.blog.videoBlog.index', compact('blogs', 'blogsSeo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usersNicks = Author::where('status', 1)->get();
        $categories = BlogCategory::where('status', 1)->get();

        return view('admin.blog.videoBlog.create', compact('usersNicks', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title_az' => 'required|max:100|min:3',
            'title_ru' => 'required|max:100|min:3',
            'title_en' => 'required|max:100|min:3',
            'file' => 'required',
            'created_by' => 'required',
            'category_id' => 'required',
            'url' => 'required',
            'created_date' => 'required'
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_ru.required' => 'Rus Başlıq adını qeyd edin',
            'title_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_en.required' => 'Eng Başlıq adını qeyd edin',
            'title_en.max' => 'Eng Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_en.min' => 'Eng Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'file.required' => 'Faylı seçin',
            'created_by.required' => 'Bloq yaradanı seçin',
            'url.required' => 'URL daxil edin',
            'category_id.required' => 'Kateqoriyanı Seçin',
            'created_date.required' => 'Tarixi Seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'VideoBlog', 'alt_tag'=>$request->alt_tag]);

            $input['file_id'] = $photo->id;
        }

        BlogVideo::create($input);

        return redirect(route('admin.blog.videoBlog.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = BlogVideo::find($id);
        $usersNicks = Author::where('status', 1)->get();
        $categories = BlogCategory::where('status', 1)->get();

        return view('admin.blog.videoBlog.edit', compact('blog', 'usersNicks', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = BlogVideo::findOrFail($id);

        $rules = [
            'title_az' => 'required|max:100|min:3',
            'title_ru' => 'required|max:100|min:3',
            'title_en' => 'required|max:100|min:3',
            'created_by' => 'required',
            'category_id' => 'required',
            'url' => 'required',
            'created_date' => 'required'
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_ru.required' => 'Rus Başlıq adını qeyd edin',
            'title_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_en.required' => 'Eng Başlıq adını qeyd edin',
            'title_en.max' => 'Eng Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_en.min' => 'Eng Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'created_by.required' => 'Bloq yaradanı seçin',
            'url.required' => 'URL daxil edin',
            'category_id.required' => 'Kateqoriyanı seçin',
            'created_date.required' => 'Tarixi seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'VideoBlog', 'alt_tag'=>$request->alt_tag]);

            $my_photo = Files::find($blog->file_id);

            if(file_exists(public_path() . '/files/img/blog/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/blog/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['file_id'] = $photo->id;
        }else{
            $my_photo_alt = Files::find($blog->file_id);
            $my_photo_alt->update(['alt_tag'=>$request->alt_tag]);
        }

        $blog->update($input);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = BlogVideo::findOrFail($id);

        $file = Files::findOrFail($blog->file_id);

        if(file_exists(public_path() . '/files/img/blog/' .$blog->photo->file)) {
            unlink(public_path() . '/files/img/blog/' . $blog->photo->file);
        }

        $file->delete();

        $blog->delete();

        return redirect()->back();
    }
}
