@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="links-container d-flex justify-content-end mb-3">
                <a class="btn btn-success" data-toggle="modal" data-target="#addContactModal">Add Contact</a>
            </div>
            <div class="card">
            <div class="card-header">Welcome, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>These are your Contacts</p>
                    <div class="search-container d-flex justify-content-end mb-3">
                        <input class="form-control mr-sm-2 w-50 w-sm-25" type="search" aria-label="Search" id="searchInput">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="tableData">
                                @forelse ($contacts as $contact)
                                <tr>
                                    <td data-toggle="modal" data-target="#showContactModal{{$contact->id}}">{{$contact->getFullName()}}</td>
                                    <td  data-toggle="modal" data-target="#showContactModal{{$contact->id}}"><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                                    <td  data-toggle="modal" data-target="#showContactModal{{$contact->id}}"><a href="tel:{{$contact->contact_number}}">{{$contact->contact_number}}</a></td>
                                    <td class="d-flex">
                                        <button type="button" class="btn btn-warning mr-2" data-toggle="modal" data-target="#editContactModal{{$contact->id}}">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <form action="{{route('contact.destroy', $contact->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">
                                                <i class='far fa-trash-alt' aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <th colspan="4" class="text-center">There are no contacts</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>  

@foreach ($contacts as $contact)
    @include('front.partials.modalEditContact', $contact)
    @include('front.partials.modalContact', $contact)
@endforeach
@include('front.partials.modalAddContact')

@endsection

@section('push-scripts')

<script>
    $(document).ready(function () {
        $("#searchInput").on("keyup", function () {
            let value = $(this).val().toLowerCase();
            $("#tableData tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
@endsection