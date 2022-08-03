@extends('application.master')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Application Details</b></div>
            <div class="col col-md-6">
                <a href="{{ route('admin.application.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Application Name</b></label>
            <div class="col-sm-10">
                {{ $application->lastName}}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Application Email</b></label>
            <div class="col-sm-10">
                {{ $application->email }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Application Gender</b></label>
            <div class="col-sm-10">
                {{ $application->gender }}
            </div>
        </div>
        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Application Image</b></label>
            <div class="col-sm-10">
                <img src="{{ asset('images/' .  $application->applicantImage) }}" width="200" class="img-thumbnail" />
            </div>
        </div>
    </div>
</div>

@endsection('content')
