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
}
