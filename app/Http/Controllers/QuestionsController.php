<?php

namespace App\Http\Controllers;

use App\Models\Exams;
use App\Models\Questions;
use App\Models\Alternatives;
use Exception;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Exams $exam)
    {
        return view('pages.questions-create.index', ['remaining_points' => $exam['remaining_points'] ?? $exam['points'], 'exam_id' => $exam['id']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'statement' => 'required|min:5',
            'points' => 'required|numeric|min:0.1',
            'alternative.a' => 'required|min:5',
            'alternative.b' => 'required|min:5',
            'alternative.c' => 'nullable|min:5',
            'alternative.d' => 'nullable|min:5',
            'alternative.e' => 'nullable|min:5',
            'correct_alternative' => 'required',
            'exam_id' => 'required'
        ]);


        try {
            $question = [
                'statement' => $request->input('statement'),
                'points' => $request->input('points'),
                'correct_alternative' => $request->input('correct_alternative'),
                'exam_id' => $request->input('exam_id')
            ];
            $questionCreated = Questions::create($question);
            if (!$questionCreated) {
                throw new Exception("Ocorreu um erro ao criar a questão", 1);
            }

            $alternatives = [
                'alternative.a' => [
                    'alternative' => $request->input('alternative.a'),
                    "correct_alternative" => $request->input('correct_alternative') === 'a' ? true : false,
                    'question_id' => $questionCreated['id']
                ],
                'alternative.b' => [
                    'alternative' => $request->input('alternative.b'),
                    "correct_alternative" => $request->input('correct_alternative') === 'b' ? true : false,
                    'question_id' => $questionCreated['id']
                ],
                'alternative.c' => [
                    'alternative' => $request->input('alternative.c'),
                    "correct_alternative" => $request->input('correct_alternative') === 'c' ? true : false,
                    'question_id' => $questionCreated['id']
                ],
                'alternative.d' => [
                    'alternative' => $request->input('alternative.d'),
                    "correct_alternative" => $request->input('correct_alternative') === 'd' ? true : false,
                    'question_id' => $questionCreated['id']
                ],
                'alternative.e' => [
                    'alternative' => $request->input('alternative.e'),
                    "correct_alternative" => $request->input('correct_alternative') === 'e' ? true : false,
                    'question_id' => $questionCreated['id']
                ]
            ];
            foreach ($alternatives as $key => $alternative) {
                if (!$alternative['alternative']) {
                    unset($alternatives[$key]);
                }
            }
            $alternativesCreated = $questionCreated->alternatives()->createMany($alternatives);
            if (!$alternativesCreated) {
                throw new Exception("Ocorreu um erro ao criar as alternativas", 2);
            }

            $exam = Exams::find($question['exam_id']);
            $remaining_points = 0;
            if ($exam['remaining_points']) {
                $remaining_points = $exam['remaining_points'] - $question['points'];
            } else {
                $remaining_points = $exam['points'] - $question['points'];
            }
            $examUpdated = $exam->update(['remaining_points' => $remaining_points]);
            if (!$examUpdated) {
                throw new Exception("Ocorreu um erro ao interno", 3);
            }

            return redirect()->back()->with(['success', 'Questão criada com sucesso']);
        } catch (Exception $error) {
            return redirect()->back()->withErrors(['error' => $error->getMessage()]);
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
