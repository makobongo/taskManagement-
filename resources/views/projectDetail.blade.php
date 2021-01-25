@extends('layouts.app2')
@section('content')
{{--    <script>--}}
{{--        var dragging = null;--}}

{{--        document.addEventListener('dragstart', function(event) {--}}
{{--            dragging = event.target;--}}
{{--            event.dataTransfer.setData('text/html', dragging);--}}
{{--        });--}}

{{--        document.addEventListener('dragover', function(event) {--}}
{{--            event.preventDefault();--}}
{{--        });--}}

{{--        document.addEventListener('dragenter', function(event) {--}}
{{--            event.target.style['border-bottom'] = 'solid 4px blue';--}}
{{--        });--}}

{{--        document.addEventListener('dragleave', function(event) {--}}
{{--            event.target.style['border-bottom'] = '';--}}
{{--        });--}}

{{--        document.addEventListener('drop', function(event) {--}}
{{--            event.preventDefault();--}}
{{--            event.target.style['border-bottom'] = '';--}}
{{--            event.target.parentNode.insertBefore(dragging, event.target.nextSibling);--}}
{{--        });--}}
{{--    </script>--}}

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
                                        <li>
                                            <a href="{{ route('home.add_tasks') }}">
                                                <button class="btn btn-success btn-block btn-sm">
                                                    <i class="fa fa-plus-circle"></i>&nbsp;
                                                    Add Tasks
                                                </button>
                                            </a>
                                        </li>
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
                                            @foreach($projectDetail as $project)
                                                <li class="">
                                                    <h2>Project Name: {{ $project->project_name }}</h2>
                                            <li class="">
                                                <h2>Tasks</h2>
                                                <?php $num=1;?>
                                                @foreach($project->task as $p)
                                                    <p>{{ $num++ }}&nbsp;{{ $p->task_name }}</p>
                                                @endforeach
                                                </li>
                                            @endforeach
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
