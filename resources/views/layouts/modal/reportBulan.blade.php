<div class="modal fade" id="bulanModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleBulan">Cetak Data Perbulan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="mb-3 col">
                        <form target="_blank" id="bulanForm" class="floating-labels m-t-40"
                            action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                <label for="formFile" class="form-label">Pilih Bulan</label>
                                <select name="month" id="month" class="form-select form-select-sm mb-3" >
                                    <option value="">Pilih Bulan</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                </div>
                                <div class="col">
                                <label for="formFile" class="form-label">Tahun</label>
                                    <input type="text" name="year" class="form-control form-control-sm mb-3" id="input1" required>
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
        $(".cetakBulan").click(function() {
            const route = $(this).data('route');
            $('#bulanForm').attr('action',route);
        });
        });
    </script>
@endpush