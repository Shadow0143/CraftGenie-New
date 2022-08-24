@section('title', '| Blog Details')
@include('layouts.frontend.header')
<section>
    <div class="main-content mt-5 pt-5 pl-5">
        <div class="page-content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-6">
                        <p class="mb-2">{{date('d F Y',strtotime($blog->created_at))}}</p>
                        <h1>{{$blog->title}}</h1>
                        <h5>{{$blog->subtitle}}</h5>
                    </div>
                    <div class="col-6">
                        <img src="{{asset('blogs')}}/{{$blog->image}}" alt="blog-image">
                    </div>
                    <div class="col-12 mb-5">
                        {!! $blog->description !!}
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
@include('layouts.frontend.footer')
