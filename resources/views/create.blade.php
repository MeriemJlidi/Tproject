@extends('parent')

@section('main')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div align="right">
        <a href="{{ route('links.index') }}" class="btn btn-default">Back</a>
    </div>

    <form method="post" action="{{ route('links.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
            <label class="col-md-4 text-right">Enter Link Title</label>
            <div class="col-md-8">
                <input type="text" name="title" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">Enter Link</label>
            <div class="col-md-8">
                <input type="text" name="link" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <br />

        <div class="form-group">
            <label class="col-md-4 text-right">Select Link Department</label>
            <div class="col-md-8">
                <select name="dept">
                    <option value="partner">PVG Partneragenturen</option>
                    <option value="main">Main</option>
                </select>
            </div>
        </div>

        <br />
        <br />
        <br />

        <div class="form-group">
            <label class="col-md-4 text-right">Select Link Image</label>
            <div class="col-md-8">
                <input type="file" name="img" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group text-center">
            <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
        </div>

    </form>

@endsection
