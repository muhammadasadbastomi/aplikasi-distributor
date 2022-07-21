<div class="modal fade" id="harianModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBulan">Cetak Data Perhari</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3 col">
                        <form target="_blank" id="tanggalForm" class="floating-labels m-t-40"
                            action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                <label for="formFile" class="form-label">Pilih Tanggal</label>
                                <input type="date" name="tanggal" class="form-control form-control-sm mb-3" id="input1" required>
                                </div>
                            </div>
                            
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fbi bi-printer-fill"></i>
                                        Cetak</button>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {
        $(".cetakHarian").click(function() {
            const route = $(this).data('route');
            $('#tanggalForm').attr('action',route);
        });
        });
    </script>
@endpush