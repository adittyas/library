<!-- Modal -->
<div class="modal fade" id="bookInModal" tabindex="-1" role="dialog" aria-labelledby="bookInModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='bookInForm' action="#" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_bookIn" id='id_bookIn'>
                <input type="hidden" name="book_id" id='book_id'>
                <div class="modal-header">
                    <h2 class="modal-title" id="bookInModalLabel"></h2>
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
                                    <label class="form-control-label" for="qty_bookIn">Total Book</label>
                                    <input type="text" name='qty_bookIn' id="qty_bookIn"
                                        class="form-control form-control-alternative" placeholder="Total Book" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="info_bookIn">Information</label>
                                    {{-- <div class="checkValidate"> --}}
                                    <select id='info_bookIn' name='info_bookIn' class="form-control"
                                        title='Please select something!' required>
                                        <option value=''>Select...</option>
                                        @foreach ($info as $item)
                                        <option value='{{ $item }}'>{{ $item }}</option>
                                        @endforeach
                                    </select>
                                    {{-- </div> --}}
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
