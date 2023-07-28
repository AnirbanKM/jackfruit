<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $r)
    {
        if (Auth::check()) {

            $task = Task::where('user_id', auth()->user()->id);

            if (isset($r->search) && $r->search != "") {
                $task = $task->where('name', 'like', '%' . $r->search . '%');
            }

            if (isset($r->status) && $r->status != "") {
                $task = $task->where('status', 'like', '%' . $r->status . '%');
            }

            if (isset($r->priority) && $r->priority != "") {
                $task = $task->where('is_prioritized', 'like', $r->priority);
            }

            $task = $task->orderBy('id', 'desc')->paginate(25)->withQueryString();

            return view('frontend.pages.home')->with(['task' => $task]);
        }
        return view('frontend.pages.home');
    }
}
