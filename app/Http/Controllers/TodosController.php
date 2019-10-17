<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
class TodosController extends Controller
{
   public function index()
   {
        $title = 'Todos Pages';
        $todos = Todo::all();

       return view('todos.index')->with([
           'title'=>$title,
           'todos'=>$todos,
       ]);
   }

   public function show(Todo $todo)
   {
       return view('todos.show')->with([
           'todo'=>$todo,
            'title'=>$todo->name,
           ]);
   }
   
   public function search()
   {
       $search = request('searching');

       $todo =Todo::where('name', 'LIKE', '%'.$search.'%')->get();
      
       return view('todos.search_results')->with([
            'todo'=>$todo,
       ]);
   }
   public function create()
   {
       
    return view('todos.create');
   }

   function complete(Todo $todo)
   {
       $message = '';
       if(!$todo->completed)
       {
         $todo->completed = true;
         $message='Task is completed successfully';
       }
       else{
        $todo->completed = false;
        $message ="Task: ".$todo->id.' is now active!';
       }
       $todo->save();
       session()->flash('success',$message);

       return back();

   }


   function store()
   {

    request()->validate([
    'name'=>'required|unique:todos',
    'description'=>'required'
    ]);

    $todo = Todo::create([
        'name'=>request('name'),
        'description'=>request('description'),
        'completed'=>false,
    ]);
    $todo->save();
    session()->flash('success','Task created successfully.');

    return redirect('/todos');
   }

   function edit(Todo $todo)
   {
        return view('todos.edit')->with('todo',$todo);
   }

    function update(Todo $todo)
    {
        request()->validate([
            'name'=>'required',
            'description'=>'required'
            ]);
        
        $todo->update([
            'name'=>request('name'),
            'description'=>request('description'),
        ]);
        session()->flash('success','Task updated successfully.');
        return redirect('/todos/'.$todo->id);
        
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        session()->flash('success','Task deleted successfully.');
        return redirect('/todos');
    }
   
}
