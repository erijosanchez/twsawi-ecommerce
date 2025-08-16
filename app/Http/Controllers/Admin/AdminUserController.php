<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        return view('admin.pages.profile.index', compact('user'));
    }

    public function updateavatar(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        // Eliminar la imagen anterior si existe
        if ($user->avatar && file_exists(public_path('storage/' . $user->avatar))) {
            unlink(public_path('storage/' . $user->avatar));
        }

        // Guardar la nueva imagen
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
        $user->update(['avatar' => $avatarPath]);

        return redirect()->route('admin.profile')->with('success', 'Avatar updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => [
                'required',
                'string',
                'confirmed', // Esto valida que new_password y new_password_confirmation coincidan
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ], [
            'current_password.required' => 'La contraseña actual es obligatoria.',
            'new_password.required' => 'La nueva contraseña es obligatoria.',
            'new_password.confirmed' => 'Las contraseñas nuevas no coinciden.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'new_password.letters' => 'La nueva contraseña debe contener al menos una letra.',
            'new_password.mixed_case' => 'La nueva contraseña debe contener mayúsculas y minúsculas.',
            'new_password.numbers' => 'La nueva contraseña debe contener al menos un número.',
            'new_password.symbols' => 'La nueva contraseña debe contener al menos un símbolo.',
        ]);

        $user = Auth::user();

        // Verificar que la contraseña actual sea correcta
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'La contraseña actual es incorrecta.'
            ])->withInput();
        }

        // Verificar que la nueva contraseña sea diferente a la actual
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors([
                'new_password' => 'La nueva contraseña debe ser diferente a la actual.'
            ])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        $request->session()->regenerate();

        return redirect()->route('admin.profile')
            ->with('success', 'Contraseña cambiada correctamente.');
    }

    public function updateProfileData(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            //'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date|before:today',
        ], [
            /** 'email.required' => 'El correo electrónico es obligatorio.',
            *'email.email' => 'El correo electrónico no es válido.',
            *'email.unique' => 'El correo electrónico ya está en uso.',*/
            'birth_date.date' => 'La fecha de nacimiento no es válida.',
            'birth_date.before' => 'La fecha de nacimiento debe ser una fecha pasada.',
            'phone.max' => 'El número de teléfono no debe exceder los 15 caracteres.',
            //'phone.regex' => 'El número de teléfono contiene caracteres no válidos.',
        ]);

        try {
            $user->update([
                //'email' => $request->email,
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                
            ]);
            return redirect()->route('admin.profile')->with('success', 'Datos del perfil actualizados correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar los datos del perfil: ' . $e->getMessage())
                ->withInput();
        }
    }

    // metodos para la administracion de usuarios
    public function viewUsers()
    {
        $users = User::all();
        return view('admin.pages.users.index', compact('users'));
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.pages.users.edit', compact('user'));
    }
    
    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        
        // Eliminar la imagen de avatar si existe
        if ($user->avatar && file_exists(public_path('storage/' . $user->avatar))) {
            unlink(public_path('storage/' . $user->avatar));
        }

        $user->delete();

        return redirect()->route('admin.users.view')->with('success', 'Usuario eliminado correctamente.');
    }
}
