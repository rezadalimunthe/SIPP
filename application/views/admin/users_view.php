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
            Users
        </h3>
        <div class="page-bar">
            <ul class="page-breadcrumb">                    
                <li>
                    <i class="fa fa-home"></i>
                    <a href="<?php echo site_url('admin/home'); ?>">Dashboard</a>
                    <i class="fa fa-angle-right"></i>
                </li>                
                <li>
                    <a href="#">Users</a>
                </li>
            </ul>                
        </div>            
                        
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo site_url('admin/users/adddata'); ?>">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</button>
                </a>
                <br><br>
                <div class="portlet box red-intense">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-list"></i> Daftar Users
                        </div>
                        <div class="tools"></div>
                    </div>

                    <div class="portlet-body">                        
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th width="5%">No</th>                                
                                <th width="15%">Username</th>
                                <th>Nama Lengkap</th>
                                <th width="10%">Level</th>
                                <th width="10%">Status</th>
                                <th width="10%">Avatar</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($daftarlist as $r) {                                
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>                                
                                <td><?php echo $r->user_username; ?></td> 
                                <td><?php echo $r->user_name; ?></td> 
                                <td><?php echo $r->user_level; ?></td> 
                                <td>
                                    <?php if ($r->user_status=='Active') { ?>
                                        <span class="label label-sm label-success"><?php echo $r->user_status; ?></span>
                                    <?php } else { ?>
                                        <span class="label label-sm label-danger"><?php echo $r->user_status; ?></span>
                                    <?php } ?>
                                </td>
                                <td>
                                <?php if (empty($r->user_avatar)) { ?>
                                    <img src="<?php echo base_url(); ?>img/avatar.png">
                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>icon/<?php echo $r->user_avatar; ?>" width="50%">
                                <?php } ?>
                                </td>                               
                                <td>
                                    <?php if ($r->user_level <> 'Admin') { ?>
                                    <a href="<?php echo site_url('admin/users/aksespasar/'.$r->user_username); ?>"><button class="btn btn-danger btn-xs" title="Hak Akses Pasar"><i class="icon-list"></i> Akses Pasar</button>
                                    </a>
                                    <?php } ?>
                                    <a href="<?php echo site_url('admin/users/editdata/'.$r->user_username); ?>"><button class="btn btn-primary btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit</button>
                                    </a>
                                </td>
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

        <div class="clearfix"></div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>