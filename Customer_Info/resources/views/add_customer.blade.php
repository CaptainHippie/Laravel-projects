<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Add Customer</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Add Customer</h2>
                        @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if (Session::has('fail'))
                        <div class="alert alert-fail">{{Session::get('fail')}}</div>
                        @endif
                    <div><figure><img id="uploadPreview" src="/images/default.jpg" width="100px"></figure></div>
                    <form method="POST" action={{route('customer-add')}} enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="profile_pic" id="select_image" style="visibility:hidden" onchange="Snk_PreviewImage();">
                            <div ><label for="select_image">Add Profile Image</label></div>
                        <span class="text-danger">@error('profile_pic') {{$message}} @enderror</span><br>

                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name" value={{old('name')}}>
                            <span class="text-danger">@error('name') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Total Sales" name="sales" value={{old('sales')}}>
                            <span class="text-danger">@error('sales') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="country" id="country-dd">
                                    <option value="" disabled="disabled" selected>Select Country</option>
                                    @foreach($countries as $data)
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <span class="text-danger">@error('country') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="state" id="state-dd">
                                    <option value="" disabled="disabled" selected>Select State</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <span class="text-danger">@error('state') {{$message}} @enderror</span>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="city" id="city-dd">
                                    <option value="" disabled="disabled" selected>Select City</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <span class="text-danger">@error('city') {{$message}} @enderror</span>
                        </div>
                        <div class="row row-space">
                            <div class="col-2" style="margin-top: 13px">
                                <label>Invoice Date : </label>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="date" placeholder="Invoice Date" name="invoice_date">
                                </div>
                                <span class="text-danger">@error('invoice_date') {{$message}} @enderror</span>
                            </div>
                        </div>

                        <input type="file" name="invoices[]" id="file_upload" multiple>
                        <span class="text-danger">@error('invoices') {{$message}} @enderror</span><br>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Add</button>
                        </div>
                    </form><br>
                    <a href="{{ route('all-customers') }}"><button class="btn btn--radius btn--green">View All</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <!--script src="js/country-state-city-select.js"></!--script-->

    <script>
    $(document).ready(function() {
        $('#country-dd').change(function(event) {
        var idCountry = this.value;
        $('#state-dd').html('');

        $.ajax({
            url: "api/fetch-state",
            type : 'POST',
            dataType: 'json',
            data: {country_id: idCountry,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#state-dd').html('<option value="" disabled="disabled" selected>Select State</option>');
                $.each(response.states, function(index, val) {
                    $('#state-dd').append('<option value="'+val.id+'">'+val.name+'</option>');
                });
            }
        })
    });

    $('#state-dd').change(function(event) {
        var idState = this.value;
        $('#city-dd').html('');

        $.ajax({
            url: "api/fetch-city",
            type : 'POST',
            dataType: 'json',
            data: {state_id: idState,_token:"{{ csrf_token() }}"},
            success:function(response){
                $('#city-dd').html('<option value="" disabled="disabled" selected>Select City</option>');
                $.each(response.cities, function(index, val) {
                    $('#city-dd').append('<option value="'+val.id+'">'+val.name+'</option>');
                });
            }
        })
    });

    });

    function Snk_PreviewImage()
    {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("select_image").files[0]);
        oFReader.onload = function (oFREvent)
        {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
