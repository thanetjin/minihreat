<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KanBanController extends Controller
{
    public function index(Event $event)
    {
        return view('kanbans.index',[
            // 'tasks_Todo' => Task::where('type','todo')->get(),
            // 'tasks_Inprocess' => Task::where('type','inProgress')->get(),
            // 'tasks_Done' => Task::where('type','done')->get(),
            'user' => User::find(2),
            // 'user' => Auth::user(),
            'event' => $event
        ]);
    }
public function store(Request $request,Event $event)
    {
        
        
        // $event = Auth::event();
        $task = new Task();
        $task->name = $request->name;
        $task->type = $request->type;

        // $task->event_id = 1;
        // $task->save();

        $task->event_id = $event->id;
        $task->save();

        // $task->event_id = $event
        //$artist->songs()->save($song);

        // $event->tasks()->save($task);
        // return redirect()->route('kanbans.index', ['event' => $event]);
        return redirect()->back();
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
        $kanban->save();
        return redirect()->back();
    }
    public function destroy(Task $kanban)
    {
        $kanban->delete();
        return redirect()->back();
    }
    public function handleChangeUser(Request $request,User $member)
        {
            if($member->is_available){
                $member->is_available = false;
            }else{
                $member->is_available = true;
            }
            $member->save();            
        }
        public function changeStatus(Event $event)
        {
            $event->status = true;
            $event->save();
            return redirect()->route('user.index');
        }
        public function terminate(User $user): RedirectResponse {
            $user->terminate();
            return redirect()->route('user.index');
    
    
            // return to_route('user.index')
            //     ->with('status', 'ได้ทำการคืนเครื่องมือเป็นที่เรียบร้อยแล้ว');
        }
}
