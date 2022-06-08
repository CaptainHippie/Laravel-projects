<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userdata;

class AdminController extends Controller
{
    public function index()
    {
        $all_users = Userdata::all();
        return view ('admin.index')->with('users', $all_users);
    }
    public function create()
    {
        return view('admin.create');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Userdata::create($input);
        return redirect('admin')->with('flash_message', 'New User Added!');
    }
    public function show($id)
    {
        $current_user = Userdata::find($id);
        return view('admin.show')->with('user', $current_user);
    }
    public function edit($id)
    {
        $current_user = Userdata::find($id);
        return view('admin.edit')->with('user', $current_user);
    }
    public function update(Request $request, $id)
    {
        $current_user = Userdata::find($id);
        $input = $request->all();
        $current_user->update($input);
        return redirect('admin')->with('flash_message', 'User datails Updated!');
    }
    public function destroy($id)
    {
        Userdata::destroy($id);
        return redirect('admin')->with('flash_message', 'User deleted!');
    }
}
