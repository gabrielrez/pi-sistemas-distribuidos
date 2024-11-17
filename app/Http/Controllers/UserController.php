<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function showSessions($userId)
    {
        $user = User::findOrFail($userId);
        $sessions = $user->sessions;
        return response()->json($sessions);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    public function login(Request $request)
    {
        // Validação dos dados de login
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string',
        ]);

        // Procurar o usuário pelo e-mail
        $user = User::where('email', $validatedData['email'])->first();

        // Verificar se o usuário existe e se a senha é válida
        if ($user && Hash::check($validatedData['password'], $user->password)) {
            // A senha é válida, realizar o login ou retornar sucesso
            return response()->json(['message' => 'Login successful', 'user' => $user], 200);
        } else {
            // Caso contrário, retornar erro
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }
}
