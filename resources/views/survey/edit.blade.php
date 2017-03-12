@extends('layouts.app')

@section('content')


    <div class="container">
        <form class="" action="{{action('SurveyController@update',['s_id'=>$value->s_id])}}"method="post"
            accept-chaset="UTF-8">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4></h4></div>

                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="row">

                                    <form>
                                        <div class="form-group">
                                            <label for="s_title">หัวข้อแบบสอบถาม :</label>
                                            <input type="text" class="form-control" name="s_title" id="s_title"
                                                   placeholder="หัวข้อแบบสอบถาม" value="{{$value->s_title}}" required="required">
                                            <label for="s_description">คำอธิบาย :</label>
                                            <textarea class="form-control" rows="5" name="s_description" id="s_description"
                                                      value="{{$value->s_description}}" placeholder="คำอธิบายเกี่ยวกับแบบสอบถาม"
                                                      required="required"></textarea>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-default">แก้ไข</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection