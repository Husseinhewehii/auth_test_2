<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Services\UserService;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class UserNormalController extends Controller
{
    protected $userRepository;
    protected $userService;

    public function __construct(UserRepository $userRepository, UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    public function index(){
        request()->query->set('type', UserTypes::NORMAL);
        $list = $this->userRepository->search(request())->paginate(10);
        return view('admin.users.normals.index', ['list' => $list]);
    }

    public function create(){
        return view('admin.users.normals.create');
    }

    public function store(Request $request, $locale)
    {
        request()->query->set('type', UserTypes::NORMAL);
        $this->userService->fillFromRequest($request);
        return redirect(LaravelLocalization::localizeURL(route('admin.normals.index')));
    }

    public function edit($locale, User $user){
        return view('admin.users.normals.edit', ['user' => $user]);
    }

    public function update(Request $request, $locale, User $user)
    {
        $this->userService->fillFromRequest($request, $user);
        return redirect(LaravelLocalization::localizeURL(route('admin.normals.index')));
    }

    public function destroy($locale, User $user)
    {
        $user->delete();

        return redirect()->back();
    }

    
}
