@section('title', '| Order Lists')
@include('layouts.frontend.header')
<div class="main-content mt-5 pt-5 pl-5 mb-5">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">z
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title mb-0">Order List </h5>
                                </div>
                            
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Package Name </th>
                                        <th>Transaction No. </th>
                                        <th>Payment</th>
                                        <th>Amount</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($orderList as $key => $val)
                                    <tr id="removeRow{{$val->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->title}}</td>
                                        <td>{{$val->transaction_no}}</td>
                                        <td>{{$val->is_pay}}</td>
                                        <td>
                                            {{$val->amount}}
                                        </td>
                                        <td>
                                            {{date('d-M-Y',strtotime($val->created_at))}}
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6"> No order done  yet </td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
</div>
@include('layouts.frontend.footer')
