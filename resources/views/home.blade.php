@extends('layouts.app2')
@section('content')
    <script>
        var dragging = null;

        document.addEventListener('dragstart', function(event) {
            dragging = event.target;
            event.dataTransfer.setData('text/html', dragging);
        });

        document.addEventListener('dragover', function(event) {
            event.preventDefault();
        });

        document.addEventListener('dragenter', function(event) {
            event.target.style['border-bottom'] = 'solid 4px blue';
        });

        document.addEventListener('dragleave', function(event) {
            event.target.style['border-bottom'] = '';
        });

        document.addEventListener('drop', function(event) {
            event.preventDefault();
            event.target.style['border-bottom'] = '';
            event.target.parentNode.insertBefore(dragging, event.target.nextSibling);
        });
    </script>

    <!-- language: lang-html -->
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Tasks</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    @if(count($tasks) >= 1)
                                        <li>
                                            <a href="{{ route('home.add_tasks') }}">
                                                <button class="btn btn-success btn-block btn-sm">
                                                    <i class="fa fa-plus-circle"></i>&nbsp;
                                                    Add Tasks
                                                </button>
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ route('home.add_project') }}">
                                            <button class="btn btn-danger btn-block btn-sm">
                                                <i class="fa fa-plus-circle"></i>&nbsp;
                                                Add Project
                                            </button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home.projects') }}">
                                            <button class="btn btn-primary btn-block btn-sm">
                                                <i class="fa fa-eye"></i>&nbsp;
                                                View Projects
                                            </button>
                                        </a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="">
                                    <ul class="to_do">
                                        @if(count($tasks) >= 1)
                                            @foreach($tasks as $task)
                                                <li draggable="true" class="">
                                                    {{ $task->task_name }}
                                                    <span class="float-right">
                                                        <a href="{{ route('home.view_task',$task->id) }}">
                                                            <button class="btn btn-outline-danger btn-sm mb-12">UPDATE</button>
                                                        </a>
                                                        <a href="{{ route('home.delete_task', $task->id) }}">
                                                            <button class="btn btn-outline-success btn-sm mb-12">DELETE</button>
                                                        </a>
                                                    </span>
                                                </li>
                                            @endforeach
                                        @else
                                            <p>No project and tasks available. Click right up corner to add</p>
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
