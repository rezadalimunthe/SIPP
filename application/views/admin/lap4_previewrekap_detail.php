<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>img/kudus.jpg">
<title>Print Laporan Rekap Pembayaran Retribusi</title>
<style type="text/css">
	table {
    	border: 1px solid #ccccb3;    	
    	width: 100%;
	}
	
    th {
    	height: 30px;
	}
	
    th {
    	height: 20px;
    	background-color: #eff3f8;
    	color: black;
	}
	
    th, td {
	    padding: 5px;
	    border-bottom: 1px solid #ddd;	
	}
    h4 {
        text-decoration: underline;
        line-height: 0.5px;   
    }

    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 0cm;
        margin: 0.1cm auto;
        border: 0.3px #D3D3D3 none;
        border-radius: 2px;
        background: white;
    }

    table #rincian {
        border: none;
        width: 100%;
    }
</style>

<style type="text/css">
	body{
        font-family: "Times New Roman"; 
        font-size:12px
    }
	
    h1{
        font-size:15px
    }	
</style>

<style>
@media print{
	#comments_controls,
	#print-link{
		display:none;
	}
}
</style>
</head>

<body>
<a href="#Print">
<img src="<?php echo base_url(); ?>img/print_icon.gif" height="36" width="32" title="Print" id="print-link" onClick="window.print(); return false;" />
</a>
<div class="page">
<div align="center">LAPORAN REKAP PEMBAYARAN RETRIBUSI</div>
<div align="center">
<?php 
echo $detailpasar->pasar_nama;
?>
</div>

<div align="center">PERIODE : <?php echo strtoupper(tgl_indo($this->uri->segment(6))).' s/d '.strtoupper(tgl_indo($this->uri->segment(7))); ?></div>
<div align="center">TEMPAT : <?php echo $detailtempat->tempat_nama; ?></div>
<br>
<table align="center">
    <tr>
        <th width="4%">No</th>
        <th width="18%">Kode Rekening</th>                                
        <th>Uraian</th>
        <th width="15%">Sub Total</th>
    </tr>
    <?php
    // Variabel
    $pasar_id   = $this->uri->segment(4);
    $tempat_id  = $this->uri->segment(5);
    $tgl1       = $this->uri->segment(6);
    $tgl2       = $this->uri->segment(7);

    $no     = 1;
    $total  = 0;
    foreach($listKomponen as $k) {
        $komponen_id = $k->komponen_id;
        // Tambahan
        if ($k->komponen_id == 1) {
            $komponen_kode = trim($k->komponen_kode.$detailtempat->tempat_kd_rek);
        } else {
            $komponen_kode = trim($k->komponen_kode);
        }

        $dataSub     = $this->lap4_model->select_total($pasar_id, $tempat_id, $tgl1, $tgl2, $komponen_id)->row();
        $total       = ($total+$dataSub->subtotal);
    ?>
    <tr>
        <td align="center" valign="top"><?php echo $no; ?></td>                                
        <td valign="top"><?php echo $komponen_kode; ?></td>                                
        <td valign="top"><?php echo $k->komponen_uraian; ?></td>
        <td align="right" valign="top"><?php echo number_format($dataSub->subtotal,0,'',','); ?></td>
    </tr>
    <?php 
        $no++;
    }
    ?>
    <tr>
        <td colspan="3" align="center"><b>TOTAL : <?php echo $detailtempat->tempat_nama; ?></b></td>
        <td align="right"><?php echo '<b>'.number_format($total, 0, '.', ',').'</b>'; ?></td>
    </tr>
  </table>
</div>

</body>
</html>