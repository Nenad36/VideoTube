@extends('admin.layout.master')
@section('content')

<div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mt-2">
                            <form action="">
                                <input type="text" name="search" class="form-control" placeholder="Search videos">
                            </form>
                        </div>
                    </div>
                </div>

                @if($channels->count() !== 0)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Channel</h4>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($channels as $channel)
                                        <tr>
                                          <td>{{ $channel->name }}</td>

                                            <td>
                                                <div>
                                                    <a href="{{ route('channels.show', $channel->id) }}" class="btn btn-info btn-sm">View Channel</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li>{{ $channels->appends(request()->query())->links() }}</li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                @endif()

                @if($videos->count() !== 0)
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Videos</h4>
                            <div class="table-responsive mt-4">
                                <table class="table table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($videos as $video)
                                        <tr>
                                            <td>
                                                <div>
                                                    <img src="{{ $video->thumbnail }}" alt="" class="thumb-sm rounded-circle mr-2"> {{ $video->title }}
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <a href="{{ route('videos.show', $video->id) }}" class="btn btn-info btn-sm">View Videos</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>

                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li>{{ $videos->appends(request()->query())->links() }}</li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                @endif()


            </div>
        </div>
    </div> <!-- end container-fluid -->

@endsection
