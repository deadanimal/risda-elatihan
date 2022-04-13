@extends('layouts.risda-base')
@section('content')
<a href="/delete_staf" class="btn btn-danger">Remove All Peserta ULS </a> <br><a href="/add_staf" class="btn btn-warning">add</a><br>
    {{-- @foreach ($user as $key => $u)
        {{ $u->id }}. {{ $u->no_KP }} ({{ $u->jenis_pengguna }})
        <br>
        <div class="col-lg-5">
            <form action="/update_role/{{ $u->id }}" method="post">
                @method('PUT')
                @csrf
                <select name="peranan" class="form-control">
                    <option value="">Sila Pilih</option>
                    @foreach ($role as $r)
                        <option value="{{ $r->name }}">{{ $r->name }}</option>
                    @endforeach
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
    @endforeach --}}

    {{-- <form action="/pengurusan_peserta/semakan_pemohon/9" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-warning">Tekan ni</button>
    </form> --}}

    
@endsection
