<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>js/sweetalert2.css">
<script src="<?php echo base_url(); ?>js/sweetalert2.min.js"></script>
<?php 
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>

<div class="page-content-wrapper">
    <div class="page-content">            
        <h3 class="page-title">
            Transaksi Retribusi <small>SKRD</small>
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Transaksi Retribusi</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/skrd'); ?>">SKRD</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Hapus Data SKRD</a>
                </li>
            </ul>
        </div>            
                        
        <div class="row">
            <div class="col-md-12">                
                <div class="portlet-body form">
                    <form role="form" class="form-horizontal" action="<?php echo site_url('admin/skrd/caridataskrdhapus'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">Periode</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="lstBulan" id="lstBulan" required autofocus>
                                                <option value="">- Pilih Bulan -</option>
                                                <option value="1" <?php echo set_select('lstBulan', 1); ?>>Januari</option>
                                                <option value="2" <?php echo set_select('lstBulan', 2); ?>>Februari</option>
                                                <option value="3" <?php echo set_select('lstBulan', 3); ?>>Maret</option>
                                                <option value="4" <?php echo set_select('lstBulan', 4); ?>>April</option>
                                                <option value="5" <?php echo set_select('lstBulan', 5); ?>>Mei</option>
                                                <option value="6" <?php echo set_select('lstBulan', 6); ?>>Juni</option>
                                                <option value="7" <?php echo set_select('lstBulan', 7); ?>>Juli</option>
                                                <option value="8" <?php echo set_select('lstBulan', 8); ?>>Agustus</option>
                                                <option value="9" <?php echo set_select('lstBulan', 9); ?>>September</option>
                                                <option value="10" <?php echo set_select('lstBulan', 10); ?>>Oktober</option>
                                                <option value="11" <?php echo set_select('lstBulan', 11); ?>>November</option>
                                                <option value="12" <?php echo set_select('lstBulan', 12); ?>>Desember</option>
                                            </select>
                                            <div class="form-control-focus"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" placeholder="Tahun" name="tahun" value="<?php echo set_value('tahun', date('Y')); ?>" autocomplete="off" required>
                                            <div class="form-control-focus"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">Pasar</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="lstPasar" id="lstPasar" required>
                                                <?php
                                                foreach($listPasar as $p) {
                                                ?>php
                                                <option value="<?php echo $p->pasar_id; ?>" <?php echo set_select('lstPasar', $p->pasar_id); ?>><?php echo $p->pasar_nama; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="form-control-focus"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-md-line-input">
                                        <label class="control-label col-md-3">Tempat</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="lstTempat" id="lstTempat" required>
                                                <option value="all">- SEMUA -</option>
                                                <?php
                                                foreach($listTempat as $t) {
                                                ?>php
                                                <option value="<?php echo $t->tempat_id; ?>" <?php echo set_select('lstTempat', $t->tempat_id); ?>><?php echo ucwords(strtolower($t->tempat_nama)); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <div class="form-control-focus"></div>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="input-group-btn btn-right">    
                                                <button class="btn blue-madison" type="submit">
                                                    <i class="fa fa-search"></i> Cari
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <?php if ($info == 'true') { ?>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/skrd/deletedataskrdaksi/'.$Bulan.'/'.$Tahun.'/'.$Pasar.'/'.$Tempat); ?>">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-trash"></i> Hapus SKRD</button>
                </a>
                <br><br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Data SKRD
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">No. Surat</th>
                                <th width="10%">Periode</th>
                                <th>NPWRD</th>
                                <th width="20%">Pasar</th>
                                <th width="9%">Total</th>
                                <th width="10%">Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {
                                $skrd_id    = $r->skrd_id;

                                $bln        = $r->skrd_bulan;
                                switch ($bln) {
                                    case 1:
                                        $bulan = "Januari";
                                        break;
                                    case 2:
                                        $bulan = "Februari";
                                        break;
                                    case 3:
                                        $bulan = "Maret";
                                        break;
                                    case 4:
                                        $bulan = "April";
                                        break;
                                    case 5:
                                        $bulan = "Mei";
                                        break;
                                    case 6:
                                        $bulan = "Juni";
                                        break;
                                    case 7:
                                        $bulan = "Juli";
                                        break;
                                    case 8:
                                        $bulan = "Agustus";
                                        break;
                                    case 9:
                                        $bulan = "September";
                                        break;
                                    case 10:
                                        $bulan = "Oktober";
                                        break;
                                    case 11:
                                        $bulan = "November";
                                        break;
                                    case 12:
                                        $bulan = "Desember";
                                        break;
                                }

                                $ttl    = ($r->skrd_total+$r->skrd_bunga+$r->skrd_kenaikan);
                                $total  = '<b>Rp. '.number_format($ttl, 0, '.', ',').'</b>';

                                if ($r->skrd_status == 1) {
                                    $status = '<span class="label label-danger">BELUM BAYAR</span>';
                                } else {
                                    $status = '<span class="label label-success">BAYAR</span>';
                                }
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $r->skrd_no; ?></td>
                                <td><?php echo $bulan.'<br>'.$r->skrd_tahun; ?></td>
                                <td><?php echo $r->dasar_npwrd.'<br>'.$r->penduduk_nama; ?></td>
                                <td><?php echo $r->pasar_nama.' <b>('.$r->tempat_nama.')</b>'."<br>".'Blok '.$r->dasar_blok.' Nomor '.$r->dasar_nomor.' Luas '.$r->dasar_luas.' m2'; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $status; ?></td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>

                        </table>
                    </div>
                </div>            
            </div>
        </div>
        <?php } ?>

        <div class="clearfix"></div>
    </div>
</div>