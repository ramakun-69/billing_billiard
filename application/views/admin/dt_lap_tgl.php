<?php
if ($v_dapat->num_rows() != 0) {
?>
    <style>
        table.tab {
            width: 100%;
        }

        .tab th {
            border: 1px solid;
            border-color: #5200E4;
            background-color: #5200E4;
            padding: 5px;
            text-align: center;
            color: aliceblue;
        }

        .tab td {
            border: 1px solid;
            border-color: #5200E4;
            padding: 5px;
        }
    </style>
    <div class="text-center">
        <h3>LAPORAN PENDAPATAN</h3><br>
        <h5>DARI TANGGAL <span class="text-danger"><?= $tgl1; ?></span> SAMPAI DENGAN TANGGAL <span class="text-danger"><?= $tgl2; ?></span></h5>
    </div>
    <div class="table-responsive">
        <table class="tab ">
            <thead>
                <tr>
                <th width="5%" class="text-center">NO</th>
                <th width="15%">TANGGAL MULAI</th>
                <th width="15%">TANGGAL STOP</th>
                <th width="15%">NAMA PAKET</th>
                <th width="15%">NOMOR MEJA</th>
                <th width="10%">LAMA SEWA</th>
                <th width="10%">HARGA PER MENIT</th>
                <th width="10%">TOTAL</th>
                <th width="10%">DIBAYAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $tot = 0;
                foreach ($v_dapat->result() as $m) {
                    $tot += $m->dibayar;


                ?>
                    <tr>
                    <td class="text-center"><?= $no++; ?></td>
                    <td><?= format_indo($m->tgl_mulai); ?></td> <!-- ganti $m->tgl dengan $m->tgl_mulai -->
                    <td><?= format_indo($m->tgl_stop); ?></td> <!-- tambahkan kolom untuk tanggal stop -->
                    <td><?= $m->nama_member; ?></td>
                    <td><?= $m->nama_chanel; ?></td>
                    <td><?= $m->lama_sewa; ?></td>
                    <td><span style="float: right;"><?= is_numeric($m->harga_permenit) ? number_format($m->harga_permenit, 0, ",", ".") : $m->harga_permenit; ?> </span></td>
                    <td class="">Rp. <span style="float: right;"><?= number_format($m->total, 0, ",", "."); ?> </span></td>
                    <td class="">Rp. <span style="float: right;"><?= number_format($m->dibayar, 0, ",", "."); ?></span></td>
                </tr>


                <?php } ?>
                <tr>
                    <td colspan="8" class="text-center"><b>TOTAL PENDAPATAN</b></td>
                    <td colspan=""><b>Rp. <span style="float: right;"><?= number_format($tot, 0, ",", "."); ?></span></b></td>
                </tr>

            </tbody>
        </table>
    </div>
<?php } else {
    echo "<script>
         swal('Oops..', 'Maaf.. , Data tidak ditemukan, Silahakan cari data yang lain!', 'error');
      </script>";
    echo "<img src='" . base_url('assets/error.gif') . "' width='20%' >";
} ?>