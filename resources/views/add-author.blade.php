@extends('layouts.master')
@section('forms')
<div class="container">
    @if(session('status'))
        @if(session('status')==0)
            <div class="alert alert-danger">User could not be added </div>
        @endif
        @if(session('status')==1)   
            <div class="alert alert-success">User successfully added </div>
        @endif 
    @endif 

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/author/doAddauthor" method='POST'>
        @csrf
        <div class="form-group">
            <label for="authorName">Name of the Author</label>
            <input type="text" class="form-control" id="authorName" name='authorName'>
        </div>
        <div class="form-group">
            <label for="authorDescription">Description (optional):</label>
            <textarea class="form-control" rows="5" id="authorDescription" name='authorDescription'></textarea>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection