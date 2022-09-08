@section('title', 'Contact List')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contact </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Contact </li>
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
                                    <h5 class="card-title mb-0">Contact List </h5>
                                </div>
                               
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example"
                                class="table table-bordered dt-responsive nowrap table-striped align-middle"
                                style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>SR No.</th>
                                        <th>User Name </th>
                                        <th>User Email </th>
                                        <th>User Contact no.</th>
                                        <th>Receive Files</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($all_contact as $key => $val)
                                    <tr id="removeRow{{$val->id}}">
                                        <td class="text-center">{{$key+1}}</td>
                                        <td>{{$val->user_name}}</td>
                                        <td>{{$val->user_email}}</td>
                                        <td>{{$val->contact_no}}</td>
                                        <td class="text-center">
                                            @if($val->shared_file)
                                                <a href="{{asset('extra_files')}}/{{$val->shared_file}}"><i class=" ri-download-2-line"> </i> File</a>
                                            @endif
                                            
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="javaScript:void(0);"
                                                            class="dropdown-item remove-item-btn delete_btn" data-id="{{$val->id}}">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6"> No new contacts. </td>
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
    <!-- End Page-content -->
    @include('layouts.backend.footer')

    <script>
        $('.delete_btn').on('click',function(){
            var contact_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this record!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteContact')}}",
                        data: { id: contact_id },
                        success: function(data) {
                            swal({
                                title: 'Success',
                                text: "Deleted",
                                icon: 'success',
                                buttons: true,
                                buttonsStyling: false,
                                reverseButtons: true
                            });
                            $('#removeRow'+contact_id).hide();
                        }
                    });
                }

            });
        });


          
    </script>