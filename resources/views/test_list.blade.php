@extends('layouts.risda-base')
@section('content')
    @foreach ($user as $key => $u)
        {{ $key + 1 }}. {{ $u->no_KP }} ({{ $u->jenis_pengguna }})
        <br>
        <div class="col-lg-5">
            <form action="/update_role/{{ $u->id }}" method="post">
                @method('PUT')
                @csrf
                <select name="peranan" class="form-control">
                    <option value="Peserta ULS">Peserta ULS</option>
                    <option value="Peserta ULPK">Peserta ULPK</option>
                    <option value="Urus Setia ULS">Urus Setia ULS</option>
                    <option value="Urus Setia ULPK">Urus Setia ULPK</option>
                </select>
                <button type="submit" class="btn btn-primary">Update role</button>
            </form>
        </div>
        <br>
        <form action="/delete/{{ $u->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">buang</button>
        </form>
        <br><br>
    @endforeach
@endsection
