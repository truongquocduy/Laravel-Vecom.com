@extends('front.layout.layout')
@section('content')
<div class="row justify-content-center pt-4 pb-4 bg-blog">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-12 text-light">
                <h4><strong>Blog</strong></h4>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-3">
    <div class="col-lg-10">
        <div class="row">
            <div class="col-lg-8 p-3">
                <div class="row">
                    @foreach($listBlogs as $blog)
                    <div class="col-lg-12 mb-5">
                        <img src="{{ asset('assets/images/blogs/' . $blog->image) }}" class="w-100" alt="">
                        <h4 class="title-blog-area mt-2">
                            <span></span>
                            {{ $blog->title }}
                        </h4>
                        <div class="blog-info">
                            <span>By Admin</span>
                            <span>Uncategorized</span>
                            <span>0 comment</span>
                            <span>8 Tháng 2, 2023</span>
                            <span><i class="fa-regular fa-heart"></i> 200</span>
                        </div>
                        <p class="blog-intro mt-2">
                            In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu imperdiet bibendum, velit diam iaculis velit, in ornare massa enim at lorem. Etiam risus diam, porttitor vitae ultrices quis. Dapibus id dolor. Morbi venenatis lacinia rhoncus. Pellentesque non bibendum tellus, vitae semper sem. Morbi nec porta sem, eget egestas leo. Donec imperdiet varius urna…
                        </p>
                        <a href="{{ route('front.blog.detail', [ 'slug' => $blog->slug ]) }}" class="btn btn-read-blog ps-3 pe-3 rounded-0">
                            Read More
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-4 p-3">
                <form action="#">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-0" placeholder="Tìm kiếm bài viết . . .">
                        <span class="input-group-text search-span">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                    </div>
                </form>
                <div id="latest-project" class="mt-2">
                    <h5 class="title-blog-area mt-2">
                        <span></span>
                        Latest Projects
                    </h5>
                    <div class="row">
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1522-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1422-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1322-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/12112-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/11132-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1522-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1522-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1522-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                        <div class="col-lg-4 col-4 p-2">
                            <img src="{{ asset('assets/images/blogs/1522-768x768.jpg') }}" class="w-100" alt="">
                        </div>
                    </div>
                    <h5 class="title-blog-area mt-2">
                        <span></span>
                        Social
                    </h5>
                    <div class="product-detail-social mt-3">
                        <span class="s-facebook">
                            <i class="fa-brands fa-facebook"></i>
                        </span>
                        <span class="s-twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </span>
                        <span class="s-google">
                            <i class="fa-brands fa-google"></i>
                        </span>
                        <span class="s-pinterest">
                            <i class="fa-brands fa-pinterest"></i>
                        </span>
                        <span class="s-invision">
                            <i class="fa-brands fa-invision"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection