<?= $this->extend('layanan/layout/navbar_administrasi'); ?>
<?= $this->section('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <div class="card mb-4 mt-4 p-3">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
            <?php endif; ?>
            <form action="/administrasi/proses_ubah_data/<?= $username; ?>" method="POST">
                <input type="hidden" name="username" id="username" value="<?= $username; ?>">
                   <div class="row mb-3">
                        <label for="username_lama" class="col-sm-2 col-form-label">Username Lama </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?= ($validation->hasError('username_lama')) ? 'is-invalid' : ''; ?>" id="username_lama" name="username_lama" value="<?= (old('username_lama')) ? old('username_lama') : ''; ?>">
                            <?php if ($validation->hasError('username_lama')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('username_lama') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                   <div class="row mb-3">
                        <label for="password_lama" class="col-sm-2 col-form-label">Password Lama </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" id="password_lama" name="password_lama" value="<?= (old('password_lama')) ? old('password_lama') : ''; ?>">
                            <?php if ($validation->hasError('password_lama')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('password_lama') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                   <div class="row mb-3">
                        <label for="username_baru" class="col-sm-2 col-form-label">Username Baru </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?= ($validation->hasError('username_baru')) ? 'is-invalid' : ''; ?>" id="username_baru" name="username_baru" value="<?= (old('username_baru')) ? old('username_baru') : ''; ?>">
                            <?php if ($validation->hasError('username_baru')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('username_baru') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                   <div class="row mb-3">
                        <label for="password_baru" class="col-sm-2 col-form-label">Password Baru </label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" id="password_baru" name="password_baru" value="<?= (old('password_baru')) ? old('password_baru') : ''; ?>">
                            <?php if ($validation->hasError('password_baru')) : ?>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('password_baru') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
            
            </div>
        </div>
    </main>
</div>
<script>
    function logout() {
        $.ajax({
            type: 'POST',
            url: '<?= site_url('layanan/logout') ?>',
            success: function(response) {
                // Response dari server
                if (response.success) {
                    // Redirect ke halaman lain setelah logout berhasil
                    console.log('berhasil');
                } else {
                    alert('Logout failed');
                }
            },
            error: function() {
                alert('Something went wrong');
            }
        });
    }

    // Cek flashData di luar fungsi logout
    const flashData = $('.flash-data').data('flashdata');
    console.log(flashData);
    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: flashData,
            showConfirmButton: false,
            timer: 1500
        });
        setTimeout(function() {
            logout();
        }, 50);
    }
</script>

<?= $this->endSection(); ?>