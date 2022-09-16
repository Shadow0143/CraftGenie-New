@section('title', '| FAQs')
@include('layouts.frontend.header')

<div class="main-content mt-5 pt-5 pl-5  pb-3"
    style="background-color: #efefef; border-bottom:1px solid rgb(206, 196, 196)">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row mr-2 mb-5">
                @foreach($faqs as $key => $val)

                <div class="card card-text mt-5 col-12 mr-2">
                    <h5 class="mt-3">{{$key+1}}. {{$val->title}}
                    </h5>
                    <p class="mb-2 pl-3">{!! $val->description !!}

                    </p>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</div>
@include('layouts.frontend.footer')