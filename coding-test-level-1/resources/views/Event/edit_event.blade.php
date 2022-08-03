@extends('layout.mainlayout')
@section('content')
    <div class="album text-muted">
        <div class="container mt-2 rounded bg-secondary p-5">
            <h2 class="text-white">Edit Event</h2>
            <form action="{{ Route('update', $event->id) }}" method="POST">
                <div class="row">
                    @method('PATCH') @csrf
                    <div class="col-6 mb-2">
                        <label class="form-control-label text-white">ID:</label>
                        <input class="form-control" name="id" type="text" disabled value="{{ $event->id }}">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-control-label text-white">Name:</label>
                        <input class="form-control" name="name" type="text" value="{{ $event->name }}">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-control-label text-white">Created At:</label>
                        <input class="form-control" type="text" disabled
                            value="{{ Carbon\Carbon::parse($event->created_at)->format('d/m/Y') }}">
                    </div>
                    <div class="col-6 mb-2">
                        <label class="form-control-label text-white">Updated At:</label>
                        <input class="form-control" type="text" disabled
                            value="{{ Carbon\Carbon::parse($event->updated_at)->format('d/m/Y') }}">
                    </div>
                    <div class="col-12 mt-2 d-flex justify-content-end"><a href="{{ Route('index') }}">
                            <button type="submit" class="btn btn-primary">Save</button>&nbsp;&nbsp;
                            <a href="{{ Route('index') }}"><button type="button" class="btn btn-danger">Back</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
