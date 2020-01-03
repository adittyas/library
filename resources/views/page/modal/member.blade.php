<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='memberForm' action="{{ route('member.store') }}" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_member" id='id_member'>
                <div class="modal-header">
                    <h2 class="modal-title" id="memberModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">
                    <h6 class="heading-small text-muted mb-4">member information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="nim_member">NIM</label>
                                    <input type="text" name='nim_member' id="nim_member" maxlength="10"
                                        pattern="[0-9]{10}" class="form-control form-control-alternative"
                                        placeholder="member Name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="name_member">Member Name</label>
                                    <input type="text" name='name_member' id="name_member"
                                        class="form-control form-control-alternative" placeholder="member Name"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email_member">Email</label>
                                    <input type="email" name='email_member' id="email_member"
                                        class="form-control form-control-alternative" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="contact_member">Contact</label>
                                    <input type="text" pattern="[0-9]{1,12}" maxlength="12" name='contact_member'
                                        id="contact_member" class="form-control form-control-alternative"
                                        placeholder="Contact" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-control-label">Status</label>
                                <div class="form-group" id='status'>
                                    <div class="custom-control d-inline-block custom-radio mr-3">
                                        <input name="status_member" class="custom-control-input" id="active_member"
                                            value='1' type="radio">
                                        <label class="custom-control-label" for="active_member">active</label>
                                    </div>
                                    <div class="custom-control d-inline-block custom-radio">
                                        <input name="status_member" class="custom-control-input" id="deactive_member"
                                            value='0' type="radio">
                                        <label class="custom-control-label" for="deactive_member">deactive</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12" id='reasonGroup'>
                                <div class="form-group">
                                    <label class="form-control-label" for="reason_member">Reason</label>
                                    <div class="checkValidate">
                                        <select id='reason_member' name='reason_member' class="form-control"
                                            title='Please select something!'>
                                            <option value=''>Select...</option>
                                            @foreach ($reason as $item)
                                            <option value='{{ $item }}'>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
