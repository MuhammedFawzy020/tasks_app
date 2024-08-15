@extends('layouts.dashboardApp')

@section('content')


    <div class="card">
                  <div class="card-body">
                    <div class="card-header" style="background-color:white !important">
                    <h4 class="card-title">Assign a New Task</h4>
                    </div>
                    <form method="POST" action="{{ route('tasks-store') }}" style="padding-top:50px;">
                            @csrf

                            <div class="form-group row">
                                <label for="admin_name" class="col-md-4 col-form-label text-md-right">{{ __('Admin Name') }}</label>

                                <div class="col-md-6">
                                    <select id="admin_name" class="form-control @error('assigned_by_id') is-invalid @enderror select2" name="assigned_by_id" required>
                                        <option value="">Select Admin</option>
                                        @foreach ($adminUsers as $admin)
                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('assigned_by_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="assigned_to" class="col-md-4 col-form-label text-md-right">{{ __('Assigned User') }}</label>

                                <div class="col-md-6">
                                    <select id="assigned_to" class="form-control @error('assigned_to_id') is-invalid @enderror" name="assigned_to_id" required>
                                        <option value="">Select Assigned User</option>
                                        @foreach ($nonAdminUsers as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('assigned_to_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Task') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                  </div>
                </div>
<!-- Scripts -->

@endsection