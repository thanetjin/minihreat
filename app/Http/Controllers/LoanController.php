<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator as ValidatorFacade;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class LoanController extends Controller
{
    //         ->loans()
    //         ->where('is_returned', false)
    //         ->get();
    public function index(): View {
        $user = Auth::user();        
        // return view('loans.index', ['loans' => Auth::user()->activeLoans]);
        return view('loans.index', ['user' => $user,'loans' => Auth::user()->loans->where('is_returned', false)->all()]);
        
    }
    public function store(Tool $tool, Request $request): RedirectResponse {
        $validator = ValidatorFacade::make($request->all(), [
            'number_borrowed' => 'required|int',
            'return_date'     => 'required',
        ]);


        $validator->after(function (Validator $validator) use ($tool) {
            $numberBorrowed = $validator->safe()->number_borrowed;
            $availableCopies = $tool->availableCopies();
            if ($numberBorrowed > $availableCopies) {
                $validator->errors()->add(
                    'number_borrowed',
                    "คุณไม่สามารถยืมได้มากกว่า {$availableCopies}"
                );
            }
        });


        if ($validator->fails()) {
            return to_route('loans.create', ['tool' => $tool])
                ->withErrors($validator)
                ->withInput();
        }


        $loanDetails = $validator->safe()->only([
            'number_borrowed',
            'return_date',
        ]);


        // $loanDetails['tool_id'] = $tool->id;
        $loanDetails['tool_id'] = $tool->id;
        $loanDetails['user_id'] = Auth::user()->id;


        Loan::create($loanDetails);


        return to_route('loans.index')
            ->with('status', 'Book borrowed successfully');
    }


    public function create(Tool $tool): View {
        $user = Auth::user();        
        return view('loans.create', ['user' => $user,'tool' => $tool]);
    }
    public function edit(Tool $tool): View {
        $user = Auth::user();        
        return view('loans.edit', ['user' => $user,'tool' => $tool]);
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


    public function terminate(Loan $loan): RedirectResponse {
        $loan->terminate();


        return to_route('loans.index')
            ->with('status', 'ได้ทำการคืนเครื่องมือเป็นที่เรียบร้อยแล้ว');
    }
    public function showLoaner(){
        
    }
    
        


}
