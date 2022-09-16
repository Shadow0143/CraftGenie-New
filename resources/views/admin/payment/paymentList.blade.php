@section('title', 'Payment Records')
@include('layouts.backend.header')



<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Payment </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Payment </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title mb-0">Payment List </h5>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>Package Name</th>
                                        <th>Transaction No. </th>
                                        <th>User Name </th>
                                        <th>Amount</th>
                                        <th>Allow Pay </th>
                                        <th>Status</th>
                                        <th>Order Details</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($payments as $key => $val)
                                    <tr class="text-center">
                                        <td>
                                            {{$val->title}}
                                        </td>
                                        <td>
                                            @if($val->transaction_no =='')
                                            <p class="text-primary text-center">---</p>
                                            @else
                                            {{$val->transaction_no}}
                                            @endif
                                        </td>

                                        <td>{{ucfirst($val->user_name)}}</td>


                                        <td>{{$val->amount}} /-</td>
                                        <td>
                                            @if($val->paymentStatus =='1')
                                            <a href="javaScript:void(0);"
                                                class="btn btn-sm btn-outline-dark allowPayment"
                                                data-id="{{$val->paymentid}}"> Asign
                                                Amount and allow </a>
                                            @endif

                                        </td>
                                        <td>
                                            @if($val->paymentStatus =='1')
                                            <p class="text-center text-danger">Order Start.</p>
                                            @endif
                                            @if($val->paymentStatus =='2')
                                            <p class="text-center text-warning"> Proccessing .</p>
                                            @endif

                                            @if($val->paymentStatus == '3')
                                            <p class="text-center text-success"> Payment Done .</p>
                                            @endif
                                        </td>


                                        <td>
                                            <a href="{{route('orderDetails',['id'=>$val->paymentid])}}"
                                                class="btn btn-outline-primary btn-sm"> Order Details </a>
                                            @if($val->mssgCount >0)
                                            <span class="text-danger">
                                                <i class="ri-chat-2-line"></i>
                                                {{$val->mssgCount}}
                                            </span>

                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="9"> No banner added yet </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>






    <!-- Modal -->
    <div class="modal fade" id="assignAmountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Amount</h5>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <form action="{{route('assignAmount')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="amount">Enter Amount</label>

                        <input type="hidden" name="order_id" id="order_id" class="form-control order_id" value="">
                        <input type="text" name="amount" id="amount" class="form-control">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary btn-sm">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Page-content -->
    @include('layouts.backend.footer')

    <script>
        $('.allowPayment').on('click',function (){
            var payment_id = $(this).data('id');
            $('.order_id').val(payment_id);
            $('#assignAmountModal').modal('show');
        })
    </script>