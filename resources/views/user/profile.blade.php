@section('title', '| Profile')
@include('layouts.frontend.header')

{{-- <div class="main-content mt-5 pt-5 pl-5 mb-5">
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
                        <input id="mobile" type="number" required="" placeholder="Contact No" class="form-control " name="phone_no" value="{{Auth::user()->phone_no}}">


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
    <a href="javaScript:void(0);" data-toggle="modal" data-target="#addressmodal"> + Add Address</a>
    <h4 style="border-bottom: 1px solid black;">Address Information</h4>

    @forelse($address as $key => $val)
    <div style="border-bottom: 1px solid black;" id="removeRow{{$val->id}}">
        {{$key+1}} ).
        <p>
            <a href="javaScript:void(0);" class="default-btn mr-3 mb-3 mb-lg-0 editAddress" data-id="{{$val->id}}"> Edit</a>
            <a href="javaScript:void(0);" class="default-btn mr-3 mb-3 mb-lg-0 text-danger deleteAddress" data-id="{{$val->id}}"> Delete</a>
            <input type="radio" value="1" @if($val->is_default == 1) checked @endif class="defaultAddredd"
            data-id="{{$val->id}}"> Set a active addess
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
                            <input id="city" type="" required="" placeholder="Contact No" class="form-control city" name="city" value=""><br>

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
</div> --}}

<style>
    ul {
        list-style: none;
        padding: 0;
    }

    img {
        max-width: 100%;
    }

    figure {
        margin: 0;
    }

    a:hover {
        text-decoration: none
    }

    a {
        -ms-transition: all 0.2s linear 0s;
        -moz-transition: all 0.2s linear 0s;
        -webkit-transition: all 0.2s linear 0s;
        transition: all 0.2s linear 0s;
        display: block;
    }

    .clears:after {
        clear: both;
        display: block;
        content: '';
    }

    /* My account */

    .sidebar012 {
        border: 0;
        background: #fff;
        border-radius: 0;
        overflow: hidden;
    }

    .sidebar012 li {
        background-image: none !important;
    }

    .sidebar012 li.active {
        background: #fff;
        background-image: none !important;
        box-shadow: none;
        border: 0;
        color: #000;
        border-bottom: 1px solid #ccc;
    }

    .sidebar012 li {
        border: 0;
        color: #000;
    }

    .tabs.sidebar012 li {
        color: #fff;
    }

    .profbox45 {
        text-align: center;
        margin-bottom: 20px;
    }

    .profbox45 figure {
        margin-bottom: 12px;
    }

    .profbox45 img {
        width: 100px;
        height: 100px;
        margin: 0 auto;
        border-radius: 100%;
        display: block;
    }

    .tabs.sidebar012 li.active:after {
        display: none;
    }

    .tabs.sidebar012 li:hover,
    .tabs.sidebar012 li.active {
        color: #000;
        background: #ff5001 !important;
    }

    .profbox45 h3 {
        font-size: 30px;
        margin-bottom: 12px;
        text-align: center;
        color: #000;
    }

    .log456_btn {
        text-align: center;
        padding: 8px 12px;
        line-height: normal;
        display: inline-block;
        border: 0;
        outline: 0;
        font-size: 16px;
        color: #000;
        background: transparent;
    }

    .log456_btn i {
        margin-right: 4px;
    }

    .sidebar012 {
        padding: 20px 15px;
    }

    .subcont12 label {
        color: #000;
        font-size: 16px;
        width: 100px;
        position: relative;
        font-weight: 500;
        margin: 0;
    }

    .subcont12 label:after {
        font-size: 18px;
        content: ':';
        position: absolute;
        right: 10px;
        top: -1px;
    }

    .subcont12 {
        color: #777;
        font-size: 16px;
    }

    .vaccine458 {
        background-color: #ebebeb;
        box-shadow: none;
        border: 0;
        width: 70%;
        padding: 20px;
        border-radius: 5px;
    }

    .vacright01 {
        display: flex;
        align-items: center;
    }

    .vacright01 h4 {
        margin: 0;
        font-size: 20px;
        margin-right: 15px;
        font-family: 'Fira Sans', sans-serif;
        font-weight: 600;
        letter-spacing: inherit;
    }

    .vacright01 {
        margin-right: 20px;
    }

    .btn025 {
        display: inline-flex;
        font-size: 18px;
        color: #ff5001;
        background: transparent;
        border: 0;
        outline: 0;
        align-items: center;
    }

    .btn025 i {
        font-size: 16px;
        margin-right: 8px;
        color: #222;
        display: inline-block;
    }

    .btn025 span {
        padding: 4px 0 0;
    }

    .bookbox88 {
        display: flex;
        background: #cccccc;
        border-radius: 12px;
        margin-bottom: 15px;
    }

    .booleft45 {
        width: 75%;
        padding: 15px;
        position: relative;
    }

    .booleft45:after {
        content: '';
        background: url(../images/bookbg484.jpg) no-repeat 0 0;
        position: absolute;
        right: -18px;
        top: 0;
        width: 35px;
        height: 100%;
        z-index: 2;
    }

    .booright45 {
        width: 25%;
        background: #e8e8e8;
        padding: 15px;
        border-radius: 0px 10px 10px 0;
    }

    .round4 {
        border-radius: 100%;
        width: 15px;
        height: 15px;
        background: #ff4f00;
        margin-right: 10px;
    }

    .botop45 {
        display: flex;
        font-size: 20px;
        margin-bottom: 12px;
        color: #000;
        align-items: center;
        font-family: 'Fira Sans', sans-serif;
    }

    .bookinof45 label {
        font-size: 14px;
        color: #777;
        display: block;
        margin-bottom: 2px;
        font-weight: 400;
        line-height: normal;
    }

    .bookinof45 span {
        display: block;
        font-size: 20px;
        color: #000;
        line-height: normal;
    }

    .bookinof45 {
        display: inline-block;
        padding-right: 20px;
    }

    .bookinof45:nth-child(1) {
        display: block;
        margin-bottom: 12px;
    }

    .datecol45 span {
        font-size: 24px;
        color: #000;
        display: block;
        text-align: center;
        line-height: normal;
    }

    .datecol45 strong {
        font-size: 42px;
        color: #ff5001;
        display: block;
        text-align: center;
        line-height: 46px;
    }

    .datecol45 small {
        font-size: 16px;
        color: #000;
        display: block;
        text-align: center;
        line-height: normal;
    }

    .datecol45 {
        padding: 28px 0 0;
    }

    /* checkout page */

    .checkout_wrapper h1 {
        font-size: 28px;
        text-align: center;
        margin-bottom: 15px;
        color: #000;
    }

    .checkout_left04 {
        background: #f6f6f6;
    }

    .topleft456 {
        padding: 12px 20px;
        display: flex;
        justify-content: space-between;
        background: #ebebeb;
        align-items: center;
    }

    .top889 span {
        font-size: 16px;
        display: block;
        line-height: normal;
        margin-bottom: 4px;
        color: #000;
    }

    .top889 small {
        font-size: 14px;
        display: block;
        line-height: normal;
        margin-bottom: 0;
        color: #777;
    }

    .price52 {
        font-size: 30px;
        color: #000;
    }

    .checkout_left04 {
        padding: 0px;
    }

    .price52 i {
        margin-right: 5px;
        color: #000;
        font-size: 20px;
    }

    .price52 {
        display: flex;
        align-items: center;
    }

    .chekleftbtm456 {
        padding: 20px;
    }

    .chekleftbtm456 li {
        display: flex;
        margin-bottom: 0;
        align-items: center;
        margin-right: 10px;
    }

    .chekleftbtm456 li i {
        font-size: 16px;
        margin-right: 10px;
        color: #ff5001;
    }

    .chekleftbtm456 li span {
        font-size: 14px;
        margin-right: 10px;
        color: #000;
    }

    .chekleftbtm456 ul {
        display: flex;
        border-bottom: 1px solid #777;
        padding-bottom: 12px;
        margin-bottom: 14px;
    }

    .fitcover {
        font-size: 12px;
        color: #ff5001;
    }

    .top889.total45 span {
        font-size: 22px;
    }

    .price52.toal789 i {
        color: #ff5001;
    }

    .price52.toal789 span {
        color: #ff5001;
    }

    .fitness458 label {
        color: #000;
    }

    .fitness458 .checkmark {
        border-color: #ff5001;
    }

    .checkbox_cont a {
        color: #ff5001;
        font-family: 'Fira Sans', sans-serif;
        letter-spacing: 0;
    }

    .checkbox_cont {
        margin: 0;
    }

    .btn02 {
        background: #1e3a46;
        background-image: none !important;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 8px 13px;
        line-height: 23px;
        font-size: 15px;
        height: 37px;
    }

    .ordersubmt45 {
        text-align: left;
        padding: 15px 0 0;
    }

    .toprightinfo466 {
        border: 1px solid #ccc;
        padding: 15px;
        border-bottom: 0;
        border-radius: 5px 5px 0 0;
    }

    .checkright89 td {
        color: #000;
    }

    .infobox25 {
        padding: 0;
    }

    .checkoutbtm45 h3 {
        position: relative;
    }

    .checkoutbtm45 h3 span {
        display: inline-block;
        background: #fff;
        padding: 0 12px 0 0;
    }

    .checkoutbtm45 h3:after {
        border-bottom: 1px solid #666;
        content: '';
        width: 100%;
        position: absolute;
        top: 10px;
        left: 0;
        z-index: -1;
    }

    .checkoutbtm45 h5 {
        color: #444;
        font-weight: 400;
        margin-bottom: 10px;
    }

    .checkoutbtm45 p {
        position: relative;
        padding-left: 15px;
    }

    .checkoutbtm45 p::before {
        width: 5px;
        height: 5px;
        background: #444;
        content: '';
        border-radius: 100%;
        position: absolute;
        left: 0;
        top: 8px;
    }

    .checkoutbtm45 {
        padding: 20px 0;
        padding-top: 70px;
    }

    .sidebar012 i {
        margin-right: 4px;
    }

    .coupon .btnbox button {
        border: 0;
    }

    /* new details page 22-07 */

    .blankheight45 {
        height: 50px;
    }

    .tophead478 .logo {
        width: 110px
    }

    .tophead478 {
        position: relative;
        background: transparent;
        height: 80px;
        padding: 15px 0;
    }

    .topdeco {
        width: 49%;
        height: 80px;
        position: absolute;
        left: 0;
        top: 0;
        background: #fff;
        content: '';
        z-index: -1;
    }

    /* .topdeco:after {
    width: 0;
    height: 0;
    border-bottom: 80px solid #222f3c;
    border-left: 100px solid transparent;
    position: absolute;
    right: 0;
    top: 0;
    content: '';
    }
    */

    .topleftwrap48 {
        display: flex;
        align-items: center;
        padding-top: 20px;
    }

    .info485 h2 {
        font-size: 18px;
        color: #000;
        line-height: normal;
    }

    .info485 span {
        font-size: 13px;
        color: #000;
        line-height: normal;
        display: block;
    }

    .info485 {
        padding-left: 18px;
    }

    .info485 i {
        display: inline-block;
        vertical-align: middle;
        font-size: 14px;
        margin-right: 3px;
    }

    .checkTurfStrip {
        margin: 0px auto 0;
        z-index: 999;
        position: relative;
        padding: 60px 0px 0;
    }

    .mapinfo45 {
        width: 440px;
        height: 100%;
        background: rgba(0, 0, 0, 0.9);
        z-index: 10;
        position: absolute;
        left: 0;
        top: 0;
        padding: 50px;
    }

    .turfLocation {
        position: relative;
    }

    .mapinfo45 h2 {
        font-size: 26px;
        color: #fff;
        margin-bottom: 20px;
        line-height: normal;
        letter-spacing: 2px;
    }

    .mapinfo45 p {
        font-size: 16px;
        color: #fff;
        margin-bottom: 16px;
        line-height: normal;
        padding: 0;
    }

    .mapinfo45 span {
        font-size: 16px;
        color: #fff;
        margin-bottom: 16px;
        line-height: normal;
        display: block;
    }

    .viewmap45 {
        background: #1e3a46;
        color: #fff;
        line-height: 23px;
        padding: 15px 30px;
        font-family: 'Bebas Neue', cursive;
        font-size: 24px;
        width: 180px;
        margin: auto;
        display: inline-block;
        text-align: center;
        letter-spacing: 3px;
        margin-top: 15px;
    }

    .viewmap45:hover {
        color: #000;
    }

    .turfBookSection {
        position: relative;
    }

    .turfBookSection:after {
        content: '';
        position: absolute;
        bottom: -70px;
        left: -40px;
        width: 120%;
        background: #f9f2ef;
        height: 840px;
        z-index: -1;
        transform: rotate(-5deg);
    }

    .turfBookSection:before {
        content: '';
        position: absolute;
        top: -260px;
        left: -40px;
        width: 120%;
        background: #fff;
        height: 200px;
        z-index: 1;
        transform: rotate(-5deg);
    }

    .datesltsec458 {
        padding: 70px 0 90px;
    }

    .headerContainer.tophead478 {
        display: block;
    }

    .sidebar012 {
        height: auto;
        background: #fff;
        color: #000;
    }

    .sidebar012 li {
        padding: 12px 10px;
        border-bottom: 1px solid #efefef;
        font-size: 14px;
    }

    .main_inner45 {
        padding: 0;
    }

    .main_section01 .tab_content {
        display: none;
    }

    .main_section01 .tab_content.active {
        display: block;
    }

    .main_section01 h2 {
        margin-bottom: 20px;
    }

    .subtitle99 {
        font-size: 16px;
        margin-bottom: 12px;
        display: block;
    }

    .subcont12 {
        font-size: 16px;
        color: #1e3a46;
        margin-bottom: 10px;
        display: block;
    }

    .btn02 {
        padding: 6px 26px;
        background: #1e3a46;
        color: #fff;
        font-weight: 400;
        display: inline-block;
        line-height: 23px;
        font-size: 15px;
        height: 34px;
        letter-spacing: 3px;
        border: 0;
    }

    .btn02:hover {
        background: #676767;
        color: #fff;
    }

    .contact_info {
        padding: 10px;
    }

    .infobox25 {
        padding: 15px 0;
    }

    .main_inner45 p {
        line-height: 20px;
        font-size: 14px;
        color: #1e3a46;
        max-width: 370px;
        margin-bottom: 30px;
    }

    .toptitle55 {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-top:20px;
    }

    .infobox25.favbox {
        text-align: center;
        position: relative;
        margin-bottom: 25px;
    }

    .infobox25.favbox h3 {
        letter-spacing: 5px;
        margin: 0 0 15px;
        color: #fff;
    }

    .infobox25.favbox img {
        object-fit: fill;
        height: 200px;
        width: 100%;
    }

    .infobox25.favbox .price {
        text-align: center;
        font-size: 26px;
        color: #fff;
        margin-bottom: 20px;
    }

    .infobox25.favbox .closebtn {
        font-size: 20px;
        background: #1e3a46;
        color: #fff;
        position: absolute;
        right: -10px;
        top: -10px;
        width: 25px;
        height: 25px;
        text-align: center;
        line-height: 25px;
    }

    .ordstatus66 {
        margin-bottom: 10px;
    }

    .orddt85 {
        margin-bottom: 12px;
    }

    .orddt85 h3 {
        font-size: 18px;
        margin-bottom: 6px;
    }

    .order_btns025 {
        display: flex;
        align-items: center;
    }

    .order_btns025 .btn02 {
        margin-right: 5px;
        letter-spacing: 1px;
        font-size: 12px;
        padding: 4px 10px;
        height: 24px;
        line-height: 19px;
    }

    .order_btns025 li:nth-child(2) .btn02 {
        background: #3b873b;
    }

    .order_btns025 li:last-child .btn02 {
        background: #fb3b3b;
    }

    button:focus {
        outline: 0;
        border: 0
    }

    .orderdetls56.infobox25 {
        margin-bottom: 25px;
    }

    .tabs li {
        cursor: pointer;
    }

    a {
        cursor: pointer;
    }

    .tabs.sidebar012 li {
        position: relative;
    }

    .tabs.sidebar012 li.active:after {
        content: '';
        position: absolute;
        left: 0;
        top: 10px;
        border-left: 3px solid #fd7f07;
        height: 25px;
    }

    .tabs.sidebar012 li:hover,
    .tabs.sidebar012 li.active {
        background-image: linear-gradient(to right, #1e3a46, #f78000, #e5a800, #cccb00, #a8eb12);
        color: #fff;
    }

    .popform56 {
        background-color: #fff;
        border: 1px solid #1e3a46;
        padding: 12px;
    }

    .popform56 li {
        margin-bottom: 10px;
    }

    .popform56 label {
        margin-bottom: 0;
        font-size: 14px;
        display: block;
        padding: 0;
    }

    .popform56 input {
        border: 0;
        border-bottom: 1px solid #1e3a46;
        padding: 0px 10px;
        font-size: 14px;
        width: 100%;
    }

    .popform56 textarea {
        border: 0;
        border-bottom: 1px solid #1e3a46;
        padding: 2px 10px;
        font-size: 14px;
        width: 100%;
        height: 50px;
        resize: none;
    }

    .popform56 h4 {
        margin-bottom: 12px;
        color: #1e3a46;
        text-shadow: 0 0 black;
        letter-spacing: 2px;
        font-weight: 300;
    }

    input:focus {
        outline: 0;
    }

    .dpop {
        position: relative;
        padding: 14px;
    }

    .dpop .close {
        position: absolute;
        right: 3px;
        top: 2px;
        width: 28px;
        height: 28px;
        font-weight: 300;
        font-size: 26px;
        background: #1e3a46;
        color: #fff;
        opacity: 1;
        text-align: center;
        cursor: pointer;
    }

    .contact_info.dashbtm {
        padding: 0;
    }

    .contact_info.dashbtm {
        padding-top: 30px;
    }

    .toptitle55 .subtitle99 {
        color: #1e3a46;
        margin: 0 0 6px
    }

    .orderbox0155 {
        position: relative;
    }

    .orderbox0155 figure img {
        object-fit: cover;
        width: 100%;
        height: 120px;
    }

    .orderinfo {
        padding: 10px;
    }

    .orderinfo h3 {
        margin-bottom: 7px;
        font-size: 15px;
        line-height: normal;
    }

    .orderinfo span {
        margin-bottom: 2px;
        display: block;
        font-size: 14px;
    }

    .orderbox0155 {
        border-radius: 5px;
        overflow: hidden;
        height: 100%;
        background: #fff;
    }

    .status054 {
        position: absolute;
        top: 10px;
        right: 10px;
        left: auto;
        background: #fff;
        color: #1e3a46;
        padding: 4px 6px;
        z-index: 4;
        line-height: 14px;
        font-size: 12px;
        border-radius: 4px;
        font-weight: 500;
    }

    .ordcl44 {
        margin-bottom: 15px;
    }

    .dashboard55 {
        padding: 120px 0;
        background: #efefef;
    }
    /* .quick ul li{
        margin-left: 20px;
    }
    .contact ul li{
        margin-left: unset !important;
    }
    .icon ul li{
        margin-top: unset !important;
    } */
    @media only screen and (max-width: 767px) {

        .sidebar012 {
            height: auto;
            margin-bottom: 10px;
        }

        .profbox45 img {
            width: 60px;
            height: 60px;
        }

    }
</style>




<section class="dashboard55">
    <div class="container">
        <!-- Dashboard starts -->

        <section class="dashboard_section">
            <div class="container">
                <div class="row">
                    <div class="sidebar015 col-md-3">

                        <div class="sidebar012">

                            <div class="profbox45">
                                <figure><img src="./images/icons/no-img.jpg" alt="profile image"></figure>

                                <h3>{{Auth::user()->name}}</h3>


                            </div>
                            <ul class="tabs">
                                <li class="active"><i class="fa fa-user"></i>My Profile</li>
                                <li><i class="fa fa-calendar"></i>My Booking</li>


                            </ul>


                            <button class="log456_btn"><i class="fa fa-sign-out"></i>LogOut</button>
                        </div>
                    </div>

                    <div class="main_section01 col-md-9">
                        <div class="tab_content active">
                            <div class="main_inner45">




                                <div class="contact_info infobox25">

                                    <span class="subcont12"><label>Name</label> {{Auth::user()->name}}</span>
                                    <span class="subcont12"><label>Email</label> {{Auth::user()->email}}</span>
                                    <span class="subcont12"><label>Phone</label> {{Auth::user()->phone_no}}</span>



                                    <div class="toptitle55">
                                        <h3 class="subtitle99">Address Information</h3>
                                    </div>



                                    <p>
                                        New Market, Block No-3, Near - Big Bazar, Post- Nimpura, Dist- Midnapur,
                                        City- Kharagpur, Pincode- 721305,

                                    </p>

                                    <button type="button" class="btn02" data-toggle="modal" data-target="#edit_address">
                                        Edit
                                    </button>

                                </div>


                            </div>
                        </div>


                        <div class="tab_content">
                            <div class="main_inner45">





                                <div class="booking_sec4589">
                                    <div class="row">



                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                            <div class="orderbox0155">
                                                <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                <div class="status054">Process</div>
                                                <div class="orderinfo">
                                                    <h3>Package Title</h3>
                                                    <span>Booking Id: 5658784</span>
                                                    <span>Booking Date: 11-09-2022</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>



                    </div>
                </div>
            </div>


            <!-- popup section -->











            <!-- Edit address -->
            <div class="modal fade " id="edit_address" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content dpop">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="popform56">
                            <h4>Edit Address</h4>

                            <div class="pform">
                                <form>
                                    <ul class="form_sect465">
                                        <li>
                                            <label>Full Name</label>
                                            <div class="filedbox"><input type="text" name=""></div>
                                        </li>

                                        <li>
                                            <label>Phone Number</label>
                                            <div class="filedbox"><input type="text" name=""></div>
                                        </li>

                                        <li>
                                            <label> Address</label>
                                            <div class="filedbox"><textarea name=""></textarea></div>
                                        </li>
                                    </ul>

                                    <button class="btn02">Save</button>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- Edit address -->





            <!-- contact edit -->
            <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">

                    <div class="modal-content dpop">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                        <div class="popform56">
                            <h4>Contact Edit</h4>

                            <div class="pform">
                                <form>
                                    <ul class="form_sect465">
                                        <li>
                                            <label>Full Name</label>
                                            <div class="filedbox"><input type="text" name=""></div>
                                        </li>

                                        <li>
                                            <label>Phone Number</label>
                                            <div class="filedbox"><input type="text" name=""></div>
                                        </li>

                                        <li>
                                            <label>Email Address</label>
                                            <div class="filedbox"><input type="text" name=""></div>
                                        </li>
                                    </ul>

                                    <button class="btn02">Save</button>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
            <!-- contact edit -->





            <!-- popup section -->

        </section>

        <!-- Dashboard ends -->

    </div>
</section>


@include('layouts.frontend.footer')




<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>


<script>
    jq162 = jQuery.noConflict(true);

    $('.deleteAddress').on('click', function() {
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
                    data: {
                        id: address
                    },
                    success: function(data) {
                        swal({
                            title: 'Success',
                            text: "Deleted",
                            icon: 'success',
                            buttons: true,
                            buttonsStyling: false,
                            reverseButtons: true
                        });
                        $('#removeRow' + address).hide();
                    }
                });
            }

        });
    });

    $('.defaultAddredd').on('click', function() {
        var address = $(this).data('id');

        jq162.ajax({
            type: "GET",
            url: "{{route('defaultAddress')}}",
            data: {
                id: address
            },
            success: function(data) {
                window.location.reload();
            }
        });

    });


    $('.editAddress').on('click', function() {
        var address = $(this).data('id');

        jq162.ajax({
            type: "GET",
            url: "{{route('editAddress')}}",
            data: {
                id: address
            },
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

<script>
    $('ul.tabs li').click(function() {
        var index = $(this).index();
        $('ul.tabs li').removeClass('active');
        $(this).addClass('active');
        $('.tab_content').removeClass('active');
        $('.tab_content:eq(' + index + ')').addClass('active');
    });
</script>








{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">

    <link href="css/font-awesome.css" rel="stylesheet">



    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">







</head>

<body>


    <section class="dashboard55">
        <div class="container">
            <!-- Dashboard starts -->

            <section class="dashboard_section">
                <div class="container">
                    <div class="row">
                        <div class="sidebar015 col-md-3">

                            <div class="sidebar012">

                                <div class="profbox45">
                                    <figure><img src="./images/team2-270x324.jpg" alt="profile image"></figure>

                                    <h3>John Sinha</h3>


                                </div>
                                <ul class="tabs">
                                    <li class="active"><i class="fa fa-user"></i>My Profile</li>
                                    <li><i class="fa fa-calendar"></i>My Booking</li>


                                </ul>


                                <button class="log456_btn"><i class="fa fa-sign-out"></i>LogOut</button>
                            </div>
                        </div>

                        <div class="main_section01 col-md-9">
                            <div class="tab_content active">
                                <div class="main_inner45">




                                    <div class="contact_info infobox25">

                                        <span class="subcont12"><label>Name</label> John Sinha</span>
                                        <span class="subcont12"><label>Email</label> JohnSinha@gmail.com</span>
                                        <span class="subcont12"><label>Phone</label> 9832987845</span>



                                        <div class="toptitle55">
                                            <h3 class="subtitle99">Address Information</h3>
                                        </div>



                                        <p>
                                            New Market, Block No-3, Near - Big Bazar, Post- Nimpura, Dist- Midnapur,
                                            City- Kharagpur, Pincode- 721305,

                                        </p>

                                        <button type="button" class="btn02" data-toggle="modal"
                                            data-target="#edit_address">
                                            Edit
                                        </button>

                                    </div>


                                </div>
                            </div>


                            <div class="tab_content">
                                <div class="main_inner45">





                                    <div class="booking_sec4589">
                                        <div class="row">


                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-4 col-sm-4  ordcl44">
                                                <div class="orderbox0155">
                                                    <figure><img src="./images/order.jpeg" alt="order image"></figure>
                                                    <div class="status054">Process</div>
                                                    <div class="orderinfo">
                                                        <h3>Package Title</h3>
                                                        <span>Booking Id: 5658784</span>
                                                        <span>Booking Date: 11-09-2022</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>



                        </div>
                    </div>
                </div>


                <!-- popup section -->











                <!-- Edit address -->
                <div class="modal fade " id="edit_address" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content dpop">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="popform56">
                                <h4>Edit Address</h4>

                                <div class="pform">
                                    <form>
                                        <ul class="form_sect465">
                                            <li>
                                                <label>Full Name</label>
                                                <div class="filedbox"><input type="text" name=""></div>
                                            </li>

                                            <li>
                                                <label>Phone Number</label>
                                                <div class="filedbox"><input type="text" name=""></div>
                                            </li>

                                            <li>
                                                <label> Address</label>
                                                <div class="filedbox"><textarea name=""></textarea></div>
                                            </li>
                                        </ul>

                                        <button class="btn02">Save</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- Edit address -->





                <!-- contact edit -->
                <div class="modal fade " id="exampleModalCenter" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content dpop">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                            <div class="popform56">
                                <h4>Contact Edit</h4>

                                <div class="pform">
                                    <form>
                                        <ul class="form_sect465">
                                            <li>
                                                <label>Full Name</label>
                                                <div class="filedbox"><input type="text" name=""></div>
                                            </li>

                                            <li>
                                                <label>Phone Number</label>
                                                <div class="filedbox"><input type="text" name=""></div>
                                            </li>

                                            <li>
                                                <label>Email Address</label>
                                                <div class="filedbox"><input type="text" name=""></div>
                                            </li>
                                        </ul>

                                        <button class="btn02">Save</button>
                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- contact edit -->





                <!-- popup section -->

            </section>

            <!-- Dashboard ends -->

        </div>
    </section>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="js/bootstrap.js"></script>





    <script>
        $('ul.tabs li').click(function() {
            var index = $(this).index();
            $('ul.tabs li').removeClass('active');
            $(this).addClass('active');
            $('.tab_content').removeClass('active');
            $('.tab_content:eq(' + index + ')').addClass('active');
        });
    </script>

</body>

</html> --}}