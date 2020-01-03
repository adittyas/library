<!-- Modal -->
<div class="modal fade" id="publisherModal" tabindex="-1" role="dialog" aria-labelledby="publisherModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='publisherForm' action="{{ route('publisher.store') }}" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_publisher" id='id_publisher'>
                <div class="modal-header">
                    <h2 class="modal-title" id="publisherModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">
                    <h6 class="heading-small text-muted mb-4">Publisher information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name_publisher">Publisher Name</label>
                                    <input type="text" name='name_publisher' id="name_publisher"
                                        class="form-control form-control-alternative" placeholder="Publisher Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email_publisher">Email</label>
                                    <input type="email" name='email_publisher' id="email_publisher"
                                        class="form-control form-control-alternative" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="contact_publisher">Contact</label>
                                    <input type="text" pattern="[0-9]{1,12}" maxlength="12" name='contact_publisher'
                                        id="contact_publisher" class="form-control form-control-alternative"
                                        placeholder="Contact" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="address_publisher">Address</label>
                                    <textarea class="form-control form-control-alternative" id="address_publisher"
                                        name='address_publisher' rows="3" required></textarea>
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
