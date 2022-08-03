@extends('admin.application.master')

@section('content')

<div class="card">
    <div class="card-header">Edit Application</div>
    <div class="card-body">
        <form method="post" action="{{ route('admin.application.update', $application->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Last Name</label>
                <div class="col-sm-10">
                    <input type="text" name="lastName" class="form-control" value="{{ $application->lastName }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">First Name</label>
                <div class="col-sm-10">
                    <input type="text" name="firstName" class="form-control" value="{{ $application->firstName }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Middle Name</label>
                <div class="col-sm-10">
                    <input type="text" name="middleName" class="form-control" value="{{ $application->middleName }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Birth Date</label>
                <div class="col-sm-10">
                    <input type="date" name="birthDate" class="form-control" value="{{ $application->birthDate }}" />
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Application Gender</label>
                <div class="col-sm-10">
                    <select name="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Application Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" value="{{ $application->email }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Phone Number</label>
                <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="{{ $application->phone }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Company</label>
                <div class="col-sm-10">
                    <input type="text" name="company" class="form-control" value="{{ $application->company }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Address</label>
                <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" value="{{ $application->address }}" />
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Application Image</label>
                <div class="col-sm-10">
                    <input type="file" name="applicantImage" />
                    <br />
                    <img src="{{ asset('images/' . $application->applicantImage) }}" width="100" class="img-thumbnail" />
                    <input type="hidden" name="hidden_applicantImage" value="{{ $application->applicantImage }}" />
                </div>
            </div>

            <div class="text-center">
                <input type="hidden" name="hidden_id" value="{{ $application->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>

        </form>
    </div>
</div>
<script>
    document.getElementsByName('application_gender')[0].value = "{{ $application->application_gender }}";

</script>

@endsection('content')
