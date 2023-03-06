@extends('layout.app')
@section('content')
    <img src="data:image/jpeg;base64,{{ $base64 }}" alt="Image">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <button type="submit">Send</button>
        @csrf
    </form>
@endsection