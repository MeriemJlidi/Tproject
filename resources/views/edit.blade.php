@extends('parent')

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div align="right">
        <a href="{{ route('links.index') }}" class="btn btn-default">Back</a>
    </div>
    <br />
    <form method="post" action="{{ route('links.update', $data->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label class="col-md-4 text-right">Enter Link Title</label>
            <div class="col-md-8">
                <input type="text" name="title" value="{{ $data->header }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <br />
        <div class="form-group">
            <label class="col-md-4 text-right">Enter Enter Link</label>
            <div class="col-md-8">
                <input type="text" name="link" value="{{ $data->link }}" class="form-control input-lg" />
            </div>
        </div>
        <br />
        <br />
        <br />




      


        <div class="form-group">
            <label class="col-md-4 text-right">Select Link Department</label>
            <div class="col-md-8">
                <select name="dept">
                    <option {{old('dept',$data->departement)=="Partneragenturen"? 'selected':''}}  value="Partneragenturen">Partneragenturen</option>
                    <option {{old('dept',$data->departement)=="PVG"? 'selected':''}} value="PVG">PVG</option>

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
                <img src="{{ URL::to('/') }}/images/{{ $data->icon }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $data->icon }}" />
            </div>
        </div>
        <br /><br /><br />
        <div class="form-group text-center">
            <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
        </div>
    </form>

@endsection
