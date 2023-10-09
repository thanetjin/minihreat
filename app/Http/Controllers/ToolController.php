<?php



namespace App\Http\Controllers;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class ToolController extends Controller
{
    public function index(): View {
        $user = Auth::user();
        return view('tools.index', ['user' => $user,'tools' => Tool::all()]);
    }
    public function edit(Tool $tool): View {
        $user = Auth::user();        
        return view('tools.edit', ['user' => $user,'tool' => $tool]);
    }
    public function update(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'copies' => 'required',
        ]);
        $tool = Tool::find($id);
        $tool->name = $request->name;
        $tool->description = $request->desc;
        $tool->copies = $request->copies;
        $tool->save();
        return redirect()->route('tools.index')->with('success','เครื่องมือได้เปลี่ยนแปลงเรียบร้อนแล้ว');
    }
}
