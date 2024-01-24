<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        $todos = Todo::all()->sortByDesc('id');
        return view('main')->with('todos', $todos);
    }

    public function store(Request $request)
    {
        $todo = new Todo();
        $newTask = $request->get('task');
        if ($newTask !== null){
            $todo->content = $request->get('task');
            $todo->save();
        }
        return redirect()->route('main');
    }

    public function edit($id){
        $todos = Todo::all();
        $todo = Todo::find($id);

        return view('main')->with([
            'todo' => $todo,
            'todos' => $todos
        ]);

    }

    public function update(Request $request, $id)
    {
        $model = Todo::find($id);
        $task =  $request->get('task');
        $model->content = $task;
        $model->save();
        return redirect()->route('main');

    }
    public function check($id)
    {
        $model = Todo::find($id);
        if ($model->is_checked)
            $model->is_checked = false;
        else
            $model->is_checked = true;
        $model->save();
        return redirect()->route('main');
    }

    public function delete($id)
    {
        $model = Todo::find($id);
        $model->delete();
        return redirect()->route('main');
    }
}
