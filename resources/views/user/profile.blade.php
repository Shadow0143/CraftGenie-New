@section('title', '| Profile')
@include('layouts.frontend.header')

<div class="main-content mt-5 pt-5 pl-5 mb-5">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4 style="border-bottom: 1px solid black;">Contact Information</h4>
                    <p>{{Auth::user()->name}}</p>
                    <p>{{Auth::user()->email}}</p>
                    <p>{{Auth::user()->phone_no}}</p>
                    <div class="d-flex flex-wrap">
                      <a href="#" class="default-btn mr-3 mb-3 mb-lg-0 " data-toggle="modal" data-target="#myModal">Edit</a>
                      <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
    
                          <!-- Modal content-->
                          <div class="modal-content">
                            <form action="{{route('contactInfo')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                              <div class="modal-header">
                                <h4 class="modal-title">Edit Contact Information</h4>
                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                              </div>
                              <div class="modal-body">
                                <label for="name">Name:</label>
                                <input id="firstname" type="text" required="" placeholder="First Name" class="form-control " name="username" value="{{Auth::user()->name}}"><br>

                                <label for="email">Email:</label>
                                <input id="email" type="email" required="" placeholder="Email" class="form-control " name="email" value="{{Auth::user()->email}}"><br>

                                <label for="phone_no">Phone_no:</label>
                                <input id="mobile" type="number" required="" placeholder="Contact No" class="form-control " name="phone_no" value="{{Auth::user()->phone_no}}" >
    
    
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-warning">Update</button>
                              </div>
                            </form>
                          </div>
    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mt-5 pt-5  ">
                    <a href="javaScript:void(0);"  data-toggle="modal" data-target="#addressmodal"> + Add Address</a>
                    <h4 style="border-bottom: 1px solid black;">Address Information</h4>
                    
                    @forelse($address as $key => $val)
                        <div style="border-bottom: 1px solid black;" id="removeRow{{$val->id}}">
                            {{$key+1}} ).
                            <p>
                                <a href="javaScript:void(0);" class="default-btn mr-3 mb-3 mb-lg-0 editAddress" data-id="{{$val->id}}"> Edit</a>
                                <a href="javaScript:void(0);" class="default-btn mr-3 mb-3 mb-lg-0 text-danger deleteAddress" data-id="{{$val->id}}"> Delete</a>
                                <input type="radio" value="1" @if($val->is_default == 1) checked @endif class="defaultAddredd" data-id="{{$val->id}}"> Set a active addess 
                            </p>
                            
                            <p id="a_address2">{{$val->address}},</p>
                            <p id="a_locality2">{{$val->locality}},</p>
                            <p id="a_city2">{{$val->city}},</p>
                            <p id="a_state2">{{$val->state}} </p>
                            <p id="a_country2">{{$val->country}}</p>
                            <p id="a_pin2">{{$val->pin}}</p>
                           
                        </div>
                       
                    @empty
                        <p class="text-danger">No address addedd yet.</p>
                    @endforelse
                    


                    <div class="d-flex flex-wrap">
                       
                        <div class="modal fade" id="addressmodal" role="dialog">
                            <div class="modal-dialog">
        
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form action="{{route('addAddress')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                                    <input type="hidden" name="address_id" id="address_id" value="" class="address_id">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Address</h4>
                                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                                </div>
                                <div class="modal-body">
                                    <label for="address">Address:</label>
                                    <textarea name="address" id="address" cols="30" rows="2" class="form-control address" required></textarea><br>
                                

                                    <label for="locality">Locality:</label>
                                    <input id="locality" type="text" required="" placeholder="locality" class="form-control locality" name="locality" value=""><br>

                                    <label for="city">City:</label>
                                    <input id="city" type="" required="" placeholder="Contact No" class="form-control city" name="city" value="" ><br>

                                    <label for="state">State:</label>
                                    <input id="state" type="text" required="" placeholder="state" class="form-control state" name="state" value=""><br>

                                    <label for="country">Country:</label>
                                    <input id="country" type="text" required="" placeholder="country" class="form-control country" name="country" value=""><br>

                                    <label for="pin">Pin:</label>
                                    <input id="pin" type="number" required="" placeholder="pin" class="form-control pin" name="pin" value=""><br>
        
        
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-success">Submit</button>
                                </div>
                                </form>
                            </div>
        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.frontend.footer')




<script src="https://code.jquery.com/jquery-3.3.1.min.js"
integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    

<script>


    jq162 = jQuery.noConflict( true );

    $('.deleteAddress').on('click',function(){
        var address = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: "You won't delete this address!",
            icon: 'warning',
            buttons: true,
            buttonsStyling: false,
            reverseButtons: true
        }).then((confirm) => {
            if (confirm) {
                jq162.ajax({
                    type: "GET",
                    url: "{{route('deleteAddress')}}",
                    data: { id: address },
                    success: function(data) {
                        swal({
                            title: 'Success',
                            text: "Deleted",
                            icon: 'success',
                            buttons: true,
                            buttonsStyling: false,
                            reverseButtons: true
                        });
                        $('#removeRow'+address).hide();
                    }
                });
            }

        });
    });

    $('.defaultAddredd').on('click',function(){
        var address = $(this).data('id');
       
        jq162.ajax({
            type: "GET",
            url: "{{route('defaultAddress')}}",
            data: { id: address },
            success: function(data) {
               window.location.reload();
            }
        });
            
    });


    $('.editAddress').on('click',function(){
        var address = $(this).data('id');
       
        jq162.ajax({
            type: "GET",
            url: "{{route('editAddress')}}",
            data: { id: address },
            success: function(data) {
             $('.address_id').val(data.id);
             $('.address').html(data.address);
             $('.locality').val(data.locality);
             $('.city').val(data.city);
             $('.state').val(data.state);
             $('.country').val(data.country);
             $('.pin').val(data.pin);
             $('#addressmodal').modal('show');
            }
        });
            
    });



      
</script>