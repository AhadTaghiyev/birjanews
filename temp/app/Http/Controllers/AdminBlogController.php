<?php

namespace App\Http\Controllers;

use App\Author;
use App\Blog;
use App\BlogCategory;
use App\BlogsSeo;
use App\Files;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        $blogsSeo = BlogsSeo::all();

        return view('admin.blog.index', compact('blogs', 'blogsSeo'));
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

        return view('admin.blog.create', compact('usersNicks', 'categories'));
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
            'text_az' => 'required|min:10',
            'text_ru' => 'required|min:10',
            'text_en' => 'required|min:10',
            'short_az' => 'required|min:10',
            'short_ru' => 'required|min:10',
            'short_en' => 'required|min:10',
            'file' => 'required',
            'main_file_id' => 'required',
            'category_id' => 'required',
            'created_by' => 'required'
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

            'text_az.required' => 'Az Mətni qeyd edin',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_ru.required' => 'Rus Mətni qeyd edin',
            'text_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_en.required' => 'Eng Mətni qeyd edin',
            'text_en.min' => 'Eng Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'short_az.required' => 'Az Mətni qeyd edin',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_ru.required' => 'Rus Mətni qeyd edin',
            'short_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_en.required' => 'Eng Mətni qeyd edin',
            'short_en.min' => 'Eng Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'file.required' => 'Faylı seçin',
            'created_by.required' => 'Bloq yaradanı seçin',
            'main_file_id.required' => 'Bloqın içindəki şəkili seçin',
            'category_id.required' => 'Kateqoriyanı seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'blog', 'alt_tag'=>$request->alt_tag]);

            $input['file_id'] = $photo->id;
        }

        if($file = $request->file('main_file_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'blog', 'alt_tag'=>$request->alt_taginside]);

            $input['main_file_id'] = $photo->id;
        }

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_en, 0, 120, "utf-8");

        Blog::create($input);

        return redirect(route('admin.blog.index'));
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
        $blog = Blog::find($id);
        $usersNicks = Author::where('status', 1)->get();
        $categories = BlogCategory::where('status', 1)->get();

        return view('admin.blog.edit', compact('blog', 'usersNicks', 'categories'));
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
        $blog = Blog::findOrFail($id);

        $rules = [
            'title_az' => 'required|max:100|min:3',
            'title_ru' => 'required|max:100|min:3',
            'title_en' => 'required|max:100|min:3',
            'text_az' => 'required|min:10',
            'text_ru' => 'required|min:10',
            'text_en' => 'required|min:10',
            'short_az' => 'required|min:10',
            'short_ru' => 'required|min:10',
            'short_en' => 'required|min:10',
            'created_by' => 'required',
            'category_id' => 'required',
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin (AZ)',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır (AZ)',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır (AZ)',

            'title_ru.required' => 'Rus Başlıq adını qeyd edin (RU)',
            'title_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır (RU)',
            'title_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır (RU)',

            'title_en.required' => 'Eng Başlıq adını qeyd edin (Eng)',
            'title_en.max' => 'Eng Başlıq adı ən çox 100 simvoldan ibarət olmalıdır (Eng)',
            'title_en.min' => 'Eng Başlıq adı ən azı 3 simvoldan ibarət olmalıdır (Eng)',

            'text_az.required' => 'Az Mətni qeyd edin (AZ)',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır (AZ)',

            'text_ru.required' => 'Rus Mətni qeyd edin (RU)',
            'text_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır (RU)',

            'text_en.required' => 'Eng Mətni qeyd edin (Eng)',
            'text_en.min' => 'Eng Mətn ən azı 10 simvoldan ibarət olmalıdır (Eng)',

            'short_az.required' => 'Az Mətni qeyd edin (AZ)',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır (AZ)',

            'short_ru.required' => 'Rus Mətni qeyd edin (RU)',
            'short_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır (RU)',

            'short_en.required' => 'Eng Mətni qeyd edin (RU)',
            'short_en.min' => 'Eng Mətn ən azı 10 simvoldan ibarət olmalıdır (Eng)',

            'created_by.required' => 'Bloq yaradanı seçin',
            'category_id.required' => 'Kateqoriyanı seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'blog', 'alt_tag'=>$request->alt_tag]);

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

        if($file = $request->file('main_file_id')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/blog/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'blog', 'alt_tag'=>$request->alt_taginside]);

            $my_photo = Files::find($blog->main_file_id );

            if(file_exists(public_path() . '/files/img/blog/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/blog/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['main_file_id'] = $photo->id;
        }else{
            $my_photo_alt = Files::find($blog->main_file_id);
            $my_photo_alt->update(['alt_tag'=>$request->alt_taginside]);
        }

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_en, 0, 120, "utf-8");

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
        $blog = Blog::findOrFail($id);

        $file = Files::findOrFail($blog->file_id);
        $file2 = Files::findOrFail($blog->main_file_id);

        if(file_exists(public_path() . '/files/img/blog/' .$blog->photo->file)) {
            unlink(public_path() . '/files/img/blog/' . $blog->photo->file);
        }

        if(file_exists(public_path() . '/files/img/blog/' .$blog->photo_main->file)) {
            unlink(public_path() . '/files/img/blog/' . $blog->photo_main->file);
        }

        $file->delete();
        $file2->delete();

        $blog->delete();

        return redirect()->back();
    }
}
