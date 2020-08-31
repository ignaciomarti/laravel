@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="btn btn-success" href="{{route('contact.create')}}">Add Contact</a>
            <div class="card">
            <div class="card-header">Bienvenido, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>These are your Contacts</p>
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                                @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{$contact->getFullName()}}</td>
                                    <td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                                    <td><a href="tel:{{$contact->contact_number}}">{{$contact->contact_number}}</a></td>
                                    <td>
                                        <form action="{{route('contact.destroy', $contact->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit">
                                                <i class='far fa-trash-alt delete'></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th>There are no contacts</th>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
