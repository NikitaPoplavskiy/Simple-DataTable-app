@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <table class="yajra-datatable">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{$dataTable->scripts()}}
@endpush

