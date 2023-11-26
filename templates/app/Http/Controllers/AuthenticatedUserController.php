<?php

/**
 * Lenevor Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file license.md.
 * It is also available through the world-wide-web at this URL:
 * https://lenevor.com/license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@Lenevor.com so we can send you a copy immediately.
 *
 * @package     Lenevor
 * @link        https://lenevor.com
 * @copyright   Copyright (c) 2019 - 2023 Alexander Campo <jalexcam@gmail.com>
 * @license     https://opensource.org/licenses/BSD-3-Clause New BSD license or see https://lenevor.com/license or see /license.md
 */

namespace App\Http\Controllers;

use App\Http\Controller;
use Syscodes\Components\View\View;
use Syscodes\Components\Http\Request;
use App\Providers\RouteServiceProvider;
use Syscodes\Components\Support\Facades\Auth;
use Syscodes\Components\Support\Facades\Hash;
use Syscodes\Components\Http\RedirectResponse;

class AuthenticatedUserController extends Controller
{
    /**
     * Display the login view.
     * 
     * @return \Syscodes\Components\View\View;
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     * 
     * @return \Syscodes\Components\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     * 
     * @return \Syscodes\Components\Http\RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}