<?= $this->extend('layanan/layout/navbar_anggaran'); ?>
<?= $this->section('content'); ?>
    <div id="layoutSidenav_content">
        <main>
        <div class="container-fluid ">
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-table me-1"></i>Buat Laporan Anggaran Desa</h4> 
                </div>
                <div class="card-body">
                    <a href="/anggaran/tambah_anggaran">
                        <button class="btn btn-primary mb-3" id="btnSubmit"> 
                        <i class="fa-solid fa-square-plus fa-lg"></i>
                        Simpan Laporan
                        </button>
                    </a>
                    <div class="px-auto">
                        <form id="form_tahun">
                            <label for="tahun">Silahkan Masukkan Tahun Anggaran</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="tahun" name="tahun">
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                            <div class="mx-2 my-4">
                                <div class="card">
                                    <h5 class="fw-bold card-header">Pendapatan Desa</h5>
                                    <div class="mx-3 my-3 ">
                                        <div class="table-responsive">
                                        <form id="form_pendapatan">
                                            <table class="table table-striped table-preview">
                                                <thead class="thead-light text-center">
                                                    <tr>
                                                        <th class="bg-danger text-white">Sumber</th>
                                                        <th class="bg-danger text-white">Detail Sumber</th>
                                                        <th class="bg-danger text-white">Anggaran</th>
                                                        <th class="bg-danger text-white">Realisasi</th>
                                                        <th class="bg-danger text-white">Selisih</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tambah_form_pendapatan">
                                                    <div class="pendapatan">
                                                    <tr>
                                                        <input type="hidden" id="tahun_pendapatan" name="tahun_pendapatan">
                                                        <td>
                                                            <input type="text" class="form-control" id="sumber1" name="sumber[]" placeholder="Sumber...">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" id="detail_sumber1" name="detail_sumber[]" placeholder="Detail Sumber...">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control anggaran" id="detail_anggaran1" name="detail_anggaran[]" placeholder="Anggaran...">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control realisasi" id="detail_realisasi1" name="detail_realisasi[]" placeholder="Realisasi...">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control selisih" id="detail_selisih1" name="detail_selisih[]" placeholder="Selisih...">
                                                        </td>
                                                    </tr>
                                                    </div>
                                                </tbody>
                                            </table>
                                            <button type="button" id="tambah_input_pendapatan" class="btn btn-primary">Tambah Inputan</button>
                                            <button type="button" id="hapus_input_pendapatan" class="btn btn-danger">Hapus Inputan</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-2 my-4">
                                <div class="card ">
                                    <h5 class="fw-bold card-header">Belanja Desa</h5>
                                    <div class="mx-3 my-3">
                                        <div class="table-responsive">
                                            <form id="form_belanja">
                                            <table class="table table-striped table-preview">
                                                <thead class="thead-light text-center ">
                                                    <th class="bg-danger text-white">Sumber</th>
                                                    <th class="bg-danger text-white">Anggaran</th>
                                                    <th class="bg-danger text-white">Realisasi</th>
                                                    <th class="bg-danger text-white">Selisih</th>
                                                </thead>
                                                <tbody id="tambah_form_belanja">
                                                        <tr>
                                                            <input type="hidden" id="tahun_belanja" name="tahun_belanja">
                                                            <td>
                                                                <input type="text" class="form-control" id="sumber_belanja1" name="sumber_belanja[]" placeholder="Sumber...">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control anggaran" id="belanja_anggaran1" name="belanja_anggaran[]" placeholder="Anggaran...">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control realisasi" id="belanja_realisasi1" name="belanja_realisasi[]" placeholder="Realisasi...">
                                                            </td>
                                                            <td>
                                                                <input type="text" class="form-control selisih" id="belanja_selisih1" name="belanja_selisih[]" placeholder="Selisih...">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <button type="button" id="tambah_input_belanja" class="btn btn-primary">Tambah Inputan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
    <script>
    $(document).ready(function() {

    var p = 2;
    var b = 2;
        // Fungsi untuk menambahkan baris input
        function initInputFormat() {
            $(".anggaran, .realisasi").off("input").on("input", function() {
            var value = $(this).val().replace(/\./g, ""); // Menghapus titik pemisah ribuan
            if (value !== "") {
                // Mengecek apakah nilai input tidak kosong
                value = parseInt(value, 10); // Mengubah nilai menjadi tipe integer
                $(this).val(value.toLocaleString("id-ID")); // Mengatur nilai input dengan format ribuan
            }
            });
        }
        // Fungsi untuk menambahkan baris input
        $("#tambah_input_pendapatan").click(function() {
            $('#tambah_form_pendapatan').append(`
                <tr>
                    <td>
                        <input type="text" class="form-control" id="sumber${p}" name="sumber[]" placeholder="Sumber...">
                    </td>
                    <td>
                        <input type="text" class="form-control" id="detail_sumber${p}" name="detail_sumber[]" placeholder="Detail Sumber...">
                    </td>
                    <td>
                        <input type="text" class="form-control anggaran" id="detail_anggaran${p}" name="detail_anggaran[]" placeholder="Anggaran...">
                    </td>
                    <td>
                        <input type="text" class="form-control realisasi" id="detail_realisasi${p}" name="detail_realisasi[]" placeholder="Realisasi...">
                    </td>
                    <td>
                        <input type="text" class="form-control selisih" id="detail_selisih${p}" name="detail_selisih[]" placeholder="Selisih...">
                    </td>
                </tr>
            `);
            p++;
            initInputFormat();
        });

        $("#tambah_input_belanja").click(function() {
            $('#tambah_form_belanja').append(`
                <tr>
                    <td>
                        <input type="text" class="form-control" id="sumber_belanja${b}" name="sumber_belanja[]" placeholder="Sumber...">
                    </td>
                    <td>
                        <input type="text" class="form-control anggaran" id="belanja_anggaran${b}" name="belanja_anggaran[]" placeholder="Anggaran...">
                    </td>
                    <td>
                        <input type="text" class="form-control realisasi" id="belanja_realisasi${b}" name="belanja_realisasi[]" placeholder="Realisasi...">
                    </td>
                    <td>
                        <input type="text" class="form-control selisih" id="belanja_selisih${b}" name="belanja_selisih[]" placeholder="Selisih...">
                    </td>
                </tr>
            `);
            b++;
            initInputFormat();
        });
        $(".anggaran, .realisasi").on("input", function() {
            initInputFormat();
        });
        $('#tahun').on('input', function() {
            var tahunValue = $(this).val();
            
            // Set nilai input tahun_belanja dan tahun_pendapatan menjadi nilai input tahun
            $('#tahun_belanja').val(tahunValue);
            $('#tahun_pendapatan').val(tahunValue);
        });

        $('#btnSubmit').click(function(e) {
                e.preventDefault();
                // Mengirim form pertama (form_tahun)
                var formTahun = $('#form_tahun').serialize();
                var formPendapatan = $('#form_pendapatan').serialize();
                var formBelanja = $('#form_belanja').serialize();
                var combinedData = formTahun + '&' + formPendapatan + '&' + formBelanja;

                $.ajax({
                url: '<?php echo site_url('admin/proses_tambah_anggaran'); ?>',
                type: 'post',
                data: combinedData,
                success: function(response) {
                    // Handle success response
                    Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        location.href = "<?= site_url('anggaran/') ?>";
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf',
                        text: response.message,
                    })
                }
            });

        
        });

        // Fungsi untuk menghitung selisih
        $(document).on("input", ".anggaran, .realisasi", function() {
            var row = $(this).closest("tr");
            var anggaran = parseFloat(row.find(".anggaran").val().replace(/\./g, '').replace(/,/g, ''));
            var realisasi = parseFloat(row.find(".realisasi").val().replace(/\./g, '').replace(/,/g, ''));
            
            if (isNaN(anggaran)) {
                anggaran = 0;
            }
            if (isNaN(realisasi)) {
                realisasi = 0;
            }
            var selisih = anggaran - realisasi;
            row.find(".selisih").val(selisih.toLocaleString('id-ID'));
        });
        
  });

  
</script>
<?= $this->endSection(); ?>