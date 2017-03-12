@extends('layouts.app')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-sm-6 radius" style="background-color:#F2E9D0; ">

            <h1>{{ $survey->title }}</h1>
            <p>{{ $survey->description }}</p>
            <hr>
            @foreach($survey->sections as $section)
                <h3>{{ $section->name }}</h3>
                <ul>
                    @foreach($section->questions as $question)
                        <li>{{ $question->title }}</li>
                        <ul>
                            @foreach($question->choices as $choice)
                                <li>{{ $choice->text }} <span class="badge">{{ count($choice->answers) }}</span></li>
                            @endforeach
                            @if($question->type == 'text')
                                @foreach($question->answers as $answer)
                                    <li>{{ $answer->answer }}</li>
                                @endforeach
                            @endif
                        </ul>
                    @endforeach
                </ul>
            @endforeach
            <hr>
                จำนวนผู้ตอบแบบสอบถาม : <span class="badge">{{ count($survey->responders) }}</span> ท่าน
                <button type="button" class="btn btn-default " data-toggle="collapse" data-target="#demo" >
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
                <div id="demo" class="collapse">
            @foreach($survey->responders as $key => $responder)
                <div>{{ $key + 1 }}. {{ $responder->created_at }}</div>
            @endforeach
                </div></div>




            <div class="col-sm-6">

            </div>
        </div>
    </div>

@endsection