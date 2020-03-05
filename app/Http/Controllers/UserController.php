<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveUserRequest;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->middleware('prueba')->except('index','show');
        /*$this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);*/
        /*$this->middleware('permission:role-create', ['only' => ['create','store']]);
        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);*/
    }
    public function index(){
        return view('users.index',[
            'users' => User::latest()->paginate(10)
        ]);
    }
    public function create(){
        $roles = Role::all();
        return view( 'users.create', [
            'user' => new User,
            'roles' => $roles
        ]);
    }
    public function store(SaveUserRequest $request)
    {
        //return $request->all();
        User::create($request->validated());
        //$user->assignRole($request->input('roles'));
        return redirect()->route('projects.index')->with('status','El usuario fue creado con exito');
    }
    public function show(User $user)
    {
        /*$project = Project::findOrFail($id);*/
        return  view('users.show',[
            'user' => $user
        ]);
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return  view('users.edit',[
            'user' => $user,
            'roles' => $roles
        ]);
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email' => 'required | email'
        ]);
        //$user->update($request ->validated());
        $user->update($request->all());
        $input = $request->all();
        $user->update($input);

        $user->role_id = $request->id_role;

        $user->save();
        /*DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));*/

        return redirect()->route('users.show',$user)->with('status', 'El usuario fue actualizado con éxito.' );
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('status', 'El usuario fue eliminado con éxito.');
    }
}
