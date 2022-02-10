@extends('layouts.risda-base')
@section('content')
@foreach ($user as $key=> $u)
    {{$key+1}}. {{$u->no_KP}} ({{$u->jenis_pengguna}})
    <br>
    <form action="/delete/{{$u->id}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">buang</button>
    </form>
@endforeach
@endsection