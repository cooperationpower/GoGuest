<?php echo $header; ?>
<style type="text/css">
.table th a {
	hotel:#FFF;
	}
</style>
<!-- Content Wrapper. Contains hotel content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $lang->language["hotels"];  ?>
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hotels</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                  
                <div class="box-body">
                    <a href="<?php echo base_url('hotel/add'); ?>" class="btn btn-primary pull-right"><?php echo $lang->language['add']." ".$lang->language['hotels']; ?></a>
                 <?php if(count($hotels)>0){ ?>
                    <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="col-lg-2" <?php echo ( $this->uri->segment(3) == 'hotelname' && ( $this->uri->segment(4) == 'ASC' || $this->uri->segment(4) == 'DESC' ) ) ?  : ''; ?>>
                       <a href="<?php echo ( $this->uri->segment(3) == 'hotelname' && $this->uri->segment(4) == 'ASC') ? site_url().'hotel/sort/hotelname/DESC' : site_url().'hotel/sort/hotelname/ASC';?>" title="">
         				 <?php echo $lang->language["hotel_name"];  ?>
            		  </a> <?php echo ( $this->uri->segment(3) == 'hotelname' && $this->uri->segment(4) == 'ASC' ) ? '<i class="glyphicon glyphicon-arrow-up">' : (( $this->uri->segment(3) == 'hotelname' && $this->uri->segment(4) == 'DESC' ) ? '<i class="glyphicon glyphicon-arrow-down">' : '' );?>
                      </th>
                     
                        <th><?php echo $lang->language["hotel_latitude"];  ?></th>
                        <th><?php echo $lang->language["hotel_longitude"];  ?></th>
                        
                        <th class="col-lg-2" <?php echo ( $this->uri->segment(3) == 'hotelname' && ( $this->uri->segment(4) == 'ASC' || $this->uri->segment(4) == 'DESC' ) ) ?  : ''; ?>>
                       <a href="<?php echo ( $this->uri->segment(3) == 'status' && $this->uri->segment(4) == 'ASC') ? site_url().'hotel/sort/status/DESC' : site_url().'hotel/sort/status/ASC';?>" title="">
         				 <?php echo $lang->language["status"];  ?>
            		  </a> <?php echo ( $this->uri->segment(3) == 'status' && $this->uri->segment(4) == 'ASC' ) ? '<i class="glyphicon glyphicon-arrow-up">' : (( $this->uri->segment(3) == 'status' && $this->uri->segment(4) == 'DESC' ) ? '<i class="glyphicon glyphicon-arrow-down">' : '' );?>
                      </th>
                       
                        <th><?php echo $lang->language["action"];  ?></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php for($i=0;$i<count($hotels);$i++) { ?>
                      <tr>
                        <td><?php echo $hotels[$i]['hotelname']; ?></td>
                        <td><?php echo $hotels[$i]['hotellatitude']; ?></td>
                        <td><?php echo $hotels[$i]['hotellongitude']; ?></td>
                        <td>
                            <?php if($hotels[$i]['status'] == "Active") { ?>
                          <a class="btn btn-primary" href="<?php echo base_url()."hotel/disable/".base64_encode($hotels[$i]['hotelid']); ?>" title="Status Change" onClick="return confirm('Are you sure you want to change hotel status?');">
                              <?php echo $lang->language["active"]; ?>
                          </a>  
                        <?php } else {?>
                        <a class="btn btn-danger" href="<?php echo base_url()."hotel/enable/".base64_encode($hotels[$i]['hotelid']); ?>" title="Status Change" onClick="return confirm('Are you sure you want to change hotel status?');">
                            <?php echo $lang->language["in-active"]; ?>
                        </a>  
                     <?php }  ?>
                           </td>
                        <td>
                            <a href="<?php echo site_url('../hoteladmin/login/verify/'.base64_encode($hotels[$i]['hoteluniqid']).'/'.  base64_encode("fromadmin"));?>" class="btn btn-info" title="Login" target="_blank"><i class="glyphicon glyphicon-send"></i></a> 
                            <a href="<?php echo site_url('hotel/edit/'.base64_encode($hotels[$i]['hotelid']));?>" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-edit"></i></a> 
                            <a href="<?php echo site_url('hotel/delete/'.base64_encode($hotels[$i]['hoteluniqid']));?>" class="btn btn-danger" title="Delete" onClick="return confirm('Are you sure you want to delete this hotel?');"><i class="glyphicon glyphicon-remove"></i></a> 
                        </td>
                        
                      </tr>
              
                        <?php } ?>
                    </tbody>
                   
                  </table>
                 <?php } else { echo 'No record found.';} ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

           
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
    
    
    
   <?php echo $footer; ?>    
   <script type="text/javascript">
	$(document).ready(function(){
  $('#mymodel').trigger('click');
	});
</script>

	<!-- Correct form message -->
<?php if( $this->session->flashdata('hotel_success') ) { 
?>
<button type="button" class="btn btn-primary col-lg-3 mrgn-right1" id="mymodel" title="Create" data-toggle="modal" data-target="#myModal" style="display: none;">Create</button>
<div class="modal msg_pop fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close cls_icn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-body">
                <h3>New hotel <b><?php echo $this->session->flashdata('crete_hotel'); ?></b> had been created!</h3>
                    <div class="col-lg-12 col-md-12 col-sm-12 padng_rmv pop_tglinr">
                        <h6>An email has been sent to the hotel for the first time login step!</h6>
                        <span><?php echo $this->session->flashdata('create_hotel_email'); ?></span>
                    </div>
            </div>
            <div class="modal-footer tp_mrgn2">
                <button type="button" class="btn btn-primary col-lg-2" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
 </div>
<?php } ?>

<?php if( $this->session->flashdata('success') ) { 
?>
<button type="button" class="btn btn-primary col-lg-3 mrgn-right1" id="mymodel" title="Create" data-toggle="modal" data-target="#myModal" style="display: none;">Create</button>
<div class="modal msg_pop fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close cls_icn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-body">
                 <div class="col-lg-12 col-md-12 col-sm-12 padng_rmv pop_tglinr">
                      <span><?php echo $this->session->flashdata('success'); ?></span>
                    </div>
            </div>
            <div class="modal-footer tp_mrgn2">
                <button type="button" class="btn btn-primary col-lg-2" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
 </div>
<?php } ?>

<?php if( $this->session->flashdata('error') ) { 
?>
<button type="button" class="btn btn-primary col-lg-3 mrgn-right1" id="mymodel" title="Create" data-toggle="modal" data-target="#myModal" style="display: none;">Create</button>
<div class="modal msg_pop fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close cls_icn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-body">
                 <div class="col-lg-12 col-md-12 col-sm-12 padng_rmv pop_tglinr">
                      <span><?php echo $this->session->flashdata('error'); ?></span>
                    </div>
            </div>
            <div class="modal-footer tp_mrgn2">
                <button type="button" class="btn btn-primary col-lg-2" data-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
 </div>
<?php } ?>


    
    
    
  