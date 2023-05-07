<?php

namespace App\Http\Controllers;


use App\Banner;
use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();

        return view('admin.banner.index', compact('banners'));
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
            'file' => 'required'
        ];

        $customMessages = [
            'file.required' => 'Şəkil mütləqdir',

        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('SliderErrorCreate', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/banner', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'banner']);

            $input['file_id'] = $photo->id;
        }

        Banner::create($input);

        return redirect()->back();
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
        $banner = Banner::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/banner', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'banner']);

            $my_photo = Files::find($banner->file_id);

            if(file_exists(public_path() . '/files/img/banner/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/banner/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['file_id'] = $photo->id;
        }

        $banner->update($input);

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
        $banner = Banner::findOrFail($id);

        $file = Files::findOrFail($banner->file_id);

        if(file_exists(public_path() . '/files/img/banner/' .$banner->photo->file)) {
            unlink(public_path() . '/files/img/banner/' . $banner->photo->file);
        }

        $file->delete();
        $banner->delete();

        return redirect()->back();
    }
}
