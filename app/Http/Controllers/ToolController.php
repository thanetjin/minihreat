<?php



namespace App\Http\Controllers;
use App\Models\Tool;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class ToolController extends Controller
{
    public function index(): View {
        $user = Auth::user();
        return view('tools.index', ['user' => $user,'tools' => Tool::all(),'loans' => Loan::all()]);
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
    public function show() {
        $user = Auth::user();        
        return view('tools.show', ['user' => $user,'loans' => Loan::all()]);
    }
    public function show2() {
        $user = Auth::user();        
        return view('tools.show2', ['user' => $user]);
    }
    // public function index(): View {
    //     $user = Auth::user();        
    //     // return view('loans.index', ['loans' => Auth::user()->activeLoans]);
    //     return view('loans.index', ['user' => $user,'loans' => Auth::user()->loans->where('is_returned', false)->all()]);
        
    // }
}
