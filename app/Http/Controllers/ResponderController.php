<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Responder;
use App\Answer;
use App\Survey;

class ResponderController extends Controller
{
    public function ViewSurvey($id) {
//        $res = Responder::with("Answers")->where('survey_id', $id)->get();
//        return response()->json($res);
        $survey = Survey::with(
            'Sections',
            'Sections.Questions',
            'Sections.Questions.Choices',
            'Sections.Questions.Choices.Answers',
            'Sections.Questions.Answers',
            'Responders',
            'Responders.Answers'
        )
            ->where('id', $id)
            ->first();
        return view('responder.list')->with('survey',$survey);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $responder = new Responder();
        $responder->survey_id = $input['survey_id'];
        $responder->save();

            foreach ($input['sections'] as $section_id => $questions) {
                foreach ($questions as $question_id => $choices) {
                    foreach ($choices as $key => $id) {
                        if(is_array($id)) {
                            foreach ($id as $cid) {
                                $answer = new Answer();
                                $answer->question_id = $question_id;
                                $answer->responder_id = $responder->id;
                                $c_id = (int)str_replace(' ', '', $cid);
                                $answer->choice_id = $c_id;
                                $answer->save();
                            }
                        } else {
                            $answer = new Answer();
                            $answer->question_id = $question_id;
                            $answer->responder_id = $responder->id;
                            if($key == 'text') {
                                $answer->answer = $id;
                            } else {
                                $cid = (int)str_replace(' ', '', $id);
                                $answer->choice_id = $cid;
                            }
                            $answer->save();
                        }
                    }

                }
            }


        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
