<?php



namespace App\Http\Controllers;
use App\Models\Tool;
use App\Models\User;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ToolController extends Controller
{
    public function index(): View {
        $tools = Tool::orderby('created_at','DESC');
        if(request()->has('search')){
            $tools = $tools->where('name', '%' . request()->get('search',''). '%');
        }

        $user = Auth::user();
        // return view('tools.index', ['user' => $user,'tools' => Tool::all(),'loans' => Loan::all()]);
        return view('tools.index', ['user' => $user,'tools' => Tool::paginate(10),'loans' => Loan::paginate(10)]);
    }

    public function edit(Tool $tool): View {
        $user = Auth::user();
        $allUser = User::get();        
        return view('tools.edit', ['user' => $user,'tool' => $tool,'allUser' => $allUser]);
    }
    public function create(): View {
        $user = Auth::user();
        return view('tools.create', ['user' => $user]);
    }
    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'copies' => 'required',
        ]);                
        $tool = new Tool();
        $tool->name = $request->name;
        $tool->description = $request->desc;
        $tool->copies = $request->copies;
        $tool->save();
        return redirect()->route('tools.index')->with('success','คุณได้ทำการเพิ่มเครื่องมือเรียบร้อยแล้ว');
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
        return redirect()->route('tools.index')->with('success','คุณได้แก้ไขเครื่องมือเรียบร้อย');
    }
    public function show() {

    
        $user = Auth::user();       
    
        return view('tools.show', ['user' => $user,'loans' => Loan::all()]);

    }
    
    // public function index(): View {
    //     $user = Auth::user();        
    //     // return view('loans.index', ['loans' => Auth::user()->activeLoans]);
    //     return view('loans.index', ['user' => $user,'loans' => Auth::user()->loans->where('is_returned', false)->all()]);
        
    // }
}
