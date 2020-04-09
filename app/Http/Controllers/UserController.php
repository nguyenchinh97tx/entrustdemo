<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestUser;
use Core\Services\UserServiceContract;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $service;

    public function __construct(UserServiceContract $service)
    {
        $this->service = $service;
    }
    public function index(Request $request)
    {
        $users = $this->service->paginate();
        return view('users.index',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = $this->service->listRole();
        return view('users.create',compact('roles'));
    }

    public function store(RequestUser $request)
    {
        $this->service->store($request);
        return redirect()->route('users.index')
                        ->with('success','Thêm mới thành công');
    }

    public function show($id)
    {
        $user = $this->service->find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $data = $this->service->editUser($id);
        return view('users.edit',$data);
    }

    public function update(RequestUser $request, $id)
    {
        $this->service->update($id,$request);
        return redirect()->route('users.index')
                        ->with('success','Cập nhật thành công');
    }

    public function destroy($id)
    {
        $this->service->destroy($id);
        return redirect()->route('users.index')
                        ->with('success','Xóa thành công');
    }
}
