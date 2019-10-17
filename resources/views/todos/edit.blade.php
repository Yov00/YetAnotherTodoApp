@extends('layouts.app')

@section('content')
    <h1 class="text-center mt-5">
        Edit Task
    </h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
           <div class="card card-default">
               <div class="card-header">
                   Specify Info:
               </div>
               <div class="card-body">
                  
               <form action="/todos/{{$todo->id}}/update" method="POST">
                        @csrf
                        {{ method_field('PATCH')}}
                        <div class="form-group">
                            <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$todo->name}}{{old('name')}}">
                            @error('name')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control"   >{{$todo->description}}{{old('description')}}</textarea>
                                 
                                        
                                   
                                @error('description')
                                <div class="alert alert-danger my-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-danger btn-block float-right">
                                Update
                            </button>
                    </form>
               </div>
           </div>
        </div>
    </div>


@endsection