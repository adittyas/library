<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <form id='bookingForm' action="{{ route('booking.store') }}" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_booking" id='id_booking'>
                <div class="modal-header">
                    <h2 class="modal-title" id="bookingModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">
                    <h6 class="heading-small text-muted mb-4">Booking information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="code">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">BK</span>
                                        </div>
                                        <input type="text" class="form-control pl-2" name='code' id='code'
                                            placeholder="code" aria-label="code" aria-describedby="basic-addon1"
                                            disabled>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="member_booking">ID Member</label>
                                    <select type="text" name='member_booking' id="member_booking"
                                        class="form-control form-control-alternative" placeholder="ID Member"
                                        required></select>
                                </div>
                            </div> --}}
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="member_booking">Member</label>
                                    <input type="text" id="field1" name='field1'
                                        class="form-control form-control-alternative" placeholder="ID Member" required>
                                    <input type="hidden" name="member_booking" id="member_booking">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="member_booking">Book</label>
                                    <input type="text" id="field2" name='field2'
                                        class="form-control form-control-alternative" placeholder="ID Member" required>
                                    <input type="hidden" name="book_booking" id="book_booking">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id='submit' class="btn btn-primary"></button>
                </div>
            </form>
        </div>
    </div>
</div>
