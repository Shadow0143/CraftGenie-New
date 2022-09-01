@section('title', '| Blog Details')
@include('layouts.frontend.header')
{{-- <section>
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
</section>--}}


<style>


.top_panel_title.title_present.breadcrumbs_present .post_navi,
.top_panel_title.title_present.breadcrumbs_present .page_title,
.top_panel_title.title_present.breadcrumbs_present .breadcrumbs {
    max-width: 49%;
}

.top_panel_style_3 .post_navi,
.top_panel_style_3 .page_title,
.top_panel_style_3 .breadcrumbs {
    float: none !important;
    max-width: 100% !important;
    text-align: center;
}

.top_panel_title_inner {
    overflow: hidden;
}

.top_panel_title .page_title {
    float: left;
    margin: 0;
    font-weight: 600;
    font-size: 2.000em;
    /* Remove to default */
    padding: 0.8571em 0;
    /* 0.6667em 0; */
    line-height: 1.2em;
}

.top_panel_title .post_navi {
    float: left;
    padding: 1.6667em 0 2.5em;
    font-size: 0.875em;
    line-height: 1.5em;
}

.top_panel_style_3 .post_navi,
.top_panel_style_3 .page_title {
    padding: 3.3em 0 0.2em;
}

.top_panel_title .breadcrumbs {
    float: right;
    padding: 3.5em;
    font-size: 12px;
    font-weight: 400;
    line-height: 1.5em;
}

.top_panel_title .title_present_inner:not(.breadcrumbs_present_inner) .page_title {
    padding: 3em 0;
}

.top_panel_title.title_present:not(.navi_present) .breadcrumbs {
    padding: 0 0 9.8em;
}

.top_panel_style_3.title_present .breadcrumbs {
    padding: 0 0 1.5em 0;
}
.body_style_fullscreen .page_content_wrap {
    overflow: hidden;
    padding: 0;
}

/* .page_content_wrap {
    padding: 5.5em 0 0;
} */

html {
    overflow-x: hidden;
}

.page_content_wrap.page_paddings_no,
.body_style_fullscreen .page_content_wrap {
    padding: 0;
}


</style>

<section>
    <div class="main-content mt-5 pt-5 pl-5">
        <div class="page-content">
            <div class="container-fluid">
                <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
                    <div
                        class="top_panel_title_inner top_panel_inner_style_3 title_present_inner breadcrumbs_present_inner breadcrumbs_1">
                        <div class="content_wrap">
                            <h1 class="page_title">Blog</h1>
                            <div class="breadcrumbs">
                                <a class="breadcrumbs_item home" href="{{url('/home')}}">Home</a>
                                <span class="breadcrumbs_delimiter"> >> </span>
                                <span class="breadcrumbs_item current">Blog</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page_content_wrap page_paddings_yes">
                    <div class="content_wrap">
                        <div class="content">
                            <div class="isotope_wrap " data-columns="2">


                                <div class="isotope_item isotope_item_masonry isotope_item_masonry_2 isotope_column_3">

                                    <article
                                        class="post_item post_item_masonry post_item_masonry_2 post_format_standard">
                                        <div class="post_featured">
                                            <div class="post_thumb text-center" 
                                                data-title="English Coffeehouses in the 17th Century">
                                                {{-- <img width="370" height="246" alt="post-img"
                                                    src="{{$item['image']}}"> --}}
                                                <img src="{{asset('blogs')}}/{{$blog->image}}" alt="blog-image">
                                            </div>
                                        </div>
                                        <div class="post_content isotope_item_content blog-content mt-3  ">
                                            <h5 class="post_title">
                                                <span>{{$blog->title}}</span>
                                            </h5>
                                            <div class="post_info">
                                                <span class="post_info_item post_info_posted">
                                                    <span class="post_info_date"> {!! $blog->description !!}</span>
                                                </span>
                                            </div>
                                            <div class="post_descr">
                                                {{-- <p>{{$item['shortDescription']}}</p> --}}
                                            </div>
                                            {{-- <div class="blog-item">

                                                {!! html_entity_decode($item['metaTitle']) !!}
                                            </div> --}}
                                            <div class="blog-item-img mb-5">
                                                {{-- <img src="{{asset('blogs')}}/{{$blog->image}}" alt="blog-image"> --}}
                                            </div>
                                    </article>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.frontend.footer')