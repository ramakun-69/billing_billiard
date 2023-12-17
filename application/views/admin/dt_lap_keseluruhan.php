<?php
if ($v_dapat->num_rows() != 0) {
?>
    <style>
        table.tab {
            width: 100%;
        }

        .tab th {
            border: 1px solid;
            border-color: #FF0000;
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
        <h3>LAPORAN KESELURUHAN</h3><br>
        <h5>DARI TANGGAL <span class="text-danger"><?= $tgl1; ?></span> SAMPAI DENGAN TANGGAL <span class="text-danger"><?= $tgl2; ?></span></h5>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="table-responsive">
                <table class="tab ">
                    <thead>
                        <tr>
                            <th colspan="3">HASIL PENDAPTAN SEWA</th>
                        </tr>
                        <tr>
                            <th width="5%" class="text-center">
                                NO
                            </th>
                            <th width="17%">TANGGAL</th>
                            <th width="10%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        error_reporting(0);
                        date_default_timezone_set('Asia/Jakarta');
                        $no = 1;
                        foreach ($v_dapat->result() as $m) {
                            $tot += $m->dby;


                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= date('d-m-Y', strtotime($m->tgl)); ?></td>
                                <td class="">Rp. <span style="float: right;"><?= number_format($m->dby, 0, ",", "."); ?></span></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="2" class="text-center"><b>TOTAL PENDAPATAN</b></td>
                            <td colspan=""><b>Rp. <span style="float: right;"><?= number_format($tot, 0, ",", "."); ?></span></b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-3">
            <div class="table-responsive">
                <table class="tab ">
                    <thead>
                        <tr>
                            <th colspan="3">HASIL PENJUALAN</th>
                        </tr>
                        <tr>
                            <th width="5%" class="text-center">
                                NO
                            </th>
                            <th width="17%">TANGGAL</th>
                            <th width="10%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        error_reporting(0);
                        date_default_timezone_set('Asia/Jakarta');
                        $no = 1;
                        foreach ($v_jual->result() as $m) {
                            $tot2 += $m->thl;
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= date('d-m-Y', strtotime($m->tgl_jual)); ?></td>
                                <td class="">Rp. <span style="float: right;"><?= number_format($m->thl, 0, ",", "."); ?></span></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="2" class="text-center"><b>TOTAL PENJUALAN</b></td>
                            <td colspan=""><b>Rp. <span style="float: right;"><?= number_format($tot2, 0, ",", "."); ?></span></b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-3">
            <div class="table-responsive">
                <table class="tab ">
                    <thead>
                        <tr>
                            <th colspan="3">HASIL PENGELUARAN</th>
                        </tr>
                        <tr>
                            <th width="5%" class="text-center">
                                NO
                            </th>
                            <th width="17%">TANGGAL</th>
                            <th width="10%">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        error_reporting(0);
                        date_default_timezone_set('Asia/Jakarta');
                        $no = 1;
                        foreach ($v_keluar->result() as $m) {
                            $tot3 += $m->tkl;

                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= date('d-m-Y', strtotime($m->tgl_keluar)); ?></td>
                                <td class="">Rp. <span style="float: right;"><?= number_format($m->tkl, 0, ",", "."); ?></span></td>
                            </tr>

                        <?php } ?>
                        <tr>
                            <td colspan="2" class="text-center"><b>TOTAL PENGELUARAN</b></td>
                            <td colspan=""><b>Rp. <span style="float: right;"><?= number_format($tot3, 0, ",", "."); ?></span></b></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <style>
            #bes td {
                font-size: 25pt;
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                text-align: center;
            }
        </style>
        <div class="col-md-3">
            <table class="tab ">
                <thead>
                    <tr>
                        <th>OMSET</th>
                    </tr>
                    <tr id="bes">
                        <td>Rp. <?php $hr = $tot +  $tot2; ?> <?= number_format($hr, 0, ",", "."); ?></td>
                    </tr>

                    <tr>
                        <th>PENGELUARAN</th>
                    </tr>
                    <tr id="bes">
                        <td>Rp. <?= number_format($tot3, 0, ",", "."); ?></td>
                    </tr>

                    <tr>
                        <th>PENDAPATAN BERSIH</th>
                    </tr>
                    <tr id="bes">
                        <td>Rp. <?php $pl =  $hr -  $tot3; ?> <?= number_format($pl, 0, ",", "."); ?></td>
                    </tr>
                </thead>

            </table>
        </div>
    </div>
<?php } else {
    echo "<script>
         swal('Oops..', 'Maaf.. , Data tidak ditemukan, Silahakan cari data yang lain!', 'error');
      </script>";
    echo "<img src='" . base_url('assets/error.gif') . "' width='20%' >";
} ?>