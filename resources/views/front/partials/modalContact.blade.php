<div class="modal fade" id="showContactModal{{$contact->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="contact-data-container d-flex justify-content-between align-items-center">
                <strong>First Name</strong>
                <p>{{$contact->first_name??""}}</p>
            </div>
            <div class="contact-data-container d-flex justify-content-between align-items-center">
                <strong>Last Name</strong>
                <p>{{$contact->last_name??""}}</p>
            </div>
            <div class="contact-data-container d-flex justify-content-between align-items-center">
                <strong>Email</strong>
                <p><a href="mailto:{{$contact->email??''}}">{{$contact->email??""}}</a></p>
            </div>
            <div class="contact-data-container d-flex justify-content-between align-items-center">
                <strong>Contact Number</strong>
                <p><a href="tel:{{$contact->contact_number??''}}">{{$contact->contact_number??""}}</a></p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>