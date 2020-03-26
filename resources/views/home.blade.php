<!DOCTYPE html>
<html lang="de">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Web-Links PVG</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/styles.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
	  
	  <div class="logo">
		  <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
		    <path d="M21.649,23.273h7.036V16.237H21.649Zm-4.51,4.33V1.624A8.954,8.954,0,0,1,23.995,4.51c1.624,1.8,2.526,4.51,2.887,8.119l1.8-.361L28.505,0H.361L0,12.268l1.8.361C2.165,9.021,3.067,6.314,4.691,4.51a8.954,8.954,0,0,1,6.856-2.887V27.6q0,3.518-1.082,4.33a4.822,4.822,0,0,1-2.887,1.082H5.593V35h17.32V33.015a13.762,13.762,0,0,1-3.067-.18A3.092,3.092,0,0,1,17.32,30.49c0-.541-.18-1.624-.18-2.887ZM0,23.273H7.036V16.237H0Z" transform="translate(21 18)"/>
		  </svg>  	
          <h2>Web-Links PVG</h2>
	  </div>
	  
	  

	<div class="grid">        
        @php
            $dept='PVG'
        @endphp

        @foreach($data as $row)
            @if(strpos($row->departement, $dept) !== FALSE)
               <a href="{{$row->link}}" target="_blank">
                    <img src="{{ URL::to('/') }}/images/{{ $row->icon }}" />
                   <span> {{$row->header}} </span> </a>
           

            @endif
        @endforeach


  </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  
  <!-- Scripts-->
  <script src="js/TextSize.js"> </script>
</body>
</html>
