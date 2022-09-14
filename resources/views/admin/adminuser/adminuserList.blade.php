@section('title', 'Admin List')
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
                                    <h5 class="card-title mb-0">Admin User List </h5>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="{{route('addAdminuser')}}" class="btn btn-outline-success add-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Add Admin</a>
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
                                        <th>Name </th>
                                        <th>Email </th>
                                        <th>Phone Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $key=>$val)
                                    <tr id="removeRow{{$val->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->name}}</td>
                                        <td>{!!$val->email!!}</td>
                                        <td>{{$val->phone_no}}</td>
                                        <td>{{$val->address}}</td>
                                        <td>
                                            <a href="{{route('editAdminuser',['id'=>$val->id])}}"
                                                class="btn btn-outline-warning btn-sm">Edit</a>
                                            <a href="javaScript:void(0);"
                                                class="btn  btn-outline-danger btn-sm delete_btn"
                                                data-id="{{$val->id}}">Delete</a>
                                        </td>
                                    </tr>
                                    @empty

                                    <tr>
                                        <td>no data found</td>
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
</div>
</div>
</div>
@include('layouts.backend.footer')

<script>
    $('.delete_btn').on('click',function(){
        var banner_id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: "You won't delete this admin user!",
            icon: 'warning',
            buttons: true,
            buttonsStyling: false,
            reverseButtons: true
        }).then((confirm) => {
            if (confirm) {
                $.ajax({
                    type: "GET",
                    url: "{{route('deleteAdminuser')}}",
                    data: { id: banner_id },
                    success: function(data) {
                        swal({
                            title: 'Success',
                            text: "Deleted",
                            icon: 'success',
                            buttons: true,
                            buttonsStyling: false,
                            reverseButtons: true
                        });
                        $('#removeRow'+banner_id).hide();
                    }
                });
            }

        });
    });


      
</script>