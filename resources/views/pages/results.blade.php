@extends('layouts.main')

@section('content')
  @if (isset($needs))
    @foreach ($needs as $need)
      {{$need->name}}
    @endforeach
  @endif
@endsection
