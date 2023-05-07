<?php

namespace App\Http\Controllers;

use App\Author;
use App\Blog;
use App\BlogSeven;
use App\BlogVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return view('admin.author.index',compact('authors'));
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
            'name_az.required' => 'Az Müəllif adını qeyd edin',
            'name_az.max' => 'Az Müəllif adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_az.min' => 'Az Müəllif adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_ru.required' => 'Rus Müəllif adını qeyd edin',
            'name_ru.max' => 'Rus Müəllif adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_ru.min' => 'Rus Müəllif adı ən azı 3 simvoldan ibarət olmalıdır',

            'name_en.required' => 'Eng Müəllif adını qeyd edin',
            'name_en.max' => 'Eng Müəllif adı ən çox 100 simvoldan ibarət olmalıdır',
            'name_en.min' => 'Eng Müəllif adı ən azı 3 simvoldan ibarət olmalıdır',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        Author::create($input);

        return redirect(route('admin.author.index'));
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
        $category = Author::find($id);

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
        $author = Author::findOrFail($id);
        $checkforIdSimple = Blog::where('created_by', $author->id)->get();
        $checkforIdVideo = BlogVideo::where('created_by', $author->id)->get();
        $checkforIdSeven = BlogSeven::where('created_by', $author->id)->get();

        if(count($checkforIdSimple) == 0 && count($checkforIdVideo) == 0 && count($checkforIdSeven) == 0){
            $author->delete();

            return redirect(route('admin.author.index'));
        }else{

            return redirect()->back()->with('errCanNot', 'Müəllif istifadə olunur');
        }

    }
}
