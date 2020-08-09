@extends('layouts.home')

@section('content')
  <div class="container">
    @if(Auth::check())
      <div class="card w-75 mx-auto">
        <div class="card-header">
          <h1>Edit Company</h1>
        </div>
        <div class="card-body clearfix">
          <form action="{{ url('company', $company->id) }}" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input class="form-control" type="text" id="name" name="name" value="{{ $company->name }}">
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" rows="2" id="description" name="description">{{ $company->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
          </form>
        </div>
      </div>
    @else
      <h3>You must be logged in to add a company.</h3>
    @endif 
  </div>
@endsection