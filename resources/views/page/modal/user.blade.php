<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='userForm' action="{{ route('master.store') }}" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_user" id='id_user'>
                <div class="modal-header">
                    <h2 class="modal-title" id="userModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">

                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="firstName_user">First name</label>
                                    <div class="checkValidate">
                                        <input type="text" name='firstName_user' id="firstName_user"
                                            class="form-control form-control-alternative" placeholder="First name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="lastName_user">Last name</label>
                                    <div class="checkValidate">
                                        <input type="text" name='lastName_user' id="lastName_user"
                                            class="form-control form-control-alternative" placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="idEmployee_user">ID Employee</label>
                                    <div class="checkValidate">
                                        <input type="text" maxlength="4" name='idEmployee_user' id="idEmployee_user"
                                            class="form-control form-control-alternative" placeholder="ID Employee">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label" for="role_user">Departement</label>
                                        <div class="checkValidate">
                                            <select id='role_user' name='role_user' class="form-control"
                                                title='Please select something!'>
                                                <option value=''>Select...</option>
                                                <option value='admin'>Admin</option>
                                                <option value='master'>Master</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id='emailGroup'>
                            <label class="form-control-label" for="email_user">Email address</label>
                            <div class="checkValidate">
                                <input type="email" name='email_user' id="email_user"
                                    class="form-control form-control-alternative" placeholder="abc@example.com">
                            </div>
                        </div>
                    </div>
                    <hr class="my-3" />
                    <!-- Address -->
                    <h6 class="heading-small text-muted mb-4">Contact Information</h6>
                    <div class="px-lg-3">
                        <div class="form-group">
                            <label class="form-control-label" for="address_user">Address</label>
                            <div class="checkValidate">
                                <input type="text" id="address_user" name='address_user'
                                    class="form-control form-control-alternative" placeholder="Address now">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="provinces_user">The Provinces</label>
                                    <select id='provinces_user' name='provinces_user' class="form-control"
                                        title='Please select province!'>
                                        <option value=''>Select...</option>
                                        {{-- province --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="districts_user">Districts</label>
                                    <select id='districts_user' name='districts_user' class="form-control"
                                        title='Please select district!'>
                                        <option value=''>Select...</option>
                                        {{-- province --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="subDistricts_user">Sub Districts</label>
                                    <select id='subDistricts_user' name='subDistricts_user' class="form-control"
                                        title='Please select sub district!'>
                                        <option value=''>Select...</option>
                                        {{-- province --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="urbanVillage_user">Urban Village</label>
                                    <select id='urbanVillages_user' name='urbanVillages_user' class="form-control"
                                        title='Please select urban village!'>
                                        <option value=''>Select...</option>
                                        {{-- province --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="postalCode_user">Postal Code</label>
                                    <div class="checkValidate">
                                        <input maxlength="5" name='postalCode_user' type="text" id="postalCode_user"
                                            class="form-control form-control-alternative" placeholder="00000">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="contact_user">Contact</label>
                            <div class="checkValidate">
                                <input maxlength="13" type="text" id="contact_user" name='contact_user'
                                    class="form-control form-control-alternative" placeholder="Contact">
                            </div>

                        </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id='submit' class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
