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
                    <table class="w-100" id="event-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Event Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header"></div>
                <form action="{{ Route('delete') }}" method="POST">
                @method('DELETE') @csrf
                <input type="hidden" id="deleteid" name="id">
                <div class="modal-body">
                    <h3>You sure you want to delete event?</h3>
                </div>
                <div class="modal-footer"><button type="submit" class="btn btn-danger">Delete</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
