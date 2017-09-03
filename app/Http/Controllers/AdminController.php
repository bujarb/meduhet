<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Need;
use App\Product;
use Auth;
use App\City;
use DB;
// haha
class AdminController extends Controller
{
    /*
        Method for returning the admin profile
    */

    public function getProfile(){
    	return view('admin.index');
    }

    public function getAdminControlCenter(){
      return view('admin.control-center');
    }

    /*
        Methods for managing users from admin
        1) getUsersIndex() -> returns the admin.user.index view and lists all users
        2) getUsersEdit() -> returns the edit view for a specific user
        3) userUpdate() -> updates tasdhe user information
    */
    public function getUsersIndex(){
    	$users = User::where('id','!=',Auth::user()->id)->paginate(5);
    	return view('admin.users.index',['users'=>$users]);
    }

    public function getUsersEdit($user_id){
    	$user = User::find($user_id);
    	return view('admin.users.edit',['user'=>$user]);
    }

    public function userUpdate(Request $request,$user_id){
        $this->validate($request,array(
            'firstname'=>'required',
            'lastname'=>'required',
            'role'=>'required'
        ));

        $user = User::find($user_id);
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->removeRole($user->roles()->pluck('name')->first());
        $user->assignRole($request->input('role'));
        $user->update();

        return redirect()->route('user-index');
    }

    public function deleteUser($user_id){
      $user = User::find($user_id);
      $user->delete();

      return redirect()->route('user-index');
    }

    /*
        Methods for managing categories from admin
        1) getCategoryIndex() -> returns the admin.category.index view and lists all users
        2) getCategoryEdit() -> returns the edit view for a specific category
        3) cateogoryUpdate() -> updates the user information
    */

    public function getCategoryIndex(){
      $categories = Category::paginate(10);
      return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create(){
      return view('admin.categories.create');
    }

    public function categoryStore(Request $request){
      $this->validate($request,['name'=>'required']);

      $category = new Category();
      $category->name = $request->input('name');
      $category->save();

      return redirect()->back();
    }

    public function categoryAdd(Request $request){
      $this->validate($request,['category-name'=>'required']);

      $catategory = new Category();
      $category->name = $request->input('category-name');

      $category->save();

      return redirect()->route('category-index');
    }

    public function getCategoryEdit($category_id){
      $category = Category::find($category_id);

      return view('admin.categories.edit',['category'=>$category]);
    }

    public function categoryUpdate(Request $request,$category_id){
      $this->validate($request,['name'=>'required']);

      $category = Category::find($category_id);
      $category->name = $request->input('name');
      $category->update();

      return redirect()->route('category-index');
    }

    public function deleteCategory($category_id){
      $category = Category::find($category_id);
      $category->delete();

      return redirect()->route('category-index');
    }

    /*
        Methods for managing categories from admin
        1) getCityIndex() -> returns the admin.user.city view and lists all users
        2) getCityEdit() -> returns the edit view for a specific city
        3) cityUpdate() -> updates the city information
    */

    public function getCityIndex(){
      $cities = City::paginate(5);
      return view('admin.cities.index',['cities'=>$cities]);
    }

    public function getCityEdit($city_id){
      $city = City::find($city_id);
      return view('admin.cities.edit',['city'=>$city]);
    }

    public function cityUpdate(Request $request,$city_id){
      $this->validate($request,['name'=>'required']);

      $city = City::find($city_id);
      $city->name = $request->input('name');
      $city->update();

      return redirect()->route('city-index');
    }

    public function deleteCity($city_id){
      $city = City::find($city_id);
      $city->delete();

      return redirect()->route('city-index');
    }

    public function cityStore(Request $request){
      $this->validate($request,['name'=>'required']);

      $city = new City();
      $city->name = $request->input('name');
      $city->save();

      return redirect()->back();
    }

    /*
        Methods for managing permissions from admin
        1) getPermissionIndex() -> returns the admin.user.permission view and lists all users
        2) getPermissionEdit() -> returns the edit view for a specific permission
        3) permissionUpdate() -> updates the permission information
    */

    public function getPermissionIndex(){
      $permissions = Permission::paginate(10);
      return view('admin.permissions.index',['permissions'=>$permissions]);
    }

    public function getPermissionEdit(){

    }

    public function permissionEdit(){

    }

    public function permissionCreate(){
      return view('admin.permissions.create');
    }

    public function permissionStore(Request $request){
      $this->validate($request,['name'=>'required']);
      $permission = Permission::create(['name' => $request->name]);
      foreach ($request->roles as $role) {
        $role1 = Role::find($role);
        $role1->givePermissionTo($permission);
      }
      return redirect()->route('permission-index');
    }

    public function permissionDelete($permission_id){
      $permission = Permission::find($permission_id);
      $permission->delete();

      return redirect()->route('permission-index');
    }

    /*
        Methods for managing roles from admin
        1) getRoleIndex() -> returns the admin.user.role view and lists all users
        2) getRoleEdit() -> returns the edit view for a specific role
        3) roleUpdate() -> updates the role information
    */

    public function getRoleIndex(){
      $roles = Role::all();
      return view('admin.roles.index',['roles'=>$roles]);
    }

    public function getRolePermissions($role_id){
      $role = DB::table('roles')->select('id')->where('id','=',$role_id)->first();
      $permissions = DB::table('permissions')->select('permissions.name')->join('role_has_permissions','permission_id','=','permissions.id')->where('role_has_permissions.role_id','=',$role_id)->paginate(15);
      return view('admin.roles.role-permissions',['permissions'=>$permissions,'role'=>$role]);
    }

    public function addPermissionToRole($role_id){
      $role = DB::table('roles')->where('id','=',$role_id)->pluck('id')->first();
      $permissions = DB::table('permissions')->select('name','id')->join('role_has_permissions','role_has_permissions.permission_id','=','permissions.id')->where('role_id','!=',$role_id)->get();
      //dd($permissions);
      return view('admin.roles.add-permission-to-role',['permissions'=>$permissions,'role'=>$role]);
    }

    public function assignPermission(Request $request,$role){
      $role = Role::find($role);
      foreach ($request->permissions as $permission) {
        $permission1 = DB::table('permissions')->where('id','=',$permission)->pluck('name')->first();
        $role->givePermissionTo($permission1);
      }

      return redirect()->route('role-permissions',$role->id);
    }

    public function deleteRole($role_id){
      $role = Role::find($role_id);
      $role->delete();

      return redirect()->route('role-index');

    }

    public function revokePermission($role,$permission){
      $role = Role::find($role);
      $role->revokePermissionTo($permission);

      return redirect()->route('role-index');
    }

    public function getRoleEdit(){

    }

    public function roleEdit(){

    }

    public function getNeedsIndex(){
      $needs = Need::paginate(10);
      $nums = [];
      for($i=0;$i<count($needs);$i++){
        $nums[] = $i;
      }
      return view('admin.needs.index',['needs'=>$needs,'nums'=>$nums]);
    }

    public function needDelete($need_id){
      $need = Need::find($need_id);
      $need->delete();

      return redirect()->back();
    }

    public function getProductsIndex(){
      $products = Product::paginate(10);
      return view('admin.products.index',['products'=>$products]);
    }

    public function productDelete($product_id){
      $product = Product::find($product_id);
      $product->delete();

      return redirect()->back();
    }
}
