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

class LoanController extends Controller
{
    //         ->loans()
    //         ->where('is_returned', false)
    //         ->get();
    public function index(): View {        
        // return view('loans.index', ['loans' => Auth::user()->activeLoans]);
        return view('loans.index', ['loans' => Auth::user()->loans->where('is_returned', false)->get()]);
        
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
                    "You cannot borrow more than {$availableCopies} book(s)"
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


        $loanDetails['tool_id'] = $tool->id;
        $loanDetails['user_id'] = Auth::user()->id;


        Loan::create($loanDetails);


        return to_route('loans.index')
            ->with('status', 'Book borrowed successfully');
    }


    public function create(Tool $tool): View {
        return view('loans.create', ['tool' => $tool]);
    }


    public function terminate(Loan $loan): RedirectResponse {
        $loan->terminate();


        return to_route('loans.index')
            ->with('status', 'Book returned successfully');
    }
    
        


}
