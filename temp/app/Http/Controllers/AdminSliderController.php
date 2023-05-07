<?php

namespace App\Http\Controllers;

use App\Files;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.slider.index', compact('sliders'));
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

            $file->move(public_path() . '/files/img/sl', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'slider', 'alt_tag'=>$request->alt_tag]);

            $input['file_id'] = $photo->id;
        }

        Slider::create($input);

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
        $slider = Slider::findOrFail($id);

        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/sl', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'slider', 'alt_tag'=>$request->alt_tag]);

            $my_photo = Files::find($slider->file_id);

            if(file_exists(public_path() . '/files/img/sl/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/sl/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['file_id'] = $photo->id;
        }else{
            $my_photo_alt = Files::find($slider->file_id);
            $my_photo_alt->update(['alt_tag'=>$request->alt_tag]);
        }

        $slider->update($input);

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
        $slider = Slider::findOrFail($id);

        $file = Files::findOrFail($slider->file_id);

        if(file_exists(public_path() . '/files/img/sl/' .$slider->photo->file)) {
            unlink(public_path() . '/files/img/sl/' . $slider->photo->file);
        }

        $file->delete();
        $slider->delete();

        return redirect()->back();
    }
}
