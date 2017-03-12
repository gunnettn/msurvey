@extends('layouts.app')

@section('content')


    <div class="container">
        <form action="/survey/filter" method="GET">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
                <br>
            </div>
        </form>
        <div class="row">

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default " >
                    <div class="panel-heading" style="background-color:#E79E85;">แบบสอบถามทั้งหมด</div>



        <table class="table table-striped table table-hover">
            <tr>

                <th>ชื่อแบบสอบถาม</th>
                <th>วันที่สร้าง</th>
                <th></th>
                <th></th>
            </tr>
                @foreach($surveys as $survey)
            <tr>

                <td>{{$survey->title}}</td>
                <td>{{$survey->created_at}}</td>
                <td>
                    <a href="{{url('survey')}}<?php echo '/'.$survey->id.'' ?>" class="btn btn-success">ทำ</a>
                    <a href="{{url('responder')}}<?php echo '/'.$survey->id.'/survey' ?>" class="btn btn-info">สรุป</a>
                    <a href="{{url('survey')}}<?php echo '/'.$survey->id.'/edit' ?>" class="btn btn-warning">แก้ไข</a>
                </td>
                <td>
                    <form class="" action="survey/{{$survey->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE')}}
                        <button type="submit" name="button" class="btn btn-danger">ลบ</button>
                    </form>
                </td>

            </tr>
                @endforeach
        </table>

                </div>
            </div>
                </div>
    </div>

@endsection