@extends('admin.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-body">

                @if($video->editable())
                    <form action="{{ route('videos.update', $video->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                @endif

                   <div class="form-group row justify-content-center">


                         <div class="col-lg-6">
                             <div class="card">
                                 <div class="card-body">
                                     @if ($errors->any())
                                         <div class="alert alert-danger">
                                             <ul>
                                                 @foreach ($errors->all() as $error)
                                                     <li>{{ $error }}</li>
                                                 @endforeach
                                             </ul>
                                         </div>
                                     @endif
                                     <h4 class="mt-0 header-title">{{ $video->title }}</h4>
                                     <div class="embed-responsive embed-responsive-21by">
                                         <video-js id="video" class="vjs-default-skin" controls preload="auto" width="640" height="268">
                                             <source src='{{ asset(Storage::url("videos/{$video->id}/{$video->id}.m3u8")) }}' type="application/x-mpegURL">
                                         </video-js>
                                     </div>
                                 </div>
                             </div>

                             <div class="d-flex justify-content-between align-items-center">
                                 <div>
                                     <h5 class="mt-3">
                                         @if($video->editable())
                                           <input type="text" class="form-control" value="{{ $video->title }}" name="title">
                                         @else
                                         {{ $video->title }}
                                         @endif
                                     </h5>
                                     {{ $video->views }} {{ str_plural('view', $video->views) }}
                                 </div>

                                 <hr>

                                 <votes :default_votes='{{ $video->votes }}' entity_id="{{ $video->id }}" entity_owner="{{ $video->channel->user_id }}"></votes>


                             </div> <!-- end col -->

                             <hr>

                             <div>
                                 @if($video->editable())
                                     <textarea name="description" cols="3" rows="3" class="form-control">{{ $video->description }}</textarea>

                                     <div class="text-right mt-4">
                                         <button class="btn btn-info btn-sm" type="submit">Update video details</button>
                                     </div>
                                 @else
                                     {{ $video->description }}
                                 @endif
                             </div>

                             <hr>

                             <div class="d-flex justify-content-between align-items-center mt-5">
                                 <div class="media">
                                     <img class="rounded-circle" src="https://picsum.photos/id/42/200/200" width="50" height="50" class="mr-3" alt="...">
                                     <div class="media-body ml-2">
                                         <h5 class="mt-0 mb-0">
                                             {{ $video->channel->name }}
                                         </h5>
                                         <span class="small">Published on {{ $video->created_at->toFormattedDateString() }}</span>
                                     </div>
                                 </div>

                                 <subscribe-button :channel="{{ $video->channel }}" :initial-subscriptions="{{ $video->channel->subscriptions }}" />

                             </div>
                         </div>



                     </div>

                 @if($video->editable())
                    </form>
                 @endif

                </div>
                  <div class="mx-auto" style="width: 600px;">
                       <comments :video="{{ $video }}"></comments>
                  </div>

            </div> <!-- end row -->

        </div>
    </div>
 </div>
@endsection

@section('styles')

    <link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">

    <style>
        .thumbs-up, .thumbs-down {
            width: 20px;
            height: 20px;
            cursor: pointer;
            fill: currentColor;
        }
        .thumbs-down-active, .thumbs-up-active {
            color: #3EA6FF;
        }
        .thumbs-down {
            margin-left: 1rem;
        }
    </style>

    <style>
        .w-full {
            width: 100% !important;
        }
        .w-80 {
            width: 80% !important;
        }
    </style>

@endsection

@section('scripts')

    <script src='https://vjs.zencdn.net/7.5.4/video.js'></script>

    <script>
        window.CURRENT_VIDEO = '{{ $video->id }}'
    </script>

    <script src='{{ asset('js/player.js') }}'></script>

@endsection