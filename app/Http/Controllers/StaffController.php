<?php

namespace App\Http\Controllers;

use App\Models\PageCategory;
use App\Models\Pages;
use App\Models\Permissions;
use App\Models\RolePermissions;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserRoles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    //
    public function roles()
    {
        $roles = UserRoles::orderby('id','desc')->get();
        // dd($roles);
        return view ('staff.roles.index', compact('roles'));
    }
    public function create_role(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);

            $role = new UserRoles();
            $role->name = $validated['name'];
            $role->description = $validated['description'];
            $role->status = $validated['status'];
            $role->save();

            return redirect()->route('userroles')->with('success', 'Role created successfully.');
    }
     public function edit_role(Request $request){
        // dd($request);
        $role = UserRoles::whereRaw('MD5(id) = ?', [$request->id])
        ->first();
        // dd($role);
        if (!$role) {
            // return response()->json(['error' => 'Role not found'], 404);
             return redirect()->route('userroles')->with('error', 'Role not found.');
        }

        return response()->json($role);

        }
     public function update_role(Request $request)
     {
        // dd($request);
         $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);
        $role = UserRoles::whereRaw('MD5(id) = ?', [$request->role_id])
        ->first();
        // dd($role);
        $role->name = $validated['name'];
        $role->description = $validated['description'];
        $role->status = $validated['status'];
        $role->save();

        return redirect()->route('userroles')->with('success', 'Role Updated successfully.');

     }
     public function delete_role($id){
        $role = UserRoles::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $role->delete();
        return redirect()->route('userroles')->with('success', 'Role Deleted successfully.');

     }

     public function permissions()
     {
        $permissions = Permissions::orderby('id','desc')->get();
        return view('staff.permissions.index',compact('permissions'));
     }
       public function create_permission(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);

            $permission = new Permissions();
            $permission->name = $validated['name'];
            $permission->description = $validated['description'];
            $permission->status = $validated['status'];
            $permission->save();

            return redirect()->route('permissions')->with('success', 'Permission created successfully.');
    }
     public function edit_permission(Request $request){
        // dd($request);
        $permission = Permissions::whereRaw('MD5(id) = ?', [$request->id])
        ->first();
        // dd($role);
        if (!$permission) {
            // return response()->json(['error' => 'Role not found'], 404);
             return redirect()->route('permissions')->with('error', 'Permission not found.');
        }

        return response()->json($permission);

        }
     public function update_permission(Request $request)
     {
        // dd($request);
         $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
                'status' => 'required|in:0,1',
            ]);
        $permission = Permissions::whereRaw('MD5(id) = ?', [$request->permission_id])
        ->first();
        // dd($permission);
        $permission->name = $validated['name'];
        $permission->description = $validated['description'];
        $permission->status = $validated['status'];
        $permission->save();

        return redirect()->route('permissions')->with('success', 'Permission Updated successfully.');

     }
     public function delete_permission($id){
        $permission = Permissions::whereRaw('MD5(id) = ?', [$id])
        ->first();
        $permission->delete();
        return redirect()->route('permissions')->with('success', 'Permission Deleted successfully.');

     }

     public function admin_users(){
        $permissions = Permissions::where('status',1)->get();
        $roles = UserRoles::where('status',1)->get();

        return view('staff.admin_users.create',compact('permissions','roles'));
     }
     public function create_staff(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'country' => 'required|string',
            'userrole' => 'required|exists:user_roles,id',
            'is_active' => 'required|in:0,1',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
           'password' => [
                    'required',
                    'string',
                    'regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/'
                ],
        ]);
    //    echo "hi"; exit();

        $imagePath = null;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imagePath = $image->store('profile_images', 'public');
        }

        // Create the user
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->phone = $validated['phone'];
        $user->country = $validated['country'];
        $user->is_active = $validated['is_active'];
        $user->role_id = $validated['userrole'];
        $role = UserRoles::find($validated['userrole']);
        $user->userrole = $role ? $role->name : null;

        $user->profile_image = $imagePath;
        $user->password = Hash::make($validated['password']);
        $user->save();


        return redirect()->back()->with('success', 'Staff user created successfully.');
    }
    public function staff_list(){
        $staffs = User::whereNotNull('role_id')->orderBy('id', 'desc')->get();

        return view('staff.admin_users.index',compact('staffs'));
    }
    public function edit_staff($id){
         $staff = User::whereRaw('MD5(id) = ?', [$id])
        ->first();
        // dd($staff);
        $roles = UserRoles::where('status',1)->get();

        // dd($staff);
         return view('staff.admin_users.create',compact('staff','roles'));
    }
    public function update_staff(Request $request, $id)
    {
        $staff = User::whereRaw('MD5(id) = ?', [$id])->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $staff->id,
            'phone' => 'required|string|max:20',
            'country' => 'required|string',
            'userrole' => 'required|exists:user_roles,id',
            'is_active' => 'required|in:0,1',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'password' => 'nullable|string|min:6',
        ]);

        if ($request->hasFile('profile_image')) {


            $image = $request->file('profile_image');
            $staff->profile_image = $image->store('profile_images', 'public');
        }

        // Update fields
        $staff->name = $validated['name'];
        $staff->email = $validated['email'];
        $staff->phone = $validated['phone'];
        $staff->country = $validated['country'];
        $staff->is_active = $validated['is_active'];
        $staff->role_id = $validated['userrole'];

        $role = UserRoles::find($validated['userrole']);
        $staff->userrole = $role ? $role->name : null;

        // Update password only if provided
        if (!empty($validated['password'])) {
            $staff->password = Hash::make($validated['password']);
        }

        $staff->save();

        return redirect()->route('staffList')->with('success', 'Staff user updated successfully.');
    }


    public function role_permissions()
    {
         $roles = UserRoles::where('status', 1)->get();
    
     $pages = Pages::where('active', 1)
    ->where('is_submenu', 0) 
    ->with(['children' => function ($q) {
        $q->where('active', 1)->orderBy('page_order'); 
    }])
    ->orderBy('page_order')
    ->get();
    $role_permissions = RolePermissions::with('page')->select('role_id', 'page_id')->get()->groupBy('role_id');

        return view ('staff.roles.role_permissions', compact('roles','pages'));

    }
    public function get_permissions(Request $request){
        $role_id = $request->role_id;
       $permissions = RolePermissions::with('page')->
        whereRaw('MD5(role_id) = ?', [$role_id])
        ->get();

    if (!$permissions) {
        return response()->json(['error' => 'Role not found'], 404);
    }

      $pages = Pages::with('children')->get();


    $permittedPageIds = $permissions->pluck('page_id')->toArray();


     $permittedPageIds = $permissions->pluck('page_id')->toArray();

    return response()->json([
        'page_ids' => $permittedPageIds
    ]);
    }
    public function add_role_permissions(Request $request)
    {
         $role_id = $request->input('role_id');
         if($role_id == null){
             return back()->with('error', 'Select a Role');
         }

          $role = UserRoles::
        whereRaw('MD5(id) = ?', [$role_id])
        ->first();

        if (!$role) {
            return back()->with('error', 'Invalid Role Selected');
        }

        RolePermissions::where('role_id', $role->id)->delete();


        $page_ids = $request->input('pages', []);
        foreach ($page_ids as $page_id) {
            RolePermissions::create([
                'role_id' => $role->id,
                'page_id' => $page_id,
                'created_by' => Auth::user()->id
            ]);
        }

        return back()->with('success', 'Permissions updated successfully!');

    }


}
