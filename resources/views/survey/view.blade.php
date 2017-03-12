@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">




    <form action="/responder" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="survey_id" value="{{ $survey->id }}">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="panel-heading">{{ $survey->title }}</h1>

                    <p>{{ $survey->description }}</p>
                    <hr>
                </div>
            </div><div class="panel-body">
            @foreach($survey->sections as $section)
            <div class="row">
                <div class="col-xs-12">
                    <h3>{{ $section->name }}</h3>
                </div>
                @foreach($section->questions as $question)
                    <div class="col-xs-12">
                        <h5>{{ $question->title }}</h5>
                    </div>
                    <div class="col-xs-12">
                        @if($question->type == 'text')
                            <div class="form-group">
                                <input type="text" class="form-control" name="sections[{{ $section->id }}][{{ $question->id }}][text]">
                            </div>
                        @elseif($question->type == 'radio')
                            @foreach($question->choices as $choice)
                                <div class="form-group">
                                    <input type="radio" name="sections[{{ $section->id }}][{{ $question->id }}][choice]" value="{{ $choice->id }}">
                                    <span>{{ $choice->text }}</span>
                                </div>
                            @endforeach
                        @elseif($question->type == 'checkbox')
                            @foreach($question->choices as $choice)
                                <div class="form-group">
                                    <input type="checkbox" name="sections[{{ $section->id }}][{{ $question->id }}][choice][]" value="{{ $choice->id }}">
                                    <span>{{ $choice->text }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
                <hr>
            @endforeach
            </div>
            <button type="submit" class="btn btn-success btn-lg"  data-toggle="modal" data-target="#myModal">ส่ง</button>
        </div>
    </form>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body">
                                    <p>ขอบคุณค่ะ</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection