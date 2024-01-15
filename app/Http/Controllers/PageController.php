<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        $todos = Todo::all();
        return view('main')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo();

        $todo->content = $request->get('task');
        $todo->save();
        return redirect()->route('main');
    }

    public function delete($id)
    {
        $model = Todo::find($id);
        $model->delete();
        return redirect()->route('main');
    }
}
