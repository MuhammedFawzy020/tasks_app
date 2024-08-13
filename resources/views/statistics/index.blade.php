@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('User Task Statistics') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Task Count</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topUsers as $userStats)
                                    <tr>
                                        <td>{{ $userStats->user->name }}</td>
                                        <td>{{ $userStats->task_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection