<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container text-center py-5">
    <div class="my-4 card ">
        <h1>Jumlah Penduduk</h1>
        <h3><?= $jumlah_user; ?></h3>
    </div>
    <?php if (isset($jeniskelamin)) : ?>
        <div class="jenis">
            <div class="my-4 mx-auto card ">
                <h1>Statistik Jenis Kelamin</h1>
                <canvas id="grafik_jenis" class="mx-auto my-2"></canvas>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($agama)) : ?>
        <div class="agama">
            <div class="my-4 mx-auto card ">
                <h1>Statistik Agama</h1>
                <canvas id="grafik_agama" class="mx-auto my-2"></canvas>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($pendidikan)) : ?>
        <div class="pendidikan">
            <div class="my-4 mx-auto card ">
                <h1>Statistik Pendidikan</h1>
                <canvas id="grafik_pendidikan" class="mx-auto my-2"></canvas>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($pekerjaan)) : ?>
        <div class="pekerjaan">
            <div class="my-4 mx-auto card " >
                <h1>Statistik Pekerjaan</h1>
                <canvas id="grafik_pekerjaan" class="mx-auto my-2" ></canvas>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>

<?= $this->section('script'); ?>
<script>
    <?php if (isset($jeniskelamin)) : ?>
        //jenis kelamin
        var jenis_kelamin = document.getElementById('grafik_jenis');
        var data_jenis_kelamin = [];
        var label_jenis_kelamin = [];
        <?php foreach ($jeniskelamin->getResult() as $key => $value) : ?>
            data_jenis_kelamin.push(<?= $value->jumlah_jenis ?>);
            label_jenis_kelamin.push('<?= $value->jenis_kelamin ?>');

        <?php endforeach ?>;

        var data_per_jeniskelamin = {
            datasets: [{
                data: data_jenis_kelamin,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
            }],
            labels: label_jenis_kelamin,
        }

        var chart_jenis_kelamin = new Chart(jenis_kelamin, {
            type: 'doughnut',
            data: data_per_jeniskelamin,
        });
        //akhir jenis kelamin
    <?php endif; ?>

    <?php if (isset($agama)) : ?>
        //agama
        var agama = document.getElementById('grafik_agama');
        var data_agama = [];
        var label_agama = [];
        <?php foreach ($agama->getResult() as $key => $value) : ?>
            data_agama.push(<?= $value->jumlah_agama ?>);
            label_agama.push('<?= $value->agama ?>');

        <?php endforeach ?>;

        var data_per_agama = {
            datasets: [{
                data: data_agama,
                backgroundColor: [
                    'rgb(255, 99, 132, 0.8)',
                    'rgb(255, 159, 64, 0.8)',
                    'rgb(255, 205, 86, 0.8)',
                    'rgb(75, 192, 192, 0.8)',
                    'rgb(54, 162, 235, 0.8)',
                    'rgb(153, 102, 255, 0.8)',
                    'rgb(201, 203, 207, 0.8)'
                ],
            }],
            labels: label_agama,
        }

        var chart_agama = new Chart(agama, {
            type: 'doughnut',
            data: data_per_agama,
        });
        //akhir agama
    <?php endif; ?>

    <?php if (isset($pendidikan)) : ?>
        //pendidikan
        var pendidikan = document.getElementById('grafik_pendidikan');
        var data_pendidikan = [];
        var label_pendidikan = [];
        <?php foreach ($pendidikan->getResult() as $key => $value) : ?>
            data_pendidikan.push(<?= $value->jumlah_pendidikan ?>);
            label_pendidikan.push('<?= $value->pendidikan ?>');
        <?php endforeach ?>;

        var data_per_pendidikan = {
            datasets: [{
                data: data_pendidikan,
                backgroundColor: [
                    'rgb(255, 99, 132, 0.8)',
                    'rgb(255, 159, 64, 0.8)',
                    'rgb(255, 205, 86, 0.8)',
                    'rgb(75, 192, 192, 0.8)',
                    'rgb(54, 162, 235, 0.8)',
                    'rgb(153, 102, 255, 0.8)',
                    'rgb(201, 203, 207, 0.8)'
                ],
            }],
            labels: label_pendidikan,
        }

        var chart_pendidikan = new Chart(pendidikan, {
            type: 'doughnut',
            data: data_per_pendidikan,
        });
        //akhir pendidikan
    <?php endif; ?>

    <?php if (isset($pekerjaan)) : ?>
        // pekerjaan
        var pekerjaan = document.getElementById('grafik_pekerjaan');
        var data_pekerjaan = [];
        var label_pekerjaan = [];
        <?php foreach ($pekerjaan->getResult() as $key => $value) : ?>
            data_pekerjaan.push(<?= $value->jumlah_pekerjaan ?>);
            label_pekerjaan.push('<?= $value->jenis_pekerjaan ?>');

        <?php endforeach ?>;

        var data_per_pekerjaan = {
            datasets: [{
                data: data_pekerjaan,
                backgroundColor: generateRandomColor(data_pekerjaan.length),
            }],
            labels: label_pekerjaan,
        }

        var chart_pekerjaan = new Chart(pekerjaan, {
            type: 'doughnut',
            data: data_per_pekerjaan,
        });
       
        //akhir pekerjaan
    <?php endif; ?>
    function generateRandomColor(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
            colors.push(color);
        }
        return colors;
    }

</script>
<?= $this->endSection() ?>