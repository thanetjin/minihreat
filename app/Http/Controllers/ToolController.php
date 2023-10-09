<?php



namespace App\Http\Controllers;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;


class ToolController extends Controller
{
    public function index(): View {
        return view('tools.index', ['tools' => Tool::all()]);
    }
}
