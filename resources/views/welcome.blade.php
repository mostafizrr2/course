<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Titan 71 - Application form</title>

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

        <h3 class="text-center text-muted">Registration for free live online course</h3>

        <br>

        <div class="row">
        <div class="col-md-5">
        <div class="jumbotron requirements">

            {{-- <p></p> --}}

            <legend>
            <p>Requirements</p>
           </legend>  
           <ul>
               <li>Desktop/Laptop</li>
               <li>Internate Connection</li>
               <li>Skype account</li>
               <li>Patience, curiosity & time</li>
           </ul>


           <legend>
            <p>Ragistration Process</p>
            </legend>  
            <ul>
                <li>Fill the form with correct information</li>
                <li>Submit the form</li>
                <li>We will send a secret code on your given phone number</li>
                <li>Submit the code to verify your phone number</li>
                <li>Wait for our phone call</li>
            </ul>
    
           <p><strong>Note: </strong>Please remember or save the secret code we have sent to you.</p>
        </div>

        </div>    
        <div class="col-md-7">
         @if (Session::get('success'))
            <div class="alert alert-success">

                {{ Session::get('success') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif

         @if (Session::get('error'))
            <div class="alert alert-danger">
                
                {{ Session::get('error') }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
         @endif


         @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{ $error }}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endforeach
         @endif

        <div class="jumbotron">
        <form action="{{ route('add.register') }}" method="POST"> 
            @csrf
            <fieldset>
                <br>
                <legend>
                    <p>সঠিক তথ্য দিয়ে রেজিস্ট্রেশন ফর্মটি পূরন করুন</p>
                </legend>    

                <div class="form-group">
                    <label for="exampleInputEmail1">নাম (ইংরেজিতে) :</label>
                    <input type="text" class="form-control" name="full_name" id="full-name" placeholder="Enter you full name">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ইমেইল :</label>
                    <input type="text" class="form-control" name="email" id="last-name" placeholder="Enter your valid email address">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">ফোন নাম্বার (১১ সংথ্যা) :</label>
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="017########">
                    <small id="phone" class="form-text text-muted">রেজিস্ট্রশেনটি সক্রিয় করার জন্য আপনার ফোন নাম্বারে একটি ভেরিফিকেশ কোড পাঠনো হবে। সুতরাং অনুগ্রহ করে সঠিক ফোন নাম্বার ব্যাবহার করুন।</small>
                </div>
                

                <div class="form-group">
                <label for="exampleSelect1">কোর্স সমূহ :</label>
                <select class="form-control" id="course" name="course">
                    <option value="0">Please Select a course</option>
                    <option value="1">1 Website Design (HTML, CSS, Javascript Basic)</option>
                    <option value="2">3 Graphics Design (Photoshop, Illustrator)</option>
                    <option value="3">4 Search Engine Optimization (SEO)</option>
                </select>
                </div>

                <fieldset class="form-group">
                    <label>বৈবাহিক অবস্থা :</label>

                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="marital_status" id="married" value="male">
                          বিবাহিত
                        </label>
                    </div>
                    <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="marital_status" id="married" value="Female">
                          অবিবাহিত
                        </label>
                    </div>
                </fieldset>


                <div class="form-group">
                    <label for="exampleInputEmail1">বর্তমান ঠিকানা :</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter your current address">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">জেলা :</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter your current city">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Profile link (optional) :</label>
                    <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Enter your facebook profile link">
                    <small id="phone" class="form-text text-muted">Ex: ( www.facebook.com/your-user-name )</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Skype name (optional) :</label>
                    <input type="text" class="form-control" name="skype" id="skype" placeholder="Enter your skype name">
                    <small id="phone" class="form-text text-muted">Ex: ( live:your-skype-name )</small>
                </div>
                 <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        </div>
        </div>
        </div>
        <br><br>
    </div>



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>   
    </body>
</html>
