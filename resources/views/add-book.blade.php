@extends('layouts.master')
@section('content')
    <div class="container">
        @if(session('status'))
            @if(session('status')==0)
                <div class="alert alert-danger">Book could not be added </div>
            @endif
            @if(session('status')==1)   
                <div class="alert alert-success">Book successfully added </div>
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

        <form action="/books/doAddbook" method='GET'>
            @csrf
            <div class="form-group">
                <label for="bookName">Name of the Book</label>
                <input type="text" class="form-control" id="bookName" name='bookName'>
            </div>
            <div class="form-group">
            <label for="authors">Author of the Book</label>
            <select multiple name="authors[]" class="form-control" id="authors">
                @foreach($authors as $author)
                    <option value="{{$author['id']}}">{{$author['authorName']}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
            <label for="publisher">Name of the Publisher</label>
            <select multiple name="publisher" class="form-control" id="publisher">
                @foreach($publishers as $publisher)
                    <option value="{{$publisher['id']}}">{{$publisher['publisherName']}}</option>
                @endforeach
            </select>
            </div>
            <div class="form-group">
                <label for="bookDescription">Description (optional):</label>
                <textarea class="form-control" rows="5" id="bookDescription" name='bookDescription'></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection