<?php

namespace App\Http\Controllers;

use App\Files;
use App\Project;
use App\Service;
use App\ServicesSeo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceSeo = ServicesSeo::all();
        $services = Service::all();

        return view('admin.services.index', compact('services', 'serviceSeo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicesEx = Service::where('status', 1)->get();

        return view('admin.services.create', compact('servicesEx'));
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
            'file' => 'required'
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
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/services', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'services', 'alt_tag'=>$request->alt_tag]);

            $input['file_id'] = $photo->id;
        }

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_ru, 0, 120, "utf-8");

        Service::create($input);

        return redirect(route('admin.services.index'));
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
        $service = Service::find($id);
        $servicesEx = Service::where('status', 1)->get();

        return view('admin.services.edit', compact('service', 'servicesEx'));
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
        $service = Service::findOrFail($id);

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
            'short_en.required' => 'Eng Mətni qeyd edin (Eng)',
            'short_en.min' => 'Eng Mətn ən azı 10 simvoldan ibarət olmalıdır (Eng)',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        if($file = $request->file('file')){

            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/services', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'services', 'alt_tag'=>$request->alt_tag]);

            $my_photo = Files::find($service->file_id);

            if(file_exists(public_path() . '/files/img/services/' . $my_photo->file)) {
                unlink(public_path() . '/files/img/services/' . $my_photo->file);
            }

            $my_photo->delete();

            $input['file_id'] = $photo->id;
        }else{
            $my_photo_alt = Files::find($service->file_id);
            $my_photo_alt->update(['alt_tag'=>$request->alt_tag]);
        }

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_ru, 0, 120, "utf-8");

        $service->update($input);

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
        $service = Service::findOrFail($id);
        $services = Service::where('status', 1)->where('parent', $id)->get();
        $projects = Project::where('category_id', $id)->get();

        if(coutn($services)>0 || count($projects)>0){
            return redirect()->back()->with('errCanNot', 'Kateqoriya istifadə olunur');
        }else{
            $file = Files::findOrFail($service->file_id);

            if(file_exists(public_path() . '/files/img/services/' .$service->photo->file)) {
                unlink(public_path() . '/files/img/services/' . $service->photo->file);
            }

            $file->delete();
            $service->delete();

            return redirect()->back();
        }

    }
}
