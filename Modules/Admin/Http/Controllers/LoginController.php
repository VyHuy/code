<?php

namespace Modules\Admin\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Modules\Admin\Contracts\Services\LoginService;
use Modules\Admin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    public LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function show()
    {
        return view('admin::auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        return $this->loginService->login($request);
    }
}
