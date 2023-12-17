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
                    <th width="5%" class="text-center">
                        NO
                    </th>
                    <th>ATAS NAMA</th>
                    <th width="17%">TANGGAL STAR</th>
                    <th width="17%">TANGGAL STOP</th>
                    <th width="10%">LAMA SEWA</th>
                    <th width="20%">HARGA PERMENIR</th>
                    <th width="10%">TOTAL</th>
                    <th width="10%">DIBAYAR</th>
                </tr>
            </thead>
            <tbody>
                <?php
                error_reporting(0);
                $no = 1;
                foreach ($v_dapat->result() as $m) {
                    $tot += $m->dibayar;
                ?>
                    <tr>
                        <td class="text-center"><?= $no++; ?></td>
                        <td><?= $m->nama_member; ?></td>
                        <td><?= format_indo($m->tgl_mulai); ?></td>
                        <td><?= format_indo($m->tgl_stop); ?></td>
                        <td class="text-center"><?= $m->lama_sewa; ?></td>
                        <td><?= $m->harga_permenit; ?></td>
                        <td class="">Rp. <span style="float: right;"><?= number_format($m->total, 0, ",", "."); ?></span></td>
                        <td class="">Rp. <span style="float: right;"><?= number_format($m->dibayar, 0, ",", "."); ?></span></td>
                    </tr>

                <?php } ?>
                <tr>
                    <td colspan="7" class="text-center"><b>TOTAL PENDAPATAN</b></td>
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