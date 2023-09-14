<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeachersController extends Controller
{
    /**
     * View Login Teachers
     */
    public function login()
    {
        return view('pages.teacher-login.index');
    }

    /**
     * Auth Teachers
     */
    public function auth(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
                'remember' => 'nullable'
            ]
        );

        try {
            $credentials = [
                'email' => $request->input('email'),
                'password' =>  $request->input('password'),
            ];

            $teacherAuth = Auth::guard('teacher')->attempt($credentials, $request->input('remember'));
            if (!$teacherAuth) {
                throw new Exception("Email ou senha inválido", 1);
            }

            return redirect()->route('platform.index');
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['authentication' => $error->getMessage()]);
        }
    }

    /**
     * Logout Teachers
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('teachers.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
