<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-print" style="color:green"> </i>  Data Laporan
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-print"></i>&nbsp; Data Laporan</li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div><br><BR>

                <center>
			   <a href="<?= base_url('L_buku') ?>" class="btn btn-info fa fa-print" >Cetak Laporan Buku</a>
			   <a href="<?= base_url('L_pinjaman') ?>" class="btn btn-warning fa fa-print" >Cetak Laporan Peminjaman</a>
			   <a href="" class="btn btn-danger fa fa-print" >Cetak Laporan Pengembalian</a>
         </center>
			    <br><Br><br>
	        </div>
	    </div>
    </div>
</section>
</div>
