<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Tabungan <strong><?= $this->db->get_where('siswa', array('id' => $id_siswa))->row('name') ?></strong> </h3>
                <div style="display:flex; justify-content:flex-end">
                    <a href="<?php echo site_url('Tabungan'); ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>
            <div class="box-body">
                <table id="tabel-detail" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
$.ajax({
    url : "<?php echo site_url('Tabungan/getDetail/'). $id_siswa?>",
    type: "GET",
    dataType: "JSON",
    data: {id_siswa: <?= $id_siswa ?>},
    success: function(data) {
        console.log(data);
        var html = '';
        var no = 1;
        for (var i = 0; i < data.length; i++) {
            html += '<tr>' +
                        '<td>' + data[i].tanggal + '</td>' +
                        '<td>' + 'Rp ' + data[i].nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + '</td>' +
                        '<td>' + data[i].keterangan + '</td>' +
                    '</tr>';
            no++;
        }
        $('#tabel-detail tbody').html(html);
    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('Error get data from ajax');
    }
});
</script>
