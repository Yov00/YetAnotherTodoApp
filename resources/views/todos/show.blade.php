@extends('layouts.app')


@section('content')
    
   
        <h1 class="text-center my-5">
          {{$todo->name}}
        </h1>
        
      <div class="row justify-content-center">
          <div class="col-md-6">
                <div class="card card-default">
                        <div class="card-header">
                            Details
                        </div>
                        <div class="card-body">
                            {{$todo->description}}
                            <div class="col-md-12">
                            <div class="row justify-content-end">
                             
                                   
                                    <div class="col-md-5" style="display:flex;justify-content:space-evenly;padding:0;">
                                     
                                                    <a href="/todos/{{$todo->id}}/edit" class="btn btn-info float-right">Edit</a>
                                         
                                        <form action="/todos/{{$todo->id}}/delete" method="POST">
                                            {{ method_field('DELETE')}}
                                            @csrf
                                            <button type="submit" class="btn btn-dark float-right">Delete</button>
                                        </form>
                                    </div>
                          
                               
                            </div>
                        </div>
                        </div>
                       
                    </div>
          </div>
      </div>
   

 @endsection