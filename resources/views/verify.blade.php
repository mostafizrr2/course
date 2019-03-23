<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Titan 71 - Verify phone number</title>

        <link rel="stylesheet" href="https://bootswatch.com/4/spacelab/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Cabin+Sketch|Faster+One|Gudea|Major+Mono+Display|Monoton" rel="stylesheet"> 
     <style>
       .titan{
           font-size: 70px;
           font-family: 'Monoton', cursive;
       }
       .ekattor{
           font-family: 'Major Mono Display', monospace;
       }
       h2,h3,h4,h5,h6{
        font-family: 'Gudea', sans-serif;
       }
     </style>
    </head>
    <body>

    <div class="container">
        <br>
        <br>
        <h1 class="text-center titan" style="color:orange">TITAN <span class="ekattor"> 71</span></h1>

        <h3 class="text-center text-muted">Your ultimate IT Partner</h3>

        <br>
        <div style="max-width:600px; margin:0 auto;">
        
        @if (Session::get('success'))
            <div class="alert alert-success">

                {!! Session::get('success') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (Session::get('error'))
            <div class="alert alert-danger">
                
                {!! Session::get('error') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif


        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {!! $error !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
        @endif

        <div class="jumbotron">
        <form action="{{ route('verify.register') }}" method="POST"> 
            @csrf
            @method('PUT')
            <div class="form-group">
               <input type="hidden" name="phone" value="{{$phone}}">
               <input type="number" class="form-control" name="secret_code" id="secret_code" placeholder="Enter 6 digit secret code">
            </div>

            <button type="submit" class="btn btn-primary">Verify</button>

        </form>
        </div>
        </div>
    </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    </body>
</html>
