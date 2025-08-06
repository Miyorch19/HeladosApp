<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Show admin home page.
     */
    public function home(): View
    {
        $user = auth()->user();
        
        $stats = [
            'total_users' => User::count(),
            'total_customers' => User::where('role', 'customer')->count(),
            'total_admins' => User::where('role', 'admin')->count(),
        ];
        
        return view('admin.home-admin', compact('user', 'stats'));
    }

    /**
     * Show users management page.
     */
    public function users(): View
    {
        $users = User::paginate(15);
        return view('admin.users', compact('users'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function storeUser(Request $request): RedirectResponse
    {
        // Verificar que solo admins puedan crear usuarios
        $this->authorize('create', User::class);
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:' . User::ROLE_ADMIN . ',' . User::ROLE_CUSTOMER],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ser un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'La confirmación de contraseña no coincide.',
            'role.required' => 'El rol es obligatorio.',
            'role.in' => 'El rol seleccionado no es válido.',
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            return redirect()->route('admin.users')->with('success', 'Usuario creado exitosamente.');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al crear el usuario. Inténtalo nuevamente.');
        }
    }

    /**
     * Update the specified user in storage.
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        // Verificar que solo admins puedan actualizar usuarios
        $this->authorize('update', $user);
        
        // No permitir que el admin se modifique a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'No puedes modificar tu propio usuario.');
        }
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'role' => ['required', 'string', 'in:' . User::ROLE_ADMIN . ',' . User::ROLE_CUSTOMER],
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ser un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está en uso por otro usuario.',
            'role.required' => 'El rol es obligatorio.',
            'role.in' => 'El rol seleccionado no es válido.',
        ]);

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);

            return redirect()->route('admin.users')->with('success', 'Usuario actualizado exitosamente.');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Error al actualizar el usuario. Inténtalo nuevamente.');
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroyUser(User $user): RedirectResponse
    {
        // Verificar que solo admins puedan eliminar usuarios
        $this->authorize('delete', $user);
        
        // No permitir que el admin se elimine a sí mismo
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'No puedes eliminar tu propio usuario.');
        }

        try {
            $user->delete();
            return redirect()->route('admin.users')->with('success', 'Usuario eliminado exitosamente.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el usuario. Inténtalo nuevamente.');
        }
    }
}