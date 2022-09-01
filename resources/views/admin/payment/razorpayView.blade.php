<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Craftgenie | Payment</title>
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">
        @laravelPWA
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style>
        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 0.25rem;
            box-shadow: 0px 0px 6px #c9c6c6;
            padding: 20px;
        }

        .login-card {
            text-align: center;
        }
        .login-card-body {
            margin-top: 20px;
        }
        .login-card-text {
            text-align: left;
            color: #000;
        }
        .login-card-text label {
            margin-bottom: 2px;
            margin-top: 10px;
            font-weight: 500;
            font-size: 15px;
        }
        .login-card-pay h3 {
            font-size: 13px;
            margin-top: 14px;
            color: #868686;
        }
    </style>
    <body>
        <div id="app">
            <main class="py-4">
                <div class="container">
                    <div class="row">
                        <div class=" col-lg-6 col-md-12 offset-lg-3 col-lg-offset-6">
                            {{-- @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Error!</strong> {{ $message }}
                                </div>
                            @endif --}}
                            {{-- @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Success!</strong> {{ $message }}
                                </div>
                            @endif --}}
                            <div class="card card-default">
                                <div class="container login-container">
                                    <h4 class="text-center">Secure Payment Gateway</h4>
                                    <div class="login-card">
                                        <img src="{{asset('img/logo.png')}}" alt="main-logo">
                                        <div class="login-card-body">
                                            <form action="{{route('razorpayPaymentOrderSave')}}" enctype="multipart/form-data" method="post">
                                                @csrf
                                                <div class="login-card-text">
                                                    <label for="name">Customer Name <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="name" name="name" type="text" value="" required/>
                                                </div>
                                                <div class="login-card-text">
                                                    <label for="email">Email ID <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="email" name="email" type="text" value="" required/>
                                                </div>
                                                <div class="login-card-text">
                                                    <label for="contactNumber">Contact Number <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="contactNumber" name="contactNumber" type="text" value="" required/>
                                                </div>
                                                <div class="login-card-text">
                                                    <label for="address">Address</label>
                                                    <input class="form-control" id="address" name="address" type="text" value="" />
                                                </div>
                                                <div class="login-card-text">
                                                    <label for="amount">Amount (INR) <span class="text-danger">*</span></label>
                                                    <input class="form-control" data-val="true" data-val-number="The field amount must be a number." data-val-required="The amount field is required." id="amount" name="amount" type="text" value="" required/>
                                                    <div id="PGChanrge" style="color:orange"></div>
                                                </div>
                                                <div class="login-card-text">
                                                    <label for="address">Payment Mode <span class="text-danger">*</span></label>
                                                    <select id="pmode" name="pmode" class="form-control" required>
                                                        <option value="" data-price="" data-text="">--Select--</option>
                                                        <option value="DC">Debit Card</option>
                                                        <option value="CC">Credit Card</option>
                                                        <option value="NET">Net Banking</option>
                                                        <option value="UPI">UPI</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                                            </form>
                                        </div>
                                        <div class="login-card-pay">
                                            <h3>Accept payments via debit card, credit card, net banking (supports 3D Secure),
                                                UPI, or through any of our supported wallets.</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script>
        </script>
    </body>
</html>