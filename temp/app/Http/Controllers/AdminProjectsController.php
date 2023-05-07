<?php

namespace App\Http\Controllers;

use App\AllowModel;
use App\Files;
use App\Project;
use App\ProjectsSeo;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\File;

class AdminProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $projectsSeo = ProjectsSeo::all();
        $projectsStatus = AllowModel::where('model_name', 'Projects')->get();

        return view('admin.projects.index', compact('projects', 'projectsSeo', 'projectsStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::where('status', 1)->get();

        return view('admin.projects.create', compact('services'));
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
            'category_id' => 'required',
            'filename' => 'required',
            'project_date' => 'required',
            'filename.*' => 'mimes:jpg,jpeg,png',
            'documentname.*' => 'mimes:xlsx,xlsm,xls,doc,docx,txt,pdf',
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_ru.required' => 'Rus Başlıq adını qeyd edin',
            'title_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_en.required' => 'Rus Başlıq adını qeyd edin',
            'title_en.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_en.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'text_az.required' => 'Az Mətni qeyd edin',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_ru.required' => 'Rus Mətni qeyd edin',
            'text_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_en.required' => 'Rus Mətni qeyd edin',
            'text_en.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'short_az.required' => 'Az Mətni qeyd edin',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_ru.required' => 'Rus Mətni qeyd edin',
            'short_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_en.required' => 'Rus Mətni qeyd edin',
            'short_en.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'project_date.required' => 'Tarixi seçin',
            'category_id.required' => 'Xidməti seçin',
            'filename.required' => 'Faylı seçin',
            'filename.*.mimes' => 'Düzgün formatda faylı seçin',
            'documentname.*.mimes' => 'Düzgün formatda faylı seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_en, 0, 120, "utf-8");

        $project = Project::create($input);

        if ($photos = $request->file('filename')) {
            $y = 1;
            foreach ($photos as $photo) {
                $name = $y . time() . $photo->getClientOriginalName();

                $photo->move(public_path() . '/files/img/projects/', $name);

                Files::create(['file' => $name, 'assign' => 'project-photo', 'project_id' => $project->id]);
                $y++;
            }
        }

        if ($files = $request->file('documentname')) {
            $x= 1;
            foreach ($files as $file) {
                $name =  $x . time() . $file->getClientOriginalName();

                $file->move(public_path() . '/files/img/projects/', $name);

                Files::create(['file' => $name, 'assign' => 'project-doc', 'project_id' => $project->id]);
                $x++;
            }
        }

        return redirect(route('admin.projects.index'));
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
        $project = Project::find($id);
        $services = Service::where('status', 1)->get();

        return view('admin.projects.edit', compact('project', 'services'));
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

        $project = Project::find($id);

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
            'category_id' => 'required',
            'project_date' => 'required',
        ];

        $customMessages = [
            'title_az.required' => 'Az Başlıq adını qeyd edin',
            'title_az.max' => 'Az Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_az.min' => 'Az Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_ru.required' => 'Rus Başlıq adını qeyd edin',
            'title_ru.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_ru.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'title_en.required' => 'Rus Başlıq adını qeyd edin',
            'title_en.max' => 'Rus Başlıq adı ən çox 100 simvoldan ibarət olmalıdır',
            'title_en.min' => 'Rus Başlıq adı ən azı 3 simvoldan ibarət olmalıdır',

            'text_az.required' => 'Az Mətni qeyd edin',
            'text_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_ru.required' => 'Rus Mətni qeyd edin',
            'text_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'text_en.required' => 'Rus Mətni qeyd edin',
            'text_en.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'short_az.required' => 'Az Mətni qeyd edin',
            'short_az.min' => 'Az Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_ru.required' => 'Rus Mətni qeyd edin',
            'short_ru.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',
            'short_en.required' => 'Rus Mətni qeyd edin',
            'short_en.min' => 'Rus Mətn ən azı 10 simvoldan ibarət olmalıdır',

            'category_id.required' => 'Xidməti seçin',
            'project_date.required' => 'Tarixi seçin',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }

        $input = $request->all();

        $input['short_az'] = mb_substr($request->short_az, 0, 120, "utf-8");
        $input['short_ru'] = mb_substr($request->short_ru, 0, 120, "utf-8");
        $input['short_en'] = mb_substr($request->short_en, 0, 120, "utf-8");

        $project->update($input);

        if ($photos = $request->file('filename')) {
            $x= 1;
            foreach ($photos as $photo) {
                $name = $x.time() . $photo->getClientOriginalName();

                $photo->move(public_path() . '/files/img/projects/', $name);

                Files::create(['file' => $name, 'assign' => 'project-photo', 'project_id' => $project->id]);
                $x++;
            }
        }

        if ($files = $request->file('documentname')) {

            $projectFiles = Files::where('status', 1)->where('project_id', $project->id)->where('assign', 'project-doc')->get();
            $y= 1;


            foreach ($files as $file) {
                $name = $y.time() . $file->getClientOriginalName();

                $file->move(public_path() . '/files/img/projects/', $name);

                Files::create(['file' => $name, 'assign' => 'project-doc', 'project_id' => $project->id]);
                $y++;
            }
        }

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
        $project = Project::findOrFail($id);

        $files = Files::where('project_id', $id)->get();

        foreach ($files as $file) {
            if(file_exists(public_path() . '/files/img/projects/' . $file->file)) {
                unlink(public_path() . '/files/img/projects/' . $file->file);
            }
        }

        $project->delete();
        $files->each->delete();

        return redirect(route('admin.projects.index'));
    }

    public function deletePicturepicture(Request $request){
        $id = $request->dataid;

        $file= Files::find($id);

        if(file_exists(public_path() . '/files/img/projects/' . $file->file)) {
            unlink(public_path() . '/files/img/projects/' . $file->file);
        }

        $file->delete();

        return redirect()->back();
    }

    public function deleteFile(Request $request){
        $id = $request->dataid;

        $file= Files::find($id);

        if(file_exists(public_path() . '/files/img/projects/' . $file->file)) {
            unlink(public_path() . '/files/img/projects/' . $file->file);
        }

        $file->delete();

        return redirect()->back();
    }
}
