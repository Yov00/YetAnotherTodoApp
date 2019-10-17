@extends('layouts.app')

@section('content')
  
            
        <h1 class="text-center">
         results: {{count($todo)}}
        </h1>
        @if(count($todo)>0)
        <div class="row justify-content-center">
            <div class="col-md-6">
        @foreach($todo as $todoItem)
        
        <div class="card card-default  my-2">
                <div class="card-header">
                {{$todoItem->name}}
                </div>
                <div class="card-body">
                    {{$todoItem->description}}
                    <div class="col-md-12 py-2">
                    <a href="/todos/{{$todoItem->id}}" class="btn btn-info w-30 float-right">
                        View
                    </a>
                    </div>
                </div>
            </div>
        @endforeach
             </div>
           </div>
       @else
       <div class="row justify-content-center">
            <div class="col-md-6">
           <div class="alert-info text-center">
               There are no tasks with that name
           </div>
            </div>
       </div>

       @endif
       
  
@endsection