@extends('layouts.home')

@section('index')
  <div class="companies">
    @foreach($companies as $company)
    <div class="card">
      <div class="card-body clearfix">
        <div class="d-flex flex-row bd-highlight mb-3">
          <div>
            <h3>{{ $company->name}}</h3>
            <p>{{ $company->description}}</p>
          </div>
          <ul class="d-flex flex-column">
            <li class="first">Big</li>
            <li class="second">British</li>
            <li class="third">Premium</li>
          </ul>
        </div>
        
        <button type="button" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary">Delete</button>
        <button type="button" class="btn btn-primary float-right">Add Tag</button>
      </div>
    </div>
    @endforeach
  </div>
  
  

@endsection