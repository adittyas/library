{{-- modal --}}
<div class="modal fade" id="excelModal" tabindex="-1" role="dialog" aria-labelledby="excelModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Excel</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-secondary">
                <div class="container">
                    <h6 class="heading-small text-muted mb-4">Export Data To Excel</h6>
                    <a id='excelExport' class='btn btn-info w-100'>Export</a>
                    <hr class="my-3" />
                    <h6 class="heading-small text-muted mb-4">Import Data From Excel</h6>
                    <form id='excelImport' method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="custom-file">
                            <input type="file" name='excel' class="custom-file-input" id="customFile"
                                accept=".xlsx,.xlsm,.xltx,.xltm">
                            <label class="custom-file-label" for="customFile">search file excel...</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 float-right">Import</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
