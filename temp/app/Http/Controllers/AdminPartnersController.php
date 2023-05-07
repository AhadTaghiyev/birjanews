<?php

namespace App\Http\Controllers;

use App\AllowModel;
use App\Files;
use App\Partners;

use Illuminate\Http\Request;

class AdminPartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $partners = Partners::paginate(10);
        $partnerStatus = AllowModel::where('model_name', 'Partner')->get();

        return view('admin.partners.index', compact('partners', 'partnerStatus'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.create');
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
            'name' => 'required|string|unique:partners,name',
            'file' => 'required',
            'link'   => 'nullable|string',
        ];

        $customMessages = [
            'name.required' => 'Partnyor adı mütlərqdir.',
            'file.required' => 'Partnyor logosı mütlərqdir.',
            'name.unique'=> 'Partnyor adı artıq iştirak edilib',
            'name.string'=> 'Link düzgün daxil ediz ',
        ];

        $this->validate($request, $rules, $customMessages);

        $input = $request->all();

        if($file = $request->file('file')){

            $name = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/partners/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'parthner']);

            $input['file_id'] = $photo->id;
        }

        Partners::create($input);

        return redirect('/admin/partners');


        $input = $request->all();


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
        $partners = Partners::findOrFail($id);

        //return $complex;
        return view('admin.partners.edit', compact('partners'));
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
        $parners = Partners::findOrFail($id);

        $rules = [
            'name' => 'required|string|unique:partners,name,'.$parners->id,
            'link'   => 'nullable|string',
        ];

        $customMessages = [
            'name.required' => 'Partnyor adı mütlərqdir.',
            'unique'=> 'Partnyor adı artıq iştirak edilib',
            'string'=> 'Link düzgün daxil ediz ',
        ];

        $this->validate($request, $rules, $customMessages);

        $input = $request->all();

        if($file = $request->file('file')){
            if(file_exists(public_path() . '/files/img/partners/' . $parners->photo->file)) {
                unlink(public_path() . '/files/img/partners/' . $parners->photo->file);
            }
            $name  = time() . $file->getClientOriginalName();

            $file->move(public_path() . '/files/img/partners/', $name);

            $photo = Files::create(['file'=>$name,'assign'=>'parthner']);

            $input['file_id'] = $photo->id;
        }

        $parners->update($input);

        return redirect('/admin/partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partner = Partners::findOrFail($id);
        if(file_exists(public_path() . "/files/img/partners/" . $partner->photo->file)) {
            unlink(public_path() . "/files/img/partners/" . $partner->photo->file);
        }

        $partner->delete($id);

        return redirect(route('admin.partners.index'));
    }

}
