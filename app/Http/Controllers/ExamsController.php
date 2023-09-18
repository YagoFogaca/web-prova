<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('pages.exams.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.exams-create.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    //
    // Retirar code como obg
    // Só gerar código por btn que só será ativo se haver questões na prova
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'points' => 'required',
            'average' => 'required',
            'matter' => 'nullable|min:3',
            'access_termination' => 'required|date',
            'access' => 'required|date',
        ]);

        try {
            // Retirar o access_termination e access e torna-los op na criação
            $exam = [
                'title' => $request->input('title'),
                'points' => $request->input('points'),
                'average' => $request->input('average'),
                'matter' => $request->input('matter'),
                'access_termination' => $request->input('access_termination'),
                'access' => $request->input('access'),
                'teacher_id' => Auth::id()
            ];

            $examCreated = Exams::create($exam);
            if (!$examCreated) {
                throw new Exception("Ocorreu um erro interno ao criar a prova", 1);
            }

            dd('CRIOU');
        } catch (Exception $error) {
            //throw $th;
            dd('NÃO CRIOU');
        }
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
