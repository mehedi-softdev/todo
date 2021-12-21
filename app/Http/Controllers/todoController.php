<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class todoController extends Controller
{
    // home page
    public function home()
    {
        return view("todo");
    }

    // adding to database
    public function store(Request $request)
    {
        
    //    return response("hello", 200);

        $validate = $request->validate([
            'todo_item' => 'required',
        ]);
        // storing to db
        todo::create([
            'todo_item' => $validate['todo_item'],
        ]);
        
        return with([
            'todo' => todo::all(), 
        ]);
    }

    // returns all data
    public function getList()
    {
        return with([
            'todo' => todo::all(),
        ]);
    }
    
    //delete an item
    public function delete($id) {
        $todo = todo::find($id);
        $todo->delete();
        // after deleting successfully
        return redirect()->route("home");
    }

    // update an item
    public function update(Request $request, $id) {
        $todo = todo::find($id);
        $validate = $request->validate([
            'todo_item' => 'required',
        ]);
        $todo->todo_item = $validate['todo_item'];
        $todo->save();
        return redirect()->route("home");        
    }

}
