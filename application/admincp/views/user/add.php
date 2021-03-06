 <?php echo $header; ?>
<link href="<?php echo base_url(); ?>plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $lang->language["add"];  ?> <?php echo $lang->language["user"];  ?>
            
          </h1>
          <ol class="breadcrumb">
              <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <?php echo $lang->language["home"];  ?></a></li>
            <li><a href="<?php echo base_url()."user"; ?>"><?php echo $lang->language["user"];  ?></a></li>
            <li class="active"><?php echo $lang->language["add"];  ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
               
                <!-- form start -->
                <form role="form" action="<?php echo base_url()."user/update" ?>" method="post" enctype="multipart/form-data" onsubmit="return checkalldata();" >
                  <div class="box-body">
                      <div class="alert alert-danger" id="error_div" style="display: none;"></div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["userfirstname"];  ?></label>
                      <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                   
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["userlastname"];  ?></label>
                      <input type="text" class="form-control" id="lastname" name="lastname">
                     
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["usergender"];  ?></label>
                      <select name="gender" class="form-control">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["useremail"];  ?></label>
                      <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["userbirthday"];  ?></label>
                      <input type="text" class="form-control" id="birthday" name="birthday">
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["usernationality"];  ?></label>
                      <input type="text" class="form-control" id="nationality" name="nationality">
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["useraddress"];  ?></label>
                      <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["userpassword"];  ?></label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label for=""><?php echo $lang->language["confirm_userpassword"];  ?></label>
                      <input type="password" class="form-control" id="cpassword" name="cpassword">
                    </div>
                    
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary"><?php echo $lang->language["submit"];  ?></button>
                  </div>
                </form>
              </div><!-- /.box -->

             

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
 <?php echo $footer; ?>  
<script src="<?php echo base_url(); ?>/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>      
   <script type="text/javascript">
            $(function () {
                $('#birthday').datepicker();
            });
        </script>
   <script type="text/javascript">
    function checkalldata()
    {
        var firstname = $("#firstname").val();
        var lastname = $("#lastname").val();
        var email = $("#email").val();
        var birthday = $("#birthday").val();
        var nationality = $("#nationality").val();
        var address = $("#address").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        var email_validation = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;;
        
        if(firstname  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["userfirstname"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(lastname  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["userlastname"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(email  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["useremail"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(!email_validation.test(email))
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["email_validation"];  ?>');
            return false;
        }
        if(birthday  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["userbirthday"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(nationality  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["usernationality"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(password  == "")
        {
            $("#error_div").show();
            $("#error_div").html('<?php echo $lang->language["userpassword"].' '.$lang->language["required"]  ?>');
            return false;
        }
        if(password  != cpassword)
        {
            $("#error_div").show();
            $("#error_div").html("<?php echo $lang->language["password_error"];  ?>");
            return false;
        }
        
    }
    
    </script>
    