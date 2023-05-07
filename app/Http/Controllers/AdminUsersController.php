<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        //var_dump($roles);

        return view('admin.users.create', compact('roles'));

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
            'username' => 'required|max:50|min:3|unique:users',
            'name' => 'required|max:50|min:3',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|required_with:password|min:8|same:password_confirmation'
        ];

        $customMessages = [
            'username.required' => 'İstifadəçi adını qeyd edin',
            'username.max' => 'İstifadəçi adı ən çox 50 simvoldan ibarət olmalıdır',
            'username.min' => 'İstifadəçi adı ən azı 3 simvoldan ibarət olmalıdır',
            'username.unique' => 'İstifadəçi adı artıq istifadı olunub',

            'name.required' => 'Tam ad mütləqdir',
            'name.min' => 'Ad ən azı 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad ən çox 50 simvoldan ibarət olmalıdır',

            'email.required' => 'Email-ınızı qeyd edin',
            'email.email' => 'Email-ınızı düzgün qeyd edin',
            'email.max' => 'Email ən çox 100 simvoldan ibarət olmalıdır',

            'password.required' => 'Şifrəni daxil edin',
            'password.min' => 'Şifrə ən azı 8 simvoldan ibarət olmalıdır',
            'password.required_with' => 'Şifrəni təsdiq edin',
            'password.same' => 'Şifrələr uyğun gəlmir',

            'password_confirmation.required' => 'Şifrəni təsdiq üçün daxil edin',
            'password_confirmation.required_with' => 'Şifrəni təsdiq edin',
            'password_confirmation.same' => 'Şifrələr uyğun gəlmir',
            'password_confirmation.min' => 'Şifrə ən azı 8 simvoldan ibarət olmalıdır',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }


        $input = $request->all();

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect(route('admin.users.index'));
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
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
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
        $user = User::findOrFail($id);

        $rules = [
            'username' => 'required|max:50|min:3|unique:users,username,' .$user->id,
            'name' => 'required|max:50|min:3',
            'email'=>'required|email|unique:users,email,' .$user->id,
            'password'=>'nullable|min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'nullable|required_with:password|min:8|same:password_confirmation'
        ];

        $customMessages = [
            'username.required' => 'İstifadəçi adını qeyd edin',
            'username.max' => 'İstifadəçi adı ən çox 50 simvoldan ibarət olmalıdır',
            'username.min' => 'İstifadəçi adı ən azı 3 simvoldan ibarət olmalıdır',
            'username.unique' => 'İstifadəçi adı artıq istifadı olunub',

            'name.required' => 'Tam ad mütləqdir',
            'name.min' => 'Ad ən azı 3 simvoldan ibarət olmalıdır',
            'name.max' => 'Ad ən çox 50 simvoldan ibarət olmalıdır',

            'email.required' => 'Email-ınızı qeyd edin',
            'email.email' => 'Email-ınızı düzgün qeyd edin',
            'email.max' => 'Email ən çox 100 simvoldan ibarət olmalıdır',

            'password.required' => 'Şifrəni daxil edin',
            'password.min' => 'Şifrə ən azı 8 simvoldan ibarət olmalıdır',
            'password.required_with' => 'Şifrəni təsdiq edin',
            'password.same' => 'Şifrələr uyğun gəlmir',

            'password_confirmation.required_with' => 'Şifrəni təsdiq edin',
            'password_confirmation.same' => 'Şifrələr uyğun gəlmir',
            'password_confirmation.min' => 'Şifrə ən azı 8 simvoldan ibarət olmalıdır',

        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('myerror', 'error on modal');
        }


        if($request->password == ''){

            $input = $request->except('password');
        }else{

            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        $user->update($input);

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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('admin.users.index'));
    }
}
