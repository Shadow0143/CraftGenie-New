@section('title', 'Package List')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Packages </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Packages </li>
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
                                    <h5 class="card-title mb-0">Packages List </h5>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="{{route('addPackages')}}" class="btn btn-outline-success add-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Add Packages</a>
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
                                        <th>Package Title </th>
                                        <th>Description </th>
                                        {{-- <th>Price</th> --}}
                                        <th>Uploaded File</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($packages as $key => $val)
                                    <tr id="removeRow{{$val->id}}" class="text-center">
                                        <td>{{$key+1}}</td>
                                        <td>{{$val->title}}</td>
                                        <td>{!!$val->description!!}</td>
                                        {{-- <td>{{$val->price}}</td> --}}
                                        <td>
                                            @if(!empty($val->file))
                                            @foreach($val->file as $key => $value)
                                            <a href="{{asset('extra_files')}}/{{$value->file_name}}" target="_blank">
                                                @if($value->extension == 'docx')
                                                <img class="file-img" src="{{asset('img/download.jpeg')}}"
                                                    alt="word-img">
                                                @elseif($value->extension == 'ppt')
                                                <img src="{{asset('img/ppt.png')}}" alt="ppt-img">
                                                @elseif($value->extension == 'xlxs' || $value->extension == 'xl')
                                                <img src="{{asset('img/excel.png')}}" alt="xl-img">
                                                @endif

                                            </a>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if($val->status =='YES')
                                            <span class="badge badge-soft-success">Active</span>
                                            @else
                                            <span class="badge badge-soft-danger">Inctive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{asset('packages')}}/{{$val->image}}"
                                                            class="dropdown-item" target="_blank"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View package image</a></li>
                                                    <li><a class="dropdown-item edit-item-btn"
                                                            href="{{route('editPackages',['id'=>$val->id])}}"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a href="javaScript:void(0);"
                                                            class="dropdown-item remove-item-btn delete_btn"
                                                            data-id="{{$val->id}}">
                                                            <i
                                                                class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="6"> No package added yet </td>
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
            var package_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this package!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deletePackages')}}",
                        data: { id: package_id },
                        success: function(data) {
                            swal({
                                title: 'Success',
                                text: "Deleted",
                                icon: 'success',
                                buttons: true,
                                buttonsStyling: false,
                                reverseButtons: true
                            });
                            $('#removeRow'+package_id).hide();
                        }
                    });
                }

            });
        });


          
    </script>