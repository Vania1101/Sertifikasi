<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Peserta;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    
public function store(Request $request)
{
    $request->validate([
        'nisn' => ['required', 'string'],
        'email' => ['required', 'email'],
        'password' => ['required', 'confirmed', 'min:8'],
    ], [
        'nisn.required' => 'NISN wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Password wajib diisi.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'password.min' => 'Password minimal 8 karakter.',
    ]);

    $peserta = Peserta::where('nisn', $request->nisn)
        ->where('email', $request->email)
        ->first();

    if (!$peserta) {
        return back()
            ->withErrors([
                'nisn' => 'NISN dan email tidak cocok dengan data peserta yang terdaftar.',
            ])
            ->withInput($request->only('nisn', 'email'));
    }

    if ($peserta->user_id !== null) {
        return back()
            ->withErrors([
                'nisn' => 'Data peserta ini sudah memiliki akun.',
            ])
            ->withInput($request->only('nisn', 'email'));
    }

    if (User::where('email', $peserta->email)->exists()) {
        return back()
            ->withErrors([
                'email' => 'Email ini sudah digunakan untuk akun lain.',
            ])
            ->withInput($request->only('nisn', 'email'));
    }

    $user = DB::transaction(function () use ($peserta, $request) {
        $user = User::create([
            'name' => $peserta->nama,
            'email' => $peserta->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        $peserta->user_id = $user->id;
        $peserta->save();

        return $user;
    });

    event(new Registered($user));

    Auth::login($user);

    $request->session()->regenerate();

    return redirect()->route('user.dashboard');
}

}
