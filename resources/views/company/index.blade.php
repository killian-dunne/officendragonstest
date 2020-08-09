@extends('layouts.home')

@section('content')
  <div class="companies">
    @foreach($companies as $company)
      <div class="card">
        <div class="card-body clearfix">
          <div class="d-flex flex-row bd-highlight mb-3 justify-content-between">
            <div>
              <h3>{{ $company->name}}</h3>
              <p>{{ $company->description}}</p>
            </div>
            <ul class="d-inline-flex flex-column categories">
              <li class="category">
                <div class="tag">Big</div>
              </li>
              <li class="category">
                <div class="tag">British</div>
              </li>
              <li class="category">
                <div class="tag">Premium</div>
              </li>
            </ul>
          </div>
          
          <a role="button" class="btn btn-primary" href="/company/{{$company->id}}/edit">Edit</a>
          <a role="button" class="btn btn-secondary" href="{{ url('/company/destroy/'.$company->id)}}">Delete</a>
          <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="{{ '#tagsModal-'.$company->id }}">Add Tags</button>
        </div>
      </div>
      @include('company.tags', ['company' => $company, 'tags' => $tags])
    @endforeach
  </div>

@endsection