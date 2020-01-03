<!-- Guest -->
<div class="modal fade" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="guestModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='guestForm' action="#" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="guest_id" id='guest_id'>
                <div class="modal-header">
                    <h2 class="modal-title" id="guestModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">
                    <h6 class="heading-small text-muted mb-4">Guest information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="iden_guest">Guest ID</label>
                                    <input maxlength='16' type="text" name='iden_guest' id="iden_guest"
                                        class="form-control form-control-alternative" placeholder="ID Guest" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="info_guest">Type</label>
                                    {{-- <div class="checkValidate"> --}}
                                    <select id='type_guest' name='type_guest' class="form-control"
                                        title='Please select something!' required>
                                        <option value=''>Select...</option>
                                        @foreach ($type as $item)
                                        <option value='{{ $item }}'>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    {{-- </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name_guest">Name</label>
                                    <input type="text" name='name_guest' id="name_guest"
                                        class="form-control form-control-alternative" placeholder="Name Guest" required>
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
