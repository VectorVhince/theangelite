@extends('layouts.app')

@section('title') Home @stop

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/css/swiper.min.css">


@section('content')
  <div class="container">
    <div class="panel panel-default bd-rad0 box-shadow panel-bg" style="background: transparent">
      <div class="row mg0">
        <div class="col-lg-9 pd0">
          @if(!$featured->isEmpty())
          <div class="swiper-container gallery-images">
            <div class="swiper-wrapper">

                @foreach($featured as $feature)
                <div class="swiper-slide">
                  <a href="{{ route('posts.show',$feature->id) }}" class="fs20 fc-white">
                    <div class="swiper-slide-text">
                      {{ $feature->title }}
                    </div>
                  </a>
                  <img src="{{ asset('img/uploads/' . $feature->imageExists()) }}" class="img-responsive" style="width: 100%;">
                </div>
                @endforeach

            </div>
            <div class="swiper-pagination"></div>        
            <!-- <div class="swiper-button-prev"><span class="glyphicon glyphicon-chevron-left fs25"></span></div>
            <div class="swiper-button-next"><span class="glyphicon glyphicon-chevron-right fs25"></span></div> -->          
          </div>
          @else
          <div class="row swiper-container" style="background-color: #fff;">
            <div class="col-lg-12 text-center pdv200">
              <span class="fs25">Nothing featured.</span>
            </div>
          </div>
          @endif
        </div>
        <div class="col-lg-3 pd0">
          <div class="bgc-black-t ht400">
            <div class="row mg0">
              <div class="dp-bl fc-white fs20 pd10 short-shadow bgc-red col-sm-12;" style="font-family: BKANT;">&nbsp
                TRENDING NEWS
              </div>
            </div>
            <div class="trending-panel-of trending-panel-scrollbar">
            @if(!$views->isEmpty())
              @foreach($views as $view)
                <a href="{{ route('posts.show',$view->id) }}" class="fc-white">
                  <div class="row mgh0 trending-panel bg-blue-hover">
                    <div class="col-sm-4 pdh0">
                      <img src="{{ asset('img/uploads/thumbnails/' . $view->thumbExists()) }}" class="img-responsive" style="width: 100%;">
                    </div>
                    <div class="col-sm-8 pdr0">
                      {{ $view->title }}
                    </div>
                  </div>
                </a>
              @endforeach
            @else
              <div class="text-center fc-white mgv20">No trending yet.</div>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">News</div>
          <div class="panel-body">
            @if(isset($news_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $news_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $news_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $news_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($news as $new)
              <a href="{{ route('posts.show', $new->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $new->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $new->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.news') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>  

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">Editorial</div>
          <div class="panel-body">
            @if(isset($editorials_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $editorials_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $editorials_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $editorials_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($editorials as $editorial)
              <a href="{{ route('posts.show', $editorial->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $editorial->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $editorial->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.editorial') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">Opinion</div>
          <div class="panel-body">
            @if(isset($opinions_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $opinions_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $opinions_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $opinions_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($opinions as $opinion)
              <a href="{{ route('posts.show', $opinion->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $opinion->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $opinion->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.opinion') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">Feature</div>
          <div class="panel-body">
            @if(isset($features_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $features_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $features_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $features_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($features as $feature)
              <a href="{{ route('posts.show', $feature->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $feature->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $feature->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.feature') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">Humor</div>
          <div class="panel-body">
            @if(isset($humors_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $humors_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $humors_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $humors_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($humors as $humor)
              <a href="{{ route('posts.show', $humor->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $humor->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $humor->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.humor') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">Sports</div>
          <div class="panel-body">
            @if(isset($sports_first))
            <div class="row">
              <div class="col-md-6 text-center">
                <div class="bg-blue-hover pd15">
                  <a href="{{ route('posts.show', $sports_first->id) }}" class="fc-black">
                    <div class="mgb10">
                      <img src="{{ asset('img/uploads/' . $sports_first->imageExists()) }}" class="img-responsive img-thumbnail dp-bl">
                    </div>
                    <span class="fs17 dp-bl"><b>{{ $sports_first->title }}</b></span>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mgv10 pdl0">
              @foreach($sports as $sport)
              <a href="{{ route('posts.show', $sport->id) }}" class="fc-black dp-bl">
                <div class="row mg0 bg-blue-hover pd5">
                  <div class="col-sm-4 pdl0">
                    <img src="{{ asset('img/uploads/thumbnails/' . $sport->thumbExists()) }}" class="img-responsive img-thumbnail dp-bl">
                  </div>
                  <div class="col-sm-8 pdl0">
                    <span class="fs17 dp-bl"><b>{{ $sport->title }}</b></span>
                  </div>
                </div>
              </a>
              <div style="height: 1px;" class="bgc-gray mgv20"></div>
              @endforeach
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 col-md-offset-9">
                <a href="{{ route('index.sports') }}">
                  <div class="fc-white btn-black mgt20 text-center">
                    <span class="glyphicon glyphicon-plus"></span> View More
                  </div>
                </a>
              </div>
            </div>
            @else
            <div class="row">
              <div class="col-lg-12 text-center">
                <span class="fs15 mgv20">Nothing posted.</span>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20" style="font-family: BKANT;">HAU FlashLite News | Events</div>
          <div class="panel-body">
            @if(!$announcements->isEmpty())
            <ul>
            @foreach($announcements as $announcement)
              <li class="mgv10 adminHover" data-id="{{ $announcement->id }}">
                <form action="{{ route('delete.announcement',$announcement->id) }}" method="post" class="form-inline">
                  {{ csrf_field() }}
                  {{ method_field('delete') }}
                  <span class="fs15 break-word">{!! $announcement->body !!}</span>
                  @if(Auth::user())
                    @if(Auth::user()->role == 'superadmin')
                      <div class="pull-right mgr20 dp0 adminButtons{{ $announcement->id }}">
                        <a href="{{ route('edit.announcement',$announcement->id) }}" data-toggle="tooltip" title="Edit"><img src="{{ asset('img/edit.png') }}" class="ht25"></a>
                        <button type="submit" class="bd0 bgc0" data-toggle="tooltip" title="Delete"><img src="{{ asset('img/delete.png') }}" class="ht25"></button>
                      </div>
                    @endif
                  @endif
                </form>
              </li>
            @endforeach
            </ul>
            @else
            <span class="dp-bl fs15 text-center">No announcements.</span>
            @endif
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="panel panel-default bd-rad0 box-shadow panel-bg">
          <div class="bgc-red pd5 fc-white fs20 short-shadow" style="font-family: BKANT;">The Angelite Newspaper </div>
          <div class="panel-body">
            @if(Auth::user())
            @foreach($mypdfs as $mypdf)
                
                <a href="{{route('pdf.file', $mypdf->filename)}}">{{$mypdf->filename}}</a><br>
                  <form action="{{route('delete.pdf', $mypdf->id)}}" method="GET">
                   <input type="hidden" name="_method" value="DELETE">
                   <input type="hidden" name="_token" value="csrf_token()">
                   <input type="submit" class="btn btn-primary" value="Delete">
                  </form>
            @endforeach

           <form action="{{route('upload.file')}}" id="upload" method="POST" enctype="multipart/form-data">             
              <input type="file" name="upload_file" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Upload PDF" id="upload_file">           
              <input type="file" name="upload_cover" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Upload Cover Photo" id="upload_cover"><br />
               {{ csrf_field() }}
              <input type="submit" class="btn btn-success">
          </form>
            @else
            
            @foreach($mypdfs as $mypdf)
            <img src="{{ asset('/files/cover_photo/' . $mypdf->cover_photo) }}" alt=""><br>
            <a href="{{route('pdf.file', $mypdf->filename)}}">{{$mypdf->filename}}</a><br>
            @endforeach       
            <span class="dp-bl fs15 text-center"></span>
            @endif
          </div>
        </div> 
      </div>
    </div>
  </div>
@stop

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.1/js/swiper.min.js"></script>
<script src="/js/bootstrap-filestyle.js"></script>
<script>
  $(document).ready(function(){
    var galleryTop = new Swiper('.gallery-images', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: 7000,
        loop: true,
        effect: 'fade',
        autoplayDisableOnInteraction: false,
        grabCursor: true,
        lazyLoading: true
    });

    var announcementId = "";
    $('.adminHover').on('mouseenter', function(){
      announcementId = $(this).data('id');
      $('.adminButtons' + announcementId).show();
    }).on('mouseleave', function(){
      announcementId = $(this).data('id');
      $('.adminButtons' + announcementId).hide();
    });
  });


</script>


@stop