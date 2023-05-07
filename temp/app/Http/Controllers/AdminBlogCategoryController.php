<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogSeven;
use App\BlogVideo;
use App\Files;
use App\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = BlogCategory::all();

        return view('admin.blog.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name_az' => 'required|max:100|min:3',
            'name_ru' => 'required|max:100|min:3',
            'name_en' => 'required|max:100|min:3',
        ];

        $customMessages = [
            'name_az.required' => 'Az Başlıq adını qeyd edin',
            'name_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_ru.required' => 'Rus Başlıq adını qeyd edin',
            'name_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_en.required' => 'Eng Başlıq adını qeyd edin',
            'name_en.max' => 'Eng Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_en.min' => 'Eng Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        BlogCategory::create($input);

        return redirect(route('admin.blog.category.index'));
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
        //
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
        $category = BlogCategory::find($id);

        $rules = [
            'name_az' => 'required|max:100|min:3',
            'name_ru' => 'required|max:100|min:3',
            'name_en' => 'required|max:100|min:3',
        ];

        $customMessages = [
            'name_az.required' => 'Az Başlıq adını qeyd edin',
            'name_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_ru.required' => 'Rus Başlıq adını qeyd edin',
            'name_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_en.required' => 'Eng Başlıq adını qeyd edin',
            'name_en.max' => 'Eng Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_en.min' => 'Eng Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        $category->update($input);

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
        $category = BlogCategory::findOrFail($id);
        $checkforIdSimple = Blog::where('category_id', $category->id)->get();
        $checkforIdVideo = BlogVideo::where('category_id', $category->id)->get();
        $checkforIdSeven = BlogSeven::where('category_id', $category->id)->get();

        if(count($checkforIdSimple) == 0 && count($checkforIdVideo) == 0 && count($checkforIdSeven) == 0){
            $category->delete();

            return redirect(route('admin.blog.category.index'));
        }else{

            return redirect()->back()->with('errCanNot', 'Kateqoriya istifadə olunur');
        }

    }
}
