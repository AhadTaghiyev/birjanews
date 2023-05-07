<?php

namespace App\Http\Controllers;

use App\Files;
use App\Instagram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminInstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Instagram::all();

        return view('admin.insta.index', compact('files'));
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
            'file' => 'required',
        ];

        $customMessages = [
            'file.required' => 'Faylı seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('errorOnStore', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/insta', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'insta']);

            $input['file_id'] = $photo->id;
        }

        Instagram::create($input);

        return redirect(route('admin.instagram.index'));
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
        $insta = Instagram::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/insta/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'insta']);

            $my_photo = Files::find($insta->file_id);

            if(file_exists(public_path() . '/files/img/insta/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/insta/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['file_id'] = $photo->id;
        }

        $insta->update($input);

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
        $insta = Instagram::findOrFail($id);

        if (file_exists(public_path() . '/files/img/insta/' . $insta->photo->file)) {
            unlink(public_path() . "/files/img/insta/" . $insta->photo->file);
        }
        $insta->delete();

        return redirect()->back();
    }
}
