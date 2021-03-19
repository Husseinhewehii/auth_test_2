<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserTypes;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserAdminsController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(){
        request()->query->set('type', UserTypes::ADMIN);
        $list = $this->userRepository->search(request())->paginate(10);
        return view('admin.users.admins.index', ['list' => $list]);
    }

    public function create(){
        return view('admin.users.admins.create');
    }

    public function store(Request $request, User $user)
    {
        $this->userService->fillFromRequest($request, $user);
        return redirect(route('admin.users.index'));

    }

    public function edit(User $user){
        echo gettype($user);die;
        return view('admin.users.admins.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $this->userService->fillFromRequest($request, $user);
        return redirect(route('admin.users.index'));

    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    
}
