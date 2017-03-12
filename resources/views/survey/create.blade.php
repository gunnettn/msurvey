@extends('layouts.app')

@section('content')


<div class="container">
    <form class="" action="{{action('SurveyController@store')}}"method="post">
        {{csrf_field()}}
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#E79E85;"><h4>สร้างแบบสอบถาม</h4></div>

                <div class="panel-body">
                    <div class="container-fluid" ng-controller="TodoListController">
                        {{--<h1>Hello World!</h1>--}}
                        {{--<p>Resize the browser window to see the effect.</p>--}}
                        <div class="row">

                            <form>
                                <div class="form-group">
                                    <label for="s_title" >หัวข้อแบบสอบถาม :</label>
                                    <input type="text" class="form-control" name="s_title" id="s_title" placeholder="หัวข้อแบบสอบถาม" value="" ng-model="survey.title">
                                    <label for="s_description">คำอธิบาย :</label>
                                    <textarea class="form-control" rows="5" name="s_description" id="s_description"  value="" placeholder="คำอธิบายเกี่ยวกับแบบสอบถาม" ng-model="survey.description"></textarea>
                                </div>
                                <div class="section-container " ng-repeat="section in survey.sections">
                                    <input type="text" ng-model="section.name">
                                    <button type="button" class="btn btn-danger" ng-click="removeSection(survey.sections, $index)">ลบ</button>
                                    <hr>
                                    <div class="question-container" ng-repeat="question in section.questions">
                                        @{{ $index + 1 }}. <input type="text" ng-model="question.title">
                                        <select ng-model="question.type">
                                            <option value="text">ข้อความ</option>
                                            <option value="radio">คำตอบเดียว</option>
                                            <option value="checkbox">หลายคำตอบ</option>
                                            <option value="select">ตัวเลือก</option>
                                        </select>
                                        <hr>
                                        <div class="choice-container" ng-show="question.type != 'text'" ng-repeat="choice in question.choices">
                                            <input type="text" ng-model="choice.text">
                                            <button type="button" class="btn btn-danger btn-xs" ng-click="removeChoice(question, $index)"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        </div>
                                        <button type="button" class="btn btn-success" ng-show="question.type != 'text'" ng-click="addChoice(question)">เพิ่มตัวเลือก</button>
                                        <button type="button" class="btn btn-danger " ng-click="removeQuestion(section.questions, $index)">ลบคำถาม</button>
                                    </div>
                                    <hr>
                                    <div class="actions-group">
                                        <button type="button" class="btn btn-default" ng-click="addQuestion(section.questions, $index)">เพิ่มคำถาม</button>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-info" ng-click="addSection(survey.sections)">เพิ่มส่วน</button>
                                <br> <br>
                                <button type="button" name="button" class="btn btn-success btn-lg" ng-show="type == 'add'" ng-click="sendSurvey()">สร้าง</button>
                                <button type="button" name="button" class="btn btn-success btn-lg" ng-show="type == 'edit'" ng-click="editSurvey()">แก้ไข</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    angular.module('myApp', [])
        .controller('TodoListController', function($scope, $http) {

            @if(isset($survey))
                $scope.type = 'edit';
                $scope.survey = {!! json_encode($survey) !!}
            @else
                $scope.type = 'add';
                $scope.survey = {
                    'title': '',
                    'description': '',
                    'sections': [
                        {
                            'name': 'Section 1',
                            'questions': []
                        }
                    ]
                };
            @endif

            $scope.addSection = function (sections) {
                sections.push({
                    'name': 'Section ' + (sections.length + 1),
                    'questions': []
                });
            };

            $scope.removeSection = function (sections, index) {
                if (index > -1) {
                    sections.splice(index, 1);
                }
            };

            $scope.addQuestion = function (questions, index) {
                questions.push({
                    'title': 'คำถาม ?',
                    'choices': [],
                    'type': 'checkbox'
                });
            };

            $scope.removeQuestion = function (questions, index) {
                if (index > -1) {
                    questions.splice(index, 1);
                }
            };

            $scope.addChoice = function (question) {
                question.choices.push({
                    'text': 'choice'
                });
            };

            $scope.removeChoice = function (question, index) {
                if (index > -1) {
                    question.choices.splice(index, 1);
                }
            };

            $scope.sendSurvey = function () {
                $http.post('/survey', $scope.survey).then(function(response) {
                    console.log(response);
                    window.location.href = '/survey';
                });
            };

            $scope.editSurvey = function () {
                $http.put('/survey/' + $scope.survey.id, $scope.survey).then(function(response) {
                    console.log(response);
                    window.location.href = '/survey';

                });
            };
        });
</script>

@endsection