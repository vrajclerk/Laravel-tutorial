<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Trash</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> 
                @if(session()->has('customer_name'))
                {{session()->get('customer_name')}}
                @else
                Guest
                @endif</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/customer')}}">Customer</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h1>Customer Trash</h1>
        <a href="{{route('customer.trash')}}">
        <button class="btn btn-primary d-inline-block m-2 float-right">Add</button>
        </a>
        <a href="{{url('customer')}}">
            <button class="btn btn-primary d-inline-block m-2 float-right">Customer view</button>
            </a>
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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $customer )
                    
            
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
                    <td>{{get_formatted_date($customer->dob,"d-m-y")}}</td>
                    <td>{{$customer->customer_address}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{$customer->password}}</td>
                    <td>
                        @if($customer->status=="1")
                        <button class-btn>
                            <span class="badge badge-success">Active</span>
                        </button>
                         @else
                         <button class-btn>
                            <span class="badge badge-danger">Inactive</span>
                        </button>
                         @endif
                        
                    </td>
                    <td>{{$customer->points}}</td>
                    <td>
                        {{-- Method 1 --}}
                        {{-- <a href="{{url('/customer/delete/')}}/{{$customer->customer_id}}">
                        <button class="btn btn-danger">Delete</button>
                        </a> --}}

                        {{-- method-2 --}}
                        <a href="{{route('customer.force-delete',['id'=>$customer->customer_id])}}">
                        <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{route('customer.restore',['id'=>$customer->customer_id])}}">
                        <button class="btn btn-primary">Restore</button>
                        </a>
                    </td>
                </tr>
               
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>