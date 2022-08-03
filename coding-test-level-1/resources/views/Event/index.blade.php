@extends('layout.mainlayout')
@section('content')
    <div class="album text-muted">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12">
                    <h1>All Event</h1>
                </div>
                <div class="col-12 m-3 d-flex justify-content-end">
                    <hr>
                    <a href="{{ Route('create') }}"><button class="btn btn-primary"><i class="las la-plus"></i></button></a>
                </div>
                <div class="col-12">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Event Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($events as $key=>$event)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><a href="{{ Route('show', $event->id) }}">{{ $event->name }}</a></td>
                                    <td>
                                        <a href="{{ Route('edit', $event->id) }}"><i class="las la-edit"></i></i></a>
                                        <a><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3"></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
