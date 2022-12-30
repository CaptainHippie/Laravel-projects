<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>All Customers</title>

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="inside-card" style="padding: 35px">
                    <table data-toggle="table">
                        <thead>
                          <tr>
                            <th>Customer Name</th>
                            <th>Total Sales</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($all_customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->sales }}</td>
                                <td><a href="{{ route('view-customer', ['id' => $customer->id]) }}">View</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <a href="{{ route('add-customers') }}"><button class="btn btn-secondary">Add New Customer</button></a>
                </div>
            </div>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>
</html>
<!-- end document-->
