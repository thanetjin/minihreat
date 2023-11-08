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

        $owner = $event->user_id;        
        $user = Auth::user();
        return view('kanbans.index',[            
            'user' => $user,            
            'event' => $event,
            'owner' => User::find($owner)               
            
        ]);
    }
    public function create(Event $event)
    {
        $user = Auth::user();
        return view('kanbans.create',[
            
            // 'tasks_Todo' => Task::where('type','todo')->get(),
            // 'tasks_Inprocess' => Task::where('type','inProgress')->get(),
            // 'tasks_Done' => Task::where('type','done')->get(),
            'user' => $user,
            // 'user' => Auth::user(),
            'event' => $event
        ]);
    }
public function store(Request $request,Event $event)
    {
        // $user = Auth::user();
        // $request->validate([
        //     'name' => 'required',
        //     'role' => 'required',            
        // ]);
        // $task = new Task();
        // $task->name = $request->name;
        // $task->type = $request->role;        
        // $checkbox_data = $request->input("duty");
        // $task->checklist = implode(',',$checkbox_data);
        // $task->event_id = $event->id;
        // $task->save();
        // return redirect()->route('kanbans.index',['user' => $user,            
        // 'event' => $event])->with('success','คุณได้ทำการสร้างฟอร์มเรียบร้อยแล้ว!');
        // error_log('Some message here.');


        // {{-- @if ($user->duty === "eletricalEngineer","fireman","chemicalEngineer"
        $user = Auth::user();        
        $task = new Task();
        $task->event_id = $event->id;
        $task->role = "eletricalEngineer";        
        $task->save();

        $task = new Task();
        $task->event_id = $event->id;
        $task->role = "fireman";
        $task->save();

        $task = new Task();
        $task->event_id = $event->id;
        $task->role = "chemicalEngineer";
        $task->save();
    
        // $task->name = $user->name;
        // $task->type = $user->role;        
        // $checkbox_data = $request->input("duty");
        // $task->checklist = implode(',',$checkbox_data);
        // $task->event_id = $event->id;
        
        return redirect()->route('kanbans.index',['user' => $user,            
        'event' => $event])->with('success','คุณได้ทำการสร้างฟอร์มเรียบร้อยแล้ว!');
        error_log('Some message here.');


        
    }
    // public function edit(Event $event,Task $task)
    // {
    //     return view('kanbans.edit',compact('task'));        
    // }
    // public function edit(Tool $tool): View {
    //     $user = Auth::user();        
    //     return view('tools.edit', ['user' => $user,'tool' => $tool]);
    // }
    public function change($id,Task $task)
    {
        
        $user = Auth::user();
        return view('kanbans.change',[            
            'user' => $user,                        
            'task' => $task,
            'event' => Event::find($id)        
        ]);
    }
    public function handleChange(Event $event,Request $request,$id)
    {
        $user = Auth::user();        
        $task = Task::find($id);
        // $task->name = $user->name;
        // $task->type = $user->role;        
        $checkbox_data = $request->input("duty");
        $task->checklist = implode(',',$checkbox_data);        
        
        if ($request->has('desc')) {            
            $task->desc = $request->desc;
        }
        $task->save();
        return redirect()->route('kanbans.index',['event'=>$event,'user' => $user])->with('success','คุณได้ทำการแก้ไขฟอร์มเป็นที่เรียบร้อยแล้วครับ!');
    }
    public function storeLeaderDesc(Event $event,Request $request)
        {            
            $user = Auth::user();   
            
            // $event => Event::find($id);
            // $task = Task::find($id);
            $event->desc_lead = $request->desc_lead;
            $event->save();
            return redirect()->route('kanbans.index',['event'=>$event,'user' => $user])->with('success','คุณได้ทำการเพิ่มคำอธิบายเป็นที่เรียบร้อยแล้วครับ!');
        }
    public function update(Task $task)
    {

        // if($request->get('todo')) {
        //     $kanban->type = $request->get('todo'); 
        // }
        // else if($request->get('inProgress')) {
        //     $kanban->type = $request->get('inProgress'); 
        // }
        // else if($request->get('done')) {
        //     $kanban->type = $request->get('done'); 
        // }
        // $kanban->save();
        return redirect()->route('user.index');
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
            return redirect()->route('user.index')->with('success','คุณได้ทำการยืนยันแบบฟอร์มสำหรับการตรวจงานเสร็จสิ้นแล้ว!');
        }
        public function terminate(User $user): RedirectResponse {
            $user->terminate();
            return redirect()->route('user.index');
    
    
            // return to_route('user.index')
            //     ->with('status', 'ได้ทำการคืนเครื่องมือเป็นที่เรียบร้อยแล้ว');
        }
}
