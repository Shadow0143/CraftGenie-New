@section('title', 'Add Admin')
@include('layouts.backend.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title mb-0">Add Admin User </h5>
                                </div>
                                <div class="col-2">
                                    <a href="{{route('adminuserList')}}" class="btn btn-outline-danger">Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('submitAdminuser')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="user_id" id="user_id"
                                        value="@if(!empty($user)) {{$user->id}} @endif">
                                    <div class="col-6 mt-3 ml-5">
                                        <span class="lnr lnr-user"></span>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="@if(!empty($user)) {{$user->name}} @endif" required
                                            autocomplete="name" autofocus placeholder="User Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-3 ml-5">
                                        <span class="lnr lnr-envelope"></span>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="@if(!empty($user)) {{$user->email}} @endif" required
                                            autocomplete="email" placeholder="Mail">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-12 mt-3 ml-5">
                                        <span class="lnr lnr-phone-handset"></span>
                                        <input id="phone_no" type="test"
                                            class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                            value="@if(!empty($user)) {{$user->phone_no}} @endif" required
                                            autocomplete="phone_no" placeholder="Phone Number">
                                        @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    @if(empty($user))
                                    <div class="col-6 mt-3 ml-5">
                                        <span class="lnr lnr-lock"></span>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-3 ml-5">
                                        <span class="lnr lnr-lock"></span>
                                        {{-- <input type="password" class="form-control" placeholder="Confirm Password">
                                        --}}
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>
                                    @endif


                                    <div class="col-12 mt-3 ml-5">
                                        <span class="lnr lnr-location"></span>
                                        <textarea id="address"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address"
                                            placeholder="Address " cols="30"
                                            rows="10"> @if(!empty($user)) {{$user->address}} @endif </textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6 mt-3 ml-5">
                                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>

            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
</div>
<!-- End Page-content -->
@include('layouts.backend.footer')

<script>
    $('#question_type').on('change', function() {
            var check = $('#question_type').val();
            if (check == 'radio' || check == 'checkbox' || check == 'select') {
                $('#after_select').css('display', 'block');
            }
        });

        $('#number_of_values').on('keyup', function() {
            var no_value = $('#number_of_values').val();
            if (no_value > 0) {
                for (var i = 1; i <= no_value; i++) {
                    var textboxes = '<input type="text" name="values[]" class="form-control">';
                    $('#appendvalue').append(textboxes);
                }

            } else {
                alert('Please enter minimum 1 value.');
            }
        });
</script>