@if(Auth::check())
    <heading :auth="true"></heading>
@else
    <heading :auth="false"></heading>
@endif
