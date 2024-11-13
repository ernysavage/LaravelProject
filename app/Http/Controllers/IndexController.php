<?php

namespace App\Http\Controllers;

use App\Models\Ekzamen;
use App\Models\Predmet;
use App\Models\Student;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekzs = Ekzamen::all();
        $preds = Predmet::all();
        $studs = Student::all();

        return view('main', compact('preds', 'studs', 'ekzs'));
    }

    public function ekzstud(Request $request)
    {
        $preds = Predmet::all();
        $studs = Student::all();

        $ekzs = Ekzamen::where('stud_id', '=', $request->stud)->get();

        return view('main', compact('preds', 'studs', 'ekzs'));
    }

    public function ekzpred(Request $request)
    {
        $preds = Predmet::all();
        $studs = Student::all();

        $ekzs = Ekzamen::where('pred_id', '=', $request->pred)->get();

        return view('main', compact('preds', 'studs', 'ekzs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $preds = Predmet::all();
        $studs = Student::all();

        return view('add', compact('preds', 'studs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pred_id' => ['required'],
            'stud_id' => ['required'],
            'score' => ['required', 'integer', 'min:2', 'max:5']
        ]);

        Ekzamen::create([
            'pred_id' => $request->pred_id,
            'stud_id' => $request->stud_id,
            'score' => $request->score
        ]);

        return redirect()->route('main');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ekzamen $ekz)
    {
        $preds = Predmet::all();
        $studs = Student::all();

        return view('edit', compact('preds', 'studs', 'ekz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ekzamen $ekz)
    {
        $request->validate([
            'pred_id' => ['required'],
            'stud_id' => ['required'],
            'score' => ['required', 'integer', 'min:2', 'max:5']
        ]);

        $ekz->update([
            'pred_id' => $request->pred_id,
            'stud_id' => $request->stud_id,
            'score' => $request->score
        ]);

        return redirect()->route('main');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ekzamen $ekz)
    {
        $ekz->delete();
        return redirect()->route('main');
    }
}
