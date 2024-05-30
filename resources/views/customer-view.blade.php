<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer View</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Customer View</h1>
        <table class="table">
          
            <thead>
                <tr>
                    
                    <th scope="col"> Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">dob</th>
                    <th scope="col">address</th>
                    <th scope="col">country</th>
                    <th scope="col">state</th>
                    <th scope="col">city</th>
                    <th scope="col">password</th>
                    <th scope="col">status</th>
                    <th scope="col">points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer )
                    
            
                <tr>
                    {{-- <th scope="row">{{$customer->customer_id}}</th> --}}
                    <td>{{$customer->customer_name}}</td>
                    <td>{{$customer->customer_email}}</td>
                    <td>
                        @if($customer->gender=="M")
                        Male
                        @elseif ($customer->gender=="F")
                       Female
                        @else
                        Other
                        @endif</td>
                    <td>{{$customer->dob}}</td>
                    <td>{{$customer->customer_address}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->password}}</td>
                    <td>
                        @if($customer->status=="1")
                         Active
                         @else
                         Inactive
                         @endif
                        
                    </td>
                    <td>{{$customer->points}}</td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>