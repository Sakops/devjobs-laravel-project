@extends('layout')

@section('content')


@unless(count($listings) == 0)
@foreach($listings as $listing)
    <x-listing-card :listing="$listing"/>
@endforeach

@else
    <p>No listings found</p>
@endunless

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>

@endsection