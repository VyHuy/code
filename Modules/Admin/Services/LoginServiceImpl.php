<?php

namespace Modules\Admin\Services;



use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Modules\Admin\Contracts\Services\LoginService;
use Modules\Admin\Http\Requests\LoginRequest;

class LoginServiceImpl implements LoginService
{
    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $loginRequest = $request->only(['email','password']);
        if (Auth::guard('admin')->attempt($loginRequest)) {
            return Redirect::route('admin.home');
        }
    }
}
