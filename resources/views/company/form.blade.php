@extends('layouts.home')

@section('content')
  <div class="container">
    @if(Auth::check())
        @isset($company)
            <company-form form-type="Edit" name="{{$company->name}}" description="{{$company->description}}" id="{{$company->id}}"></company-form>
        @else
            <company-form form-type="New"></company-form>
        @endisset
    @else
      <h3>You must be logged in to edit companies.</h3>
    @endif
  </div>
@endsection
