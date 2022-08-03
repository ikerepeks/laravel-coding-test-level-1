@extends('layout.mainlayout')
@section('content')
    <div class="album text-muted">
        <div class="container mt-2 rounded bg-secondary p-5">
            <h2 class="text-white">New Event</h2>
            <form action="{{ Route('put') }}" method="POST">
                <div class="row">
                    @method('PUT') @csrf
                    <div class="col-6 mb-2">
                        <label class="form-control-label text-white">Name:</label>
                        <input class="form-control" name="name" type="text">
                    </div>
                    <div class="col-12 mt-2 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save</button>&nbsp;&nbsp;
                            <a href="{{ Route('index') }}"><button type="button" class="btn btn-danger">Back</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
