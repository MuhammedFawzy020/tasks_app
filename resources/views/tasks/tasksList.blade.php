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
                    <th>Assigned By</th>
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
            {{ $tasks->links() }}
           
            </div>
        </div>
    </div>
@endsection