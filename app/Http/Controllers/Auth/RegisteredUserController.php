<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\DeviceModel;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $deviceModelId = null;
        $redirectAfterRegisterTo = 'dashboard';

        if (!empty($request->model_id)) {
            $modelId = (int) $request->model_id;
            $deviceModel = DeviceModel::where('id', $modelId)->first();
            if (!empty($deviceModel) && $deviceModel->isDeviceAvailable()) {
                $deviceModelId = $deviceModel->id;
                $redirectAfterRegisterTo = 'orderSummary';
            } else {
                $redirectAfterRegisterTo = 'shop';
            }
        }

        return view('main.pages.public.register', [
            'deviceModelId' => $deviceModelId,
            'redirectAfterRegisterTo' => $redirectAfterRegisterTo,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $redirectTo = RouteServiceProvider::HOME;

        if ($request->redirect_after_register_to === 'orderSummary' ) {
            $deviceModelId = $request->device_model_id;
            if (DeviceModel::isDeviceModelExist($deviceModelId)) {
                $redirectTo = route('administration.user.order.summary', ['modelId' => $deviceModelId]);
            }
        } elseif ($request->redirect_after_register_to === 'shop') {
            $redirectTo = route('administration.user.device.shop');
        } elseif ($request->redirect_after_register_to === 'dashboard') {
            $redirectTo = RouteServiceProvider::HOME;
        }

        return redirect($redirectTo);
    }
}
