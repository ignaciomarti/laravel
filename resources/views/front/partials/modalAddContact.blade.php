<div class="modal fade" id="addContactModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
                    <input type="email" name="email" placeholder="example@example.com" class="form-control-lg form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input class="form-control form-control-lg mb-3" name="contact_number" type="number" placeholder="Contact Number..." required>
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
</div>
