@section('title', 'Quick Links List')
@include('layouts.backend.header')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Quick Links </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                <li class="breadcrumb-item active">Quick Links </li>
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
                                    <h5 class="card-title mb-0">Quick Links List </h5>
                                </div>
                                <div class="col-2 text-right">
                                    <a href="{{route('addQuicklinks')}}" class="btn btn-outline-success add-btn"><i
                                            class="ri-add-line align-bottom me-1"></i> Add Quick Links</a>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="example" class="table  table-responsive " style="width:100%">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl.no</th>
                                        <th>Type</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($faqs as $key => $val)
                                    <tr id="removeRow{{$val->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            {{ucfirst($val->type)}}
                                        </td>
                                        <td>
                                            {{$val->title}}
                                        </td>
                                        <td>
                                            {!! $val->description !!}
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    <li><a class="dropdown-item edit-item-btn"
                                                            href="{{route('editQuicklinks',['id'=>$val->id])}}"><i
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
                                        <td class="text-center" colspan="9"> No faqs added yet </td>
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
            var link_id = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: "You won't delete this quets!",
                icon: 'warning',
                buttons: true,
                buttonsStyling: false,
                reverseButtons: true
            }).then((confirm) => {
                if (confirm) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('deleteQuicklinks')}}",
                        data: { id: link_id },
                        success: function(data) {
                            swal({
                                title: 'Success',
                                text: "Deleted",
                                icon: 'success',
                                buttons: true,
                                buttonsStyling: false,
                                reverseButtons: true
                            });
                            $('#removeRow'+link_id).hide();
                        }
                    });
                }

            });
        });


          
    </script>