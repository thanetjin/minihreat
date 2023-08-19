<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;


class KanBanController extends Controller
{
    public function index(Event $event)
    {
        return view('kanbans.index',[
            'tasks_Todo' => Task::where('type','todo')->get(),
            'tasks_Inprocess' => Task::where('type','inProgress')->get(),
            'tasks_Done' => Task::where('type','done')->get(),
            'user' => User::find(2),
            'event' => Event::find($event->id)
        ]);
    }

public function store(Request $request)
    {
        
        
        $task = new Task;
        $task->name = $request->name;
        $task->type = $request->type;
        
        $task->save();
        return redirect()->route('kanbans.index');
        error_log('Some message here.');
        
    }
    public function update(Request $request, Task $kanban)
    {
        if($request->get('todo')) {
            $kanban->type = $request->get('todo'); 
        }
        else if($request->get('inProgress')) {
            $kanban->type = $request->get('inProgress'); 
        }
        else if($request->get('done')) {
            $kanban->type = $request->get('done'); 
        }
        // $kanban->name = $request->get('name'); 
        $kanban->save();
        return redirect()->back();
    }
    public function destroy(Task $kanban)
    {
        $kanban->delete();
        return redirect()->back();
    }
}
