<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveRolRequest;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except('index','show');
        $this->middleware('prueba')->except('index','show');
        /*$this->middleware('role_or_permission')->except('index','show');*/

        /*$this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        $this->middleware('permission:role-create', ['only' => ['create','store']]);
        /*$this->middleware('permission:role-edit', ['only' => ['edit','update']]);*/
        /*$this->middleware('permission:role-delete', ['only' => ['destroy']]);*/
    }
    public function index(Request $request)
    {
       /* $roles = Role::orderBy('id','DESC')->paginate(5);
        return view('roles.index',compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);*/
        return view('roles.index',[
            'roles' => Role::latest()->paginate(3)
        ]);
    }
    public function create()
    {
        $permission = Permission::all();
        return view('roles.create', [
          'rol' => new Role,
          'permission' => $permission
        ]);
    }
    public function store(SaveRolRequest $request)
    {
        //dd($request->all());
        $roles = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);

        //$permissions = \App\Permission::pluck('id','id')->all();
        $permisions=[];
        foreach ($request->permissions as $perm_id ){
            array_push($permisions, Permission::find($perm_id));
            $permision = Permission::find($perm_id);
            $roles->permisions()->save($permision);
        }
        //$roles->permisions()->sync($permisions);

        /*$role->syncPermissions($permissions);*/
        //$user->role()->associate($role);
        //$roles->save();

        return redirect()->route('roles.index')
            ->with('status','El rol fue creado con exito');


    }
    public function show(Role $role)
    {
        return  view('roles.show',[
            'rol' => $role
        ]);
        /*
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();*/
    }
    public function edit(Role $role)
    {
        $permission = Permission::all();
        /*$permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();*/
        return view('roles.edit',[
            'rol' => $role,
            'permission' => $permission
        ]);
    }
    public function update(Role $role,SaveRolRequest $request)
    {
        $role->update($request->validated());
        $input = $request->all();
        $role->update($input);
        DB::table('role_has_permissions')->where('role_id',$role->id)->delete();

        foreach ($request->permissions as $permision_id){
            $permiso = Permission::find($permision_id);
            $role->permisions()->save($permiso);
        }
       /* $role->assignRole($request->input('roles'));*/

        return redirect()->route('roles.show',$role)->with('status', 'El rol fue actualizado con éxito.' );

    }
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
            ->with('success','Role deleted successfully');
    }
}
