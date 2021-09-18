@extends('frontend.layouts.master')


@section('content')
    <div class="page-banner ovbl-dark" style="background-image:url({{ asset('images/banner/banner2.jpg')}});">
        <div class="container">
            <div class="page-banner-entry">
                <br/><br/>
                <h1 class="text-white">{{$course->course_title}}</h1>
            </div>
        </div>
    </div>

    <!-- Breadcrumb row -->
    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{route('course_details')}}">Home</a></li>
                <li><a href="#">Courses</a></li>
                <li>{{$course->course_title}}</li>
            </ul>
        </div>
    </div>

    <div class="content-block">
        <!-- About Us -->
        <div class="section-area section-sp1">
            <div class="container">
                <div class="row d-flex flex-row-reverse">
                    <div class="col-lg-4 col-md-4 col-sm-12 m-b30">
                        <div class="m-b30" id="curriculum">
                            <section id="accordion-hover">
                                <div class="row">
                                    <div class="col-lg-12 col-md-4 col-sm-12 m-b30">
                                        <div class="card collapse-icon">
                                            <div class="card-header">
                                                <h4 class="card-title">Curriculum</h4>
                                            </div>
                                            <div class="card-body">

                                                <div class="accordion" id="accordionExample{{$section->id}}"
                                                     data-toggle-hover="true">
                                                    <div class="collapse-default">
                                                        @if(count($course->sections) > 0)
                                                            @foreach($course->sections as $section)

                                                                <div class="card">
                                                                    <div
                                                                        class="card-header"
                                                                        id="heading{{$section->id}}"
                                                                        data-toggle="collapse"
                                                                        role="button"
                                                                        data-target="#collapse{{$section->id}}"
                                                                        aria-expanded="true"
                                                                        aria-controls="collapse{{$section->id}}"
                                                                    >
                                                                        <h5 class="curriculum-list"
                                                                            style="color:#ca2128; text-transform:uppercase;"> {{$section->section_name}} </h5>
                                                                    </div>

                                                                    <div
                                                                        id="collapse{{$section->id}}"
                                                                        class="collapse show"
                                                                        aria-labelledby="heading{{$section->id}}"
                                                                        data-parent="#accordionExample{{$section->id}}"
                                                                    >
                                                                        <div class="card-body">
                                                                            <div id="thumbs">
                                                                                <ul>
                                                                                    @if(count($section->lessons) > 0)
                                                                                        @foreach($section->lessons as $lesson)
                                                                                            <li>
                                                                                                <a class="font-weight-bold" id="{{$lesson->vimeo_id}}" >
                                                                                                    {{$lesson->lesson_title}} <span></span></a>
                                                                                            </li>
                                                                                            {{--<div class="curriculum-list-box">
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <span></span>

                                                                                                        <a class="font-weight-bold" href="https://vimeo.com/595181733" data-target="">{{$lesson->lesson_title}}</a>
                                                                                                    </div>
                                                                                                    <div class="col">
                                                                                                        <span>120 minutes</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>--}}

                                                                                        @endforeach
                                                                                    @endif
                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="courses-post">
                            <div class="ttr-post-media media-effect">
                                {{--@foreach($lessons as $lesson)

                    <div data-vimeo-id="{{$lesson->vimeo_id}}" data-vimeo-width="700" data-vimeo-height="400" id="{{$lesson->id}}"></div>
                                      <iframe src="https://player.vimeo.com/video/{{$lesson->id}}" width="{video_width}" height="{video_height}" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                  @endforeach--}}

                                <div id="player"></div>
                                <iframe src="https://player.vimeo.com/video/595181733" width="700" height="400"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen allow="autoplay"></iframe>

                            </div>

                            <div class="ttr-post-info">
                                <div class="ttr-post-title">
                                    <h2 class="post-title">{{$course->course_title}}</h2>
                                </div>
                                <div class="ttr-post-text">
                                    <p>{{$course->course_details->short_description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="courese-overview" id="overview">
                            <h4>Overview</h4>
                            <div class="row">
                                <div class="col-md-12 col-lg-4">
                                    <ul class="course-features">
                                        <li><i class="ti-book"></i> <span class="label">Lectures</span> <span
                                                class="value">8</span></li>
                                        <li><i class="ti-help-alt"></i> <span class="label">Quizzes</span> <span
                                                class="value">{{$course->course_details->quiz}}</span></li>
                                        <li><i class="ti-time"></i> <span class="label">Duration</span> <span
                                                class="value">60 hours</span></li>
                                        <li><i class="ti-stats-up"></i> <span class="label">Skill level</span> <span
                                                class="value">{{$course->course_details->skill}}</span></li>
                                        <li><i class="ti-smallcap"></i> <span class="label">Language</span> <span
                                                class="value">{{$course->course_details->language}}</span></li>
                                        <li><i class="ti-user"></i> <span class="label">Students</span> <span
                                                class="value">32</span></li>
                                        <li><i class="ti-check-box"></i> <span class="label">Assessments</span> <span
                                                class="value">Yes</span></li>
                                    </ul>
                                </div>
                                <div class="col-md-12 col-lg-8">
                                    <h5 class="m-b5">Course Description</h5>
                                    <p>{{$course->course_details->course_description}}</p>
                                    <h5 class="m-b5">Certification</h5>
                                    <p>{{$course->course_details->certification}}</p>
                                    <h5 class="m-b5">Learning Outcomes</h5>
                                    <ul class="list-checked primary">
                                        <li>{{$course->course_details->learning_outcomes}}</li>

                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="" id="instructor">
                            <h4>Instructor</h4>
                            <div class="instructor-bx">
                                <div class="instructor-author">
                                    <img src="{{ asset('images/testimonials/pic1.jpg')}}" alt="">
                                </div>

                                <div class="instructor-info">
                                    <h6>{{$course->course_details->instructor_id}}</h6>
                                    <span>Professor</span>
                                    <ul class="list-inline m-tb10">
                                        <li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm google-plus"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries</p>
                                </div>
                            </div>
                            <div class="instructor-bx">
                                <div class="instructor-author">
                                    <img src="{{ asset('images/testimonials/pic2.jpg')}}" alt="">
                                </div>
                                <div class="instructor-info">
                                    <h6>Keny White </h6>
                                    <span>Professor</span>
                                    <ul class="list-inline m-tb10">
                                        <li><a href="#" class="btn sharp-sm facebook"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm twitter"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm linkedin"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li><a href="#" class="btn sharp-sm google-plus"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                    <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to make a
                                        type specimen book. It has survived not only five centuries</p>
                                </div>
                            </div>
                        </div>
                        <div class="" id="reviews">
                            <h4>Reviews</h4>

                            <div class="review-bx">
                                <div class="all-review">
                                    <h2 class="rating-type">3</h2>
                                    <ul class="cours-star">
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li class="active"><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>3 Rating</span>
                                </div>
                                <div class="review-bar">
                                    <div class="bar-bx">
                                        <div class="side">
                                            <div>5 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width:90%;"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>150</div>
                                        </div>
                                    </div>
                                    <div class="bar-bx">
                                        <div class="side">
                                            <div>4 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width:70%;"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>140</div>
                                        </div>
                                    </div>
                                    <div class="bar-bx">
                                        <div class="side">
                                            <div>3 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width:50%;"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>120</div>
                                        </div>
                                    </div>
                                    <div class="bar-bx">
                                        <div class="side">
                                            <div>2 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width:40%;"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>110</div>
                                        </div>
                                    </div>
                                    <div class="bar-bx">
                                        <div class="side">
                                            <div>1 star</div>
                                        </div>
                                        <div class="middle">
                                            <div class="bar-container">
                                                <div class="bar-5" style="width:20%;"></div>
                                            </div>
                                        </div>
                                        <div class="side right">
                                            <div>80</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@push('scripts')
    <script src="https://player.vimeo.com/api/player.js"></script>

    <script>
       // Switch to the video when a thumbnail is clicked
       $('#thumbs a').click(function (event) {
           event.preventDefault();
           var vimeoid = $(this).attr('id');
           console.log(vimeoid)
           var iframe = document.querySelector('iframe');
           var player = new Vimeo.Player(iframe);
           //player.loadVideo(vimeoid)
          // getVideo(this.href);
           //return false;
           player.on('loaded', function () {
               player.play();
           });

           player.on('ended', playNext);

       });

        /*function switchVideo(video) {
            $('#embed').html(unescape(video.html));
        }*/

    </script>
    <script>
        var course_id = '<?php echo $course->id ?>';
        console.log(course_id)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("get-all-vimeo-id") }}',
            type: 'post',
            data: {'course_id': course_id },
            //dataType: "html",
            success: function (response) {
                console.log(response)

                var iframe = document.querySelector('iframe');
                var player = new Vimeo.Player(iframe);
                var video_ids = response;
                var index = 0;
                var playNext = function (data) {
                    alert('next');
                    player.pause();
                    if (index <= video_ids.length)
                        player.loadVideo(video_ids[index++])
                }
                player.pause();
                player.loadVideo(video_ids[index++]);
                player.on('loaded', function () {
                    player.play();
                });

                player.on('ended', playNext);
                response.forEach(function(item) {
                    console.log(item, $('#'+item +'span'),'asd');

                    player.loadVideo(item).then(() => {
                        player.ready().then(() => {
                            player.getDuration().then(function (data) {

                                var totalSec = data;
                                var hours = parseInt(totalSec / 3600) % 24;
                                var minutes = parseInt(totalSec / 60) % 60;
                                var seconds = totalSec % 60;

                                var result = (hours < 1 ? "" : hours + ":") + (minutes < 1 ? "0" : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds)
                                $('#'+item +' span').text(result)
                                console.log(result)
                            });
                        }).catch((err) => console.log(err));
                    })

                    // do something with `item`
                });

            }
        });


        /*var iframe = document.querySelector('iframe');
        var player = new Vimeo.Player(iframe);

        player.on('play', function() {
            console.log('played the video!');
        });

        player.getVideoTitle().then(function(title) {
            console.log('title:', title);
        });*/


    </script>
    @endpush
@endsection
