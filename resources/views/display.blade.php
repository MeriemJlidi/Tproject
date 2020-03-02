@extends('parent')

@section('main')

    <div class="jumbotron text-center">
        <div align="right">
            <a href="{{ route('links.index') }}" class="btn btn-default">Back</a>
        </div>
        <br />
        <img src="{{ URL::to('/') }}/images/{{ $data->icon }}" class="img-thumbnail" />
        <h3>Link Title : {{ $data->header }} </h3>
        <h3>Link : {{ $data->link }}</h3>
        <h3>Department : {{ $data->departement }}</h3>
    </div>
@endsection
