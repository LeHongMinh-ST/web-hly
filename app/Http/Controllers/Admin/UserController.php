<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit']);

        $users = $this->userRepository->getUsersPaginate($data);

        return view('admin.pages.user.index')->with([
            'users' => $users
        ]);
    }
}
