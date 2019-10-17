@extends('layouts.app')


@section('content')
    
     
 
        <h1 class="text-center my-5">{{$title}}</h1>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
                <div class="card card-default">
                        <div class="card-header">
                            Todos
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($todos as $todo)
                                    <li class="list-group-item"  style="display:flex">
                                   
                                    <form action="/todos/complete/{{$todo->id}}" method="POST" style="flex:2" >
                                        <label class="switch">
                                                @csrf
                                                <input onchange="this.form.submit()" type="checkbox" {{$todo->completed ? 'checked':''}}>
                                                <span class="slider round"></span>
                                        </label>
                                    </form>
                                
                                    <div style="flex:15;text-transform:capitalize;{{$todo->completed ? 'text-decoration: line-through;':''}}">
                                        {{$todo->name}}
                                    </div>
                                    <div style="flex:2;display:flex;justify-content:flex-end;">
                                        <a href="todos/{{$todo->id}}" class="btn btn-primary btn-sm ">
                                                View 
                                        </a>
                                    </div>
                                    
                               
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
        </div>
    </div>
  
   @endsection