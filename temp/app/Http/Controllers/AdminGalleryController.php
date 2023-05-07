<?php

namespace App\Http\Controllers;

use App\Files;
use App\GalleryCategory;
use App\GallerySeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Files::where('assign', 'gallery')->get();
        $categories= GalleryCategory::where('status', 1)->orderBy('id', 'DESC')->get();
        $gallerySeo = GallerySeo::all();

        return view('admin.gallery.index', compact('files', 'categories', 'gallerySeo'));
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
     * @param \Illuminate\Http\Request $request
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

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $files) {
                $name = time() . $files->getClientOriginalName();
                $files->move(public_path() . '/files/img/gallery/', $name);
                Files::create(['file' => $name, 'name_az'=>$request->name_az, 'name_ru'=>$request->name_ru, 'name_en'=>$request->name_en, 'assign' => 'gallery', 'status' => 1,  'category_id'=>$request->category_id, 'alt_tag' => $request->alt_tag]);
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $myFile= Files::findOrFail($id);
        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/gallery/', $name);

            if(file_exists(public_path() . '/files/img/gallery/' . $myFile->file)) {
                unlink(public_path() . '/files/img/gallery/' . $myFile->file);
            }

            $myFile->delete();

            $photo = Files::create(['file' => $name, 'name_az'=>$request->name_az, 'name_ru'=>$request->name_ru, 'name_en'=>$request->name_en, 'assign' => 'gallery', 'status' => $request->status]);

            $input['file_id'] = $photo->id;

            $newFile = Files::find($input['file_id']);
        }else{
            $newFile = Files::findOrFail($id);
        }

        $newFile->update(['category_id'=>$request->category_id, 'name_az'=>$request->name_az, 'name_ru'=>$request->name_ru,'name_en'=>$request->name_en, 'status'=>$request->status, 'alt_tag' => $request->alt_tag]);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Files::findOrFail($id);

        if (file_exists(public_path() . '/files/img/gallery/' . $file->file)) {
            unlink(public_path() . "/files/img/gallery/" . $file->file);
        }
        $file->delete();

        return redirect()->back();
    }
}
