<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Publikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Publikasi/inputPublikasi') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Document Title</label>
                        <input type="text" id="title" name="document_title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="authors">Authors</label>
                        <input type="text" id="authors" name="authors" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" id="year" name="year" class="form-control col-md-2" required>
                    </div>
                    <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" id="source" name="source" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="affiliation">Affiliation</label>
                        <input type="text" id="affiliation" name="affiliation" class="form-control col-md-4" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="btnSubmit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>