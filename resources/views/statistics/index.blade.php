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
                                @foreach ($stats as $userStats)
                                    <tr>
                                        <td>{{ $userStats->assignedTo->name }}</td>
                                        <td>{{ $userStats->task_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center" style="justify-content: right !important;margin-top:20px;">
                           {{ $stats->links() }}
                        </div>
                        
                    </div>
                </div>
       
@endsection