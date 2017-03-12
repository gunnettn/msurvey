<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App;
use App\Survey;
use App\Section;
use App\Question;
use App\Choice;

use App\Http\Requests;
class SurveyController extends Controller
{
    public function filter(Request $request) {
        $input = $request->all();
        $survey = Survey::where('title', 'like', '%' . $input['keyword'] . '%')->get();

        return view('survey.index')->with('survey',$survey);
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices'
        )->get();
        return view('survey.index')->with('surveys',$surveys);
//        return response()->json($surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('survey.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $survey = new Survey;
//        $survey->s_title = $request->s_title;
//        $survey->s_description = $request->s_description;
//        $survey->save();
//        return redirect()->route('survey.index');
        $input = $request->all();

        $survey = new Survey();
        $survey->title = $input['title'];
        $survey->description = $input['description'];
        $survey->save();

        foreach ($input['sections'] as $section) {
            $sect = new Section();
            $sect->name = $section['name'];
            $sect->survey_id = $survey['id'];
            $sect->save();

            foreach ($section['questions'] as $question) {
                $quest = new Question();
                $quest->title = $question['title'];
                $quest->type = $question['type'];
                $quest->section_id = $sect['id'];
                $quest->save();

                foreach ($question['choices'] as $choice) {
                    $ch = new Choice();
                    $ch->text = $choice['text'];
                    $ch->question_id = $quest['id'];
                    $ch->save();
                }
            }
        }

        $survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices'
        )->get();
        return response()->json($survey);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices'
        )
            ->where('id', $id)
            ->first();
        return view('survey.view')->with('survey',$survey);
//        return response()->json($survey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices'
        )
            ->where('id', $id)
            ->first();
        return view('survey.create')->with('survey',$survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

//        $survey = Survey::find($id);
//        $survey->s_title = $request->s_title;
//        $survey->s_description = $request->s_description;
//        $survey->save();
//        return redirect()->route('survey.index');
        $input = $request->all();

        $survey = Survey::find($id);
        $survey->title = $input['title'];
        $survey->description = $input['description'];
        $survey->save();

        foreach ($input['sections'] as $section) {
            $sect = Section::find($section['id']);
            $sect->name = $section['name'];
            $sect->survey_id = $survey['id'];
            $sect->save();

            foreach ($section['questions'] as $question) {
                $quest = Question::find($question['id']);
                $quest->title = $question['title'];
                $quest->type = $question['type'];
                $quest->section_id = $sect['id'];
                $quest->save();

                foreach ($question['choices'] as $choice) {
                    $ch = Choice::find($choice['id']);
                    $ch->text = $choice['text'];
                    $ch->question_id = $quest['id'];
                    $ch->save();
                }
            }
        }

        $survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices'
        )->get();
        return response()->json($survey);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = Survey::find($id);
        $survey->delete();
        return redirect()->route('survey.index');
    }
}
