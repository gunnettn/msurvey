@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
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
                                <li>{{ $choice->text }} <strong>({{ count($choice->answers) }})</strong></li>
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
            จำนวน : {{ count($survey->responders) }} คน
            @foreach($survey->responders as $key => $responder)
                <div>{{ $key + 1 }}. {{ $responder->created_at }}</div>
            @endforeach
        </div>
    </div>

@endsection