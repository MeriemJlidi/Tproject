<html>
<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Deutche Telekom| Dashboard</title>

        <link href="/css/formstyle.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/reversebuttons.css">
    </head>

    <body>
    <nav class="navbar" style="padding-top: 0px;padding-bottom: 0px">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
                <path d="M21.649,23.273h7.036V16.237H21.649Zm-4.51,4.33V1.624A8.954,8.954,0,0,1,23.995,4.51c1.624,1.8,2.526,4.51,2.887,8.119l1.8-.361L28.505,0H.361L0,12.268l1.8.361C2.165,9.021,3.067,6.314,4.691,4.51a8.954,8.954,0,0,1,6.856-2.887V27.6q0,3.518-1.082,4.33a4.822,4.822,0,0,1-2.887,1.082H5.593V35h17.32V33.015a13.762,13.762,0,0,1-3.067-.18A3.092,3.092,0,0,1,17.32,30.49c0-.541-.18-1.624-.18-2.887ZM0,23.273H7.036V16.237H0Z" transform="translate(21 18)"/>
            </svg>
        </div>

    </nav>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('links.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">Add Link Form</h2>
                        <form method="POST">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Enter Link Title</label>
                                        <input class="input--style-4" type="text" name="title">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">Enter Link URL</label>
                                        <input class="input--style-4" type="text" name="link">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">


                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Select Link Image</label>
                                            <input class="input--style-4" type="file" name="img">
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <div class="input-group">
                                            <label class="label">Enter Credenttials</label>
                                            <input  class="input--style-4" type="text" name="credentials" value="">
                                        </div>
                                    </div>

                                        <label class="label">Select Link Department</label>

                                        <li>
                                        <label for="mShop" style="padding-right: 10px;">
                                            <input id="mShop"  type="checkbox" name="dept[]" value="mShop" />mShop
                                        </label>
                                        </li>

                                        <li>
                                        <label for="Partneragenturen" style="padding-right: 10px;">
                                            <input id="Partneragenturen" name="dept[]" type="checkbox" value="Partneragenturen" />Partneragenturen
                                        </label>
                                        </li>

                                        <li>
                                        <label for="PVG" style="padding-right: 10px;">
                                            <input id="PVG"  type="checkbox" name="dept[]" value="PVG" />PVG
                                        </label>
                                        </li>


                                    <div class="col-2" style="padding-top: 15px">

                                        <button class="reverse-petrol-button" type="submit"><a href="{{ route('links.index') }}">Back</a></button>
                                    </div>
                                    <div class="col-4" style="padding-top: 15px">
                                        <div style="text-align: right;">
                                            <button style="display: inline-block;" class="reverse-pink-button" type="submit">Add Link</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Main JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/js/category.js"></script>
    <script src="/js/global.js"></script>



    </body>
</html>
