<div class="modal fade" id="editContactModal{{$contact->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('contact.update', $contact->id)}}" role="form" method="post">
                @csrf
                @method('put')

                <input class="form-control form-control-lg mb-3" type="text" placeholder="First Name..." name="first_name" required id="inputFirstName" value="{{$contact->first_name??''}}">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="form-control form-control-lg mb-3" type="text" placeholder="Last Name..." name="last_name" required id="inputLastName"value="{{$contact->last_name??''}}">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group mb-3">
                    <input type="email" name="email" placeholder="example@example.com" class="form-control-lg form-control" required value="{{$contact->email??''}}">
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="form-control form-control-lg mb-3" name="contact_number" type="number" placeholder="Contact Number..." required value="{{$contact->contact_number??''}}">
                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Contact</button>
            </form>
        </div>
      </div>
    </div>
</div>
