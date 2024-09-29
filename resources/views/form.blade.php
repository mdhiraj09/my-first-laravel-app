<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->

            <nav
                class="navbar navbar-expand-sm navbar-light bg-light"
            >
                <div class="container">
                    <a class="navbar-brand" href="#">MyApp</a>
                    <button
                        class="navbar-toggler d-lg-none"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavId"
                        aria-controls="collapsibleNavId"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{url('/')}}" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/customer')}}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/customer/view')}}">view</a>
                            </li>
                        </ul>
                       
                    </div>
                </div>
            </nav>
            
        </header>
        <main>
            {{--Base url dega url function jo ki .env me hai laravelekcsrf token bhejta bina uske koi post request hit nhi hogi--}}
            {{--$error namka super globbal variable hai usme sab eror hai--}}

            <form action="{{ $url }}" method="POST">
                @csrf
                <div class="container">
                    <h1 class="text-center">{{ $title }}</h1>
            
                    <!-- Check if $customer exists or set an empty value for creation -->
                    <x-input type="text" name="name" label="Name" value="{{ optional($customer)->name ?? '' }}"/>
                    <x-input type="email" name="email" label="Email" value="{{ optional($customer)->email ?? '' }}"/>
                    <x-input type="text" name="address" label="Address" value="{{ optional($customer)->address ?? '' }}"/>
                    <x-input type="text" name="country" label="Country" value="{{ optional($customer)->country ?? '' }}"/>
                        {{-- //if agr value nhi hai toh default value rkha hai --}}
                    <x-input type="date" name="dob" label="DOB" value="{{ optional($customer)->dob ?? '' }}"/> <!-- Check for date -->
                    <x-input type="password" name="password" label="Password" value=""/> <!-- Leave blank for new entries -->
                    
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
            
            

        </main>












        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
