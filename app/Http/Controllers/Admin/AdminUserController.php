<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

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
            'gender' => 'nullable|string|'
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
                'gender' => $request->gender,

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

    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);

        $request->validate([
            //'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date|before:today',
            'gender' => 'nullable|string|'
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
                'gender' => $request->gender,

            ]);
            return redirect()->route('admin.users.edit', $user->id)->with('success', 'Datos del perfil actualizados correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error al actualizar los datos del perfil: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**Actualizar foto/avatar de usuario */

    public function updateAvatarUser($id, Request $request)
    {
        $user = User::findOrFail($id);
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

        return redirect()->route('admin.users.edit', $user->id)->with('success', 'Avatar actualizado correctamente.');
    }

    public function updatePasswordUser($id, Request $request)
    {
        try {
            // Buscar el usuario y manejar el caso donde no existe
            $user = User::findOrFail($id);

            // Validación de la nueva contraseña
            $request->validate([
                'new_password' => [
                    'required',
                    'string',
                    'confirmed', // Valida que new_password y new_password_confirmation coincidan
                    Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                ],
            ], [
                'new_password.required' => 'La nueva contraseña es obligatoria.',
                'new_password.confirmed' => 'Las contraseñas nuevas no coinciden.',
                'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
                'new_password.letters' => 'La nueva contraseña debe contener al menos una letra.',
                'new_password.mixed_case' => 'La nueva contraseña debe contener mayúsculas y minúsculas.',
                'new_password.numbers' => 'La nueva contraseña debe contener al menos un número.',
                'new_password.symbols' => 'La nueva contraseña debe contener al menos un símbolo.',
            ]);

            // Verificar que la nueva contraseña sea diferente a la actual
            if (Hash::check($request->new_password, $user->password)) {
                return back()->withErrors([
                    'new_password' => 'La nueva contraseña debe ser diferente a la actual.'
                ])->withInput();
            }

            // Opcional: Verificar permisos de administrador
            if (!auth()->user()->hasRole('super_admin') && auth()->id() !== $user->id) {
                return back()->withErrors([
                    'authorization' => 'No tienes permisos para cambiar esta contraseña.'
                ]);
            }

            // Actualizar la contraseña
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);

            // DB::table('sessions')->where('user_id', $user->id)->delete();

            // Opcional: Log de auditoría
            Log::info("Admin {auth()->user()->name} changed password for user {$user->name} (ID: {$user->id})");

            return redirect()->route('admin.users.edit', $user->id)
                ->with('success', 'Contraseña cambiada correctamente.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('admin.users.index')
                ->withErrors(['user' => 'Usuario no encontrado.']);
        } catch (\Exception $e) {
            Log::error('Error updating user password: ' . $e->getMessage());
            return back()->withErrors([
                'error' => 'Ocurrió un error al cambiar la contraseña. Inténtalo de nuevo.'
            ]);
        }
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

    /************************METODO PARA LA CREACIÓN DE USUARIOS ************************/
    public function createUser()
    {
        return view('admin.pages.users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed', // Valida que password y password_confirmation coincidan
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
            'phone' => 'nullable|string|max:15',
            'birth_date' => 'nullable|date|before:today',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.unique' => 'El correo electrónico ya está en uso.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.letters' => 'La contraseña debe contener al menos una letra.',
            'password.mixed_case' => 'La contraseña debe contener mayúsculas y minúsculas.',
            'password.numbers' => 'La contraseña debe contener al menos un número.',
            'password.symbols' => 'La contraseña debe contener al menos un símbolo.',
            'birth_date.date' => 'La fecha de nacimiento no es válida.',
            'birth_date.before' => 'La fecha de nacimiento debe ser una fecha pasada.',
            'phone.max' => 'El número de teléfono no debe exceder los 15 caracteres.',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
            ]);

            // Asignar rol por defecto, si es necesario
            // $user->assignRole('default_role');

            return redirect()->route('admin.users.view')->with('success', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error creating user: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Ocurrió un error al crear el usuario. Inténtalo de nuevo.'])->withInput();
        }

    }
}
