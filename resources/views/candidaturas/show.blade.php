@extends('layouts.app')

@section('content')
<candidatura :subscription="{{ json_encode($subscription) }}">
</candidatura>
@endsection
