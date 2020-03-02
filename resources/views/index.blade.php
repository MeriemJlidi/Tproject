@extends('parent')

@section('main')

   @if($message= Session::get('success') )
       <div class="alert alert-success">
    <p>{{$message}}</p>
       </div>
   @endif

   <div align="right">
       <a href="{{route('links.create')}}" class="btn btn-success btn-sm">Add Link Section</a>
   </div>
   <br>

    <table class="table table-bordered table-striped">
        <tr>
            <th width="10%">Icon</th>
            <th width="20%">Title</th>
            <th width="20%">Link</th>
            <th width="10%">Department</th>
            <th width="15%">Action</th>
        </tr>
        @foreach($data as $row)
            <tr>
                <td><img src="{{ URL::to('/') }}/images/{{ $row->icon }}" class="img-thumbnail" width="75" /></td>
                <td>{{ $row->header }}</td>
                <td>{{ $row->link }}</td>
                <td>{{ $row->departement }}</td>

                <td>
                    <form action="{{ route('links.destroy', $row->id) }}" method="post">
                        <a href="{{ route('links.show', $row->id) }}" class="btn btn-primary">Display</a>
                        <a href="{{ route('links.edit', $row->id) }}" class="btn btn-warning">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}
@endsection
