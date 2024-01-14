<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function store(Request $request)
    {
        $todo = new Todo();

        $todo->content = $request->get('task');
        $todo->save();
        return redirect()->route('main');
    }
}
