@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{route('contact.store')}}" method="POST">
                @csrf
                <input class="form-control form-control-lg mb-3" type="text" placeholder="First Name..." name="first_name" required>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="form-control form-control-lg mb-3" type="text" placeholder="Last Name..." name="last_name" required>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="example@example.com" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="form-control form-control-lg mb-3" name="contact_number" type="number" placeholder="Contact Number..." name="first_name" required>
                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="submit" class="btn btn-success">Create Contact</button>
            </form>
        </div>
    </div>
</div>
@endsection
