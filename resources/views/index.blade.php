@extends('parent')
<link rel="stylesheet" href="css/dashboard.css">
<link rel="stylesheet" href="css/reversebuttons.css">
<script src="https://kit.fontawesome.com/c63ff72a48.js" crossorigin="anonymous"></script>
@section('main')

    <link rel="icon" type="image/png" href="images/favicon.png">

    <nav class="navbar" style="padding-top: 0px;padding-bottom: 0px">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                <path d="M21.649,23.273h7.036V16.237H21.649Zm-4.51,4.33V1.624A8.954,8.954,0,0,1,23.995,4.51c1.624,1.8,2.526,4.51,2.887,8.119l1.8-.361L28.505,0H.361L0,12.268l1.8.361C2.165,9.021,3.067,6.314,4.691,4.51a8.954,8.954,0,0,1,6.856-2.887V27.6q0,3.518-1.082,4.33a4.822,4.822,0,0,1-2.887,1.082H5.593V35h17.32V33.015a13.762,13.762,0,0,1-3.067-.18A3.092,3.092,0,0,1,17.32,30.49c0-.541-.18-1.624-.18-2.887ZM0,23.273H7.036V16.237H0Z" transform="translate(21 18)"/>
            </svg>
        </div>

        <h3 align="center">Deutsche Telekom Link Dashboard</h3>

        <div align="right">
            <button class="pink-button"><a href="{{route('links.create')}}" class="manual-optin-trigger" data-optin-slug="atefh5rvxazforll"><i class="fas fa-plus"></i> Add Link</a></button>
        </div>


    </nav>
    <br>
   @if($message= Session::get('success') )
       <div class="alert alert-success">
    <p>{{$message}}</p>
       </div>
   @endif


   <br>

    <table class="table table-responsive">
        <thead>
        <tr>
            <th width="10%">Icon</th>
            <th width="10%">Title</th>
            <th width="10%">Link</th>
            <th width="10%">Department</th>
            <th width="10%">Credentials</th>
            <th width="15%">Action</th>
        </tr>
        </thead>
        @foreach($data as $row)
            <tr>
                <td><img src="{{ URL::to('/') }}/images/{{ $row->icon }}" class="img-thumbnail" width="75" /></td>
                <td>{{ $row->header }}</td>
                <td>{{ $row->link }}</td>
                <td>{{ $row->departement }}</td>
                <td>{{ $row->credentials }}</td>

                <td>
                    <form action="{{ route('links.destroy', $row->id) }}" method="post">
                        <a class="reverse-orange-button" href="{{ route('links.edit', $row->id) }}"><i class="fas fa-pen"></i> Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="reverse-petrol-button"><i class="fa fa-trash"></i> Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
    </table>

@endsection
