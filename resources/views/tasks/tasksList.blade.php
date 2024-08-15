@extends('layouts.dashboardApp')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">All Assigned Tasks</h4>
            </p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Assigned To</th>
                    <th>Admin</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->assignedTo->name }}</td>
                            <td>{{ $task->assignedBy->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center" style="justify-content: right !important;margin-top:20px;">
                {{ $tasks->links() }}
            </div>
           
            </div>
        </div>
    </div>
@endsection