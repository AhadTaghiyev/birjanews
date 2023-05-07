<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Files;
use App\Partners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminYeniliklerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::where('type', 2)->get();

        return view('admin.yenilikler.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.yenilikler.create');
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
            'text_az' => 'required|min:10',
            'short_az' => 'required|min:10',
            'file' => 'required',

        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'text_az.required' => 'Az Mətni qeyd edin',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'short_az.required' => 'Az Mətni qeyd edin',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'file.required' => 'Faylı seçin',

        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['type'] = 2;

        $created_blog = Blog::create($input);

        if($request->hasFile('file')) {
            if($file = $request->file('file')){

                $name = time() . $file->getClientOriginalName();

                $file->move(public_path() . '/files/img/blog', $name);

                Files::create(['file'=>$name,'assign'=>'mainElan', 'elan_id'=>$created_blog->id]);

            }
        }

        if($request->hasFile('filegallery')) {
            if ($photos = $request->file('filegallery')) {
                $y = 1;
                foreach ($photos as $photo) {
                    $name = $y . time() . $photo->getClientOriginalName();

                    $photo->move(public_path() . '/files/img/blog/', $name);

                    Files::create(['file' => $name, 'assign' => 'elan', 'elan_id' => $created_blog->id]);
                    $y++;
                }
            }
        }

        return redirect(route('admin.yenilikler.index'));
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

        return view('admin.yenilikler.edit', compact('blog'));
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
            'text_az' => 'required|min:10',
            'short_az' => 'required|min:10',
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin (AZ)',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır (AZ)',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır (AZ)',

            'text_az.required' => 'Az Mətni qeyd edin (AZ)',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır (AZ)',

            'short_az.required' => 'Az Mətni qeyd edin (AZ)',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır (AZ)',

        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($request->hasFile('file')) {
            if ($file = $request->file('file')) {

                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/files/img/blog/', $name);

                $my_photo = Files::where('elan_id', $blog->id)->where('assign', 'mainElan')->get();

                if (file_exists(public_path() . '/files/img/blog/' . $my_photo[0]->file)) {
                    unlink(public_path() . '/files/img/blog/' . $my_photo[0]->file);
                }
                $my_photo[0]->delete();

                $photo = Files::create(['file' => $name, 'assign' => 'mainElan', 'elan_id' => $blog->id]);
            }
        }

        if($request->hasFile('filegallery')) {
            if ($request->hasFile('filegallery')) {
                if ($photos = $request->file('filegallery')) {
                    $y = 1;
                    foreach ($photos as $photo) {
                        $name = $y . time() . $photo->getClientOriginalName();

                        $photo->move(public_path() . '/files/img/blog/', $name);

                        Files::create(['file' => $name, 'assign' => 'elan', 'elan_id' => $blog->id]);

                        $y++;
                    }
                }
            }
        }

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");

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

        $file = Files::where('elan_id', $blog->id)->where('assign', 'mainElan')->get();
        $file2 = Files::where('elan_id', $blog->id)->where('assign', 'elan')->get();

        if (file_exists(public_path() . '/files/img/blog/' . $file[0]->file)) {
            unlink(public_path() . '/files/img/blog/' . $file[0]->file);
        }

        foreach ($file2 as $fileOneByOne){
            if (file_exists(public_path() . '/files/img/blog/' . $fileOneByOne->file)) {
                unlink(public_path() . '/files/img/blog/' . $fileOneByOne->file);
            }
            $fileOneByOne->delete();
        }

        $file[0]->delete();


        $blog->delete();

        return redirect()->back();
    }

    public function deletePicturepicture(Request $request){
        $id = $request->dataid;

        $file= Files::find($id);

        if(file_exists(public_path() . '/files/img/blog/' . $file->file)) {
            unlink(public_path() . '/files/img/blog/' . $file->file);
        }

        $file->delete();

        return redirect()->back();
    }}
