@extends('layouts.app2')
@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="row">
                    <!-- Start to do list -->
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tasks</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <button class="btn btn-success btn-block btn-sm">
                                                <i class="fa fa-plus-circle"></i>&nbsp;
                                                Back to home page
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div id="wizard" class="form_wizard wizard_horizontal">

                                    <div id="step-1">
                                        @if(!empty($projects))
                                            <form class="form-horizontal form-label-left"  method="post" action="{{ route('home.create_tasks') }}" >
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <label>Please select the project to attach task: </label>
                                                        <select name="project_id" id="project_id" class="form-control" required>
                                                            @foreach($projects as $project )
                                                                <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <input type="text" id="task" required="required" placeholder="Enter the task ..." name="task" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <button class="btn btn-block btn-primary btn-sm" type="submit">add Task</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <form class="form-horizontal form-label-left"  method="post" action="{{ route('home.update_task', $task->id) }}" >
                                                @csrf
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <label>Update the task: </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <input type="text" id="task" required="required" placeholder="Enter the task ..." name="task" value="{{ $task->task_name }}" class="form-control ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6 col-sm-6 mr-4">
                                                        <button class="btn btn-block btn-primary btn-sm" type="submit">update Tasks</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                                <!-- End SmartWizard Content -->
                            </div>
                        </div>
                    </div>
                    <!-- End to do list -->
                </div>
            </div>
        </div>
    </div>
@endsection
