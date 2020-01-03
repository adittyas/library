<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="bookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id='bookForm' action="{{ route('book.store') }}" class='customValidate'>
                @csrf
                @method('post')
                <input type="hidden" name="id_book" id='id_book'>
                <div class="modal-header">
                    <h2 class="modal-title" id="bookModalLabel"></h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body bg-secondary">
                    <h6 class="heading-small text-muted mb-4">Book information</h6>
                    <div class="px-lg-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="title_book">Title</label>
                                    <input type="text" name="title_book" id="title_book"
                                        class="form-control form-control-alternative" placeholder="Book title" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="author_book">Author</label>
                                    <input type="text" name="author_book" id="author_book"
                                        class="form-control form-control-alternative" placeholder="Author name"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="checkValidate">
                                        <label class="form-control-label" for="hal_book">Page</label>
                                        <input type="text" name="hal_book" id="hal_book"
                                            class="form-control form-control-alternative" placeholder="Page" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="category_book">Category</label>
                                    <div class="checkValidate">
                                        <select id='category_book' name='category_book' class="form-control"
                                            title='Please select something!'>
                                            <option value=''>Select...</option>
                                            @foreach ($category as $item)
                                            <option value='{{ $item }}'>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="publisher_book">Publisher</label>
                                    <div class="checkValidate">
                                        <select id='publisher_book' name='publisher_book' class="form-control"
                                            title='Please select something!'>
                                            <option value=''>Select...</option>
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
