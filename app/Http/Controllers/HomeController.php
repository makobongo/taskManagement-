<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use mysql_xdevapi\Exception;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('home', ['tasks' => $tasks]);
    }

    /**
     * @return Application|Factory|View
     */
    public function addTasks()
    {
        $projects = Project::latest()->get();
        return view('addTasks', ['projects' => $projects]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function createTasks(Request $request)
    {
        Task::create([
            'task_name' => $request->get('task'),
            'project_id' => $request->get('project_id')
        ]);
        $tasks = Task::latest()->get();
        return view('home', ['tasks' => $tasks]);
    }

    public function addProject()
    {
        return view('addProjects');
    }

    public function createProjects(Request $request)
    {
        Project::create([
            'project_name' => $request->project,
            'user_id' => Auth::id()
        ]);
        $projects = Project::latest()->get();
        return view('projects', ['projects' => $projects]);
    }

    public function allProjects()
    {
        $projects = Project::latest()->get();
        return view('projects',['projects' => $projects]);
    }

    public function deleteProject(Request $request)
{
    Project::find($request->id)->delete();
    $projects = Project::latest()->get();
    return view('projects', ['projects' => $projects]);
}
    public function viewTask($id)
    {
        $task = Task::find($id);
        return view('addTasks', ['task' => $task]);
    }
    /**
     * @param Request $request
     * @return Application|Factory|RedirectResponse|View
     */
    public function deleteTask(Request $request)
    {
        Task::find($request->id)->delete();
        $tasks = Task::latest()->get();
        return view('home', ['tasks' => $tasks]);
    }
    public function viewProject($id)
{
    $project = Project::find($id);
    return view('addProjects', ['project' => $project]);
}

    public function updateTask($id)
    {
        $task = Task::findOrFail($id);
        $task->fill(['task_name'=> request()->task ])->save();
        $tasks = Task::latest()->get();
        return view('home', ['tasks' => $tasks]);

    }
    public function updateProject($id)
{
    $project = Project::findOrFail($id);
    $project->fill(['project_name'=> request()->project_name ])->save();
    $projects = Project::latest()->get();
    return view('projects', ['projects' => $projects]);

}
public function detailsProject($id)
{
    $projectDetail = Project::where('id', $id)->with("task")->get();
    return view('projectDetail', ['projectDetail' => $projectDetail]);
}
}
