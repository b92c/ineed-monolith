<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FreelanceProfessional;
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
    public function create(): View
    {
        return view("auth.register");
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "first_name" => ["required", "string", "max:255"],
            "last_name" => ["required", "string", "max:255"],
            "email" => [
                "required",
                "string",
                "lowercase",
                "email",
                "max:255",
                "unique:" . User::class,
            ],
            "password" => ["required", "confirmed", Rules\Password::defaults()],
            "register_services" => ["nullable", "string"],
            "profession" => ["nullable", "string", "max:255"],
            "phone" => ["nullable", "string", "max:15"],
            "address" => ["nullable", "string", "max:255"],
            "neighborhood" => ["nullable", "string", "max:255"],
            "city" => ["nullable", "string", "max:255"],
            "state" => ["nullable", "string", "max:255"],
        ]);

        $user = User::create([
            "name" => $request->first_name . " " . $request->last_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if ($request->register_services === "yes") {
            FreelanceProfessional::create([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "vip" => 0,
                "profession" => $request->profession,
                "service_price" => 0.00,
                "charges_by" => "hour",
                "phone" => preg_replace('/\D/', '', $request->phone),
                "email" => $request->email,
                "cpf" => preg_replace('/\D/', '', $request->cpf),
                "street" => $request->address,
                "numer" => $request->number,
                "neighborhood" => $request->neighborhood,
                "zip_code" => preg_replace('/\D/', '', $request->cep),
                "city" => $request->city,
                "state" => $request->state,
                "country" => 1,
                "user_id" => $user->id,
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route("dashboard", absolute: false));
    }
}
