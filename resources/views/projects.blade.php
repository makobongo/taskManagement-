@extends('layouts.app2')
@section('content')
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Projects</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    @if(count($projects) >= 1)
                                        <li>
                                            <a href="{{ route('home.add_tasks') }}">
                                                <button class="btn btn-success btn-block btn-sm">
                                                    <i class="fa fa-plus-circle"></i>&nbsp;
                                                    Add Tasks
                                                </button>
                                            </a>
                                        </li>
                                    @else
                                    &nbsp;
                                    <li>
                                        <a href="{{ route('home.add_project') }}">
                                            <button class="btn btn-danger btn-block btn-sm">
                                                <i class="fa fa-plus-circle"></i>&nbsp;
                                                Add Project
                                            </button>
                                        </a>
                                    </li>
                                    @endif
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <ul class="to_do">
                                        @if(count($projects) >= 1)
                                            @foreach($projects as $project)
                                                <li class="">
                                                    {{ $project->project_name }}
                                                    <span class="float-right">
                                                        <a href="{{ route('home.view_project_details', $project->id) }}">
                                                            <button class="btn btn-outline-warning btn-sm mb-12">VIEW IN DETAILS</button>
                                                        </a>
                                                        <a href="{{ route('home.view_project',$project->id) }}">
                                                            <button class="btn btn-outline-danger btn-sm mb-12">UPDATE</button>
                                                        </a>
                                                        <a href="{{ route('home.delete_project', $project->id) }}">
                                                            <button class="btn btn-outline-success btn-sm mb-12">DELETE</button>
                                                        </a>
                                                    </span>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No projects available. Click right up corner to add</p>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
