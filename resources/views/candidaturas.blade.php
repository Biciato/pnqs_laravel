@extends('layouts.app')

@section('content')
<candidaturas :subscriptions="{{ json_encode($subscriptions) }}">
</candidaturas>
@endsection
