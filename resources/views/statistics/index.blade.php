@extends('layouts.dashboardApp')

@section('content')
    
                <div class="card">
                    <div class="card-header" style="background-color:white;">
                      <h4>{{ __('User Task Statistics') }}</h4>
                    </div>

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
       
@endsection