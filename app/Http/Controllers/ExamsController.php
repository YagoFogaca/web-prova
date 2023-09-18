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
        $exams = Exams::where('teacher_id', Auth::id())->get()->toArray();
        foreach ($exams as &$exam) {
            $exam['created_at'] = date("d-m-Y", strtotime($exam['created_at']));
        }
        return view('pages.exams.index', ['exams' => $exams]);
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'points' => 'required|numeric',
            'average' => 'required|numeric',
            'matter' => 'nullable|min:3'
        ]);

        try {
            $exam = [
                'title' => $request->input('title'),
                'points' => $request->input('points'),
                'average' => $request->input('average'),
                'matter' => $request->input('matter'),
                'teacher_id' => Auth::id()
            ];

            $examCreated = Exams::create($exam);
            if (!$examCreated) {
                throw new Exception("Ocorreu um erro interno ao criar a prova", 1);
            }

            return redirect()->route('exams.show', ['exam' => $examCreated]);
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['create-exam' => 'Ocorreu um erro ao criar a prova']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Exams $exam)
    {
        return view('pages.exam-show.index', ['exam' => $exam]);


        // {{-- <div class="mb-3 col-md-6">
        //     <label for="access" class="form-label">Inicio da prova</label>
        //     <input type="datetime-local" class="form-control" id="access" name="access" required>
        // </div>

        // <div class="mb-3 col-md-6">
        //     <label for="access_termination" class="form-label">Termino da prova</label>
        //     <input type="datetime-local" class="form-control" id="access_termination" name="access_termination"
        //         required>
        // </div> --}}
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
