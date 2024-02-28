
@if ( Session::has('success') )
@php
    $message = Session::get('success');
    echo "<script>alert(`$message`)</script>";
@endphp
@endif