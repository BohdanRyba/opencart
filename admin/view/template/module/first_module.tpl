<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
      
    <div class="page-header">
            
        <div class="container-fluid">
                  
            <div class="pull-right">
                        <!-- Form submit button -->
                        
                <button type="submit" form="form-first-module" data-toggle="tooltip" title="<?php echo $button_save; ?>"
                        class="btn btn-primary"><i class="fa fa-save"></i></button>
                        <!-- Back button -->
                        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>"
                           class="btn btn-default"><i class="fa fa-reply"></i></a></div>
                  <!-- Heading is mentioned here -->
                  <h1><?php echo $heading_title; ?></h1>
                  <!-- Breadcrumbs are listed here -->
                  
            <ul class="breadcrumb">
                        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                        
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                        <?php } ?>
                      
            </ul>
                
        </div>
          
    </div>
      
    <div class="container-fluid">
            <!-- if it contains a warning then it will be visible as an alert -->
            <?php if ($error_warning) { ?>
            
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
                  
            <button type="button" class="close" data-dismiss="alert">&times;</button>
                
        </div>
            <?php } ?>
            
        <div class="panel panel-default">
                  
            <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
                      
            </div>
                  
            <div class="panel-body">
                        <!-- form starts here -->
                        
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-first-module"
                      class="form-horizontal">
                              
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="head">After Head</label>
                        <div class="col-sm-10">
                            <?php if ($after_head) { ?>
                            <textarea name="after_head" id="head" class="col-sm-10 form-control" cols="30" rows="10"><?php echo $after_head;?></textarea>
                            <?php } else{ ?>
                            <textarea name="after_head" id="head" class="col-sm-10 form-control" cols="30" rows="10"></textarea>
                            <?php }?>

                        </div>
                    </div>
                              
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="body">After Body</label>
                        <div class="col-sm-10">
                            <?php if ($after_body) { ?>
                            <textarea name="after_body" id="body" class="col-sm-10 form-control" cols="30"
                                      rows="10"><?php echo $after_body;?></textarea>
                            <?php } else{ ?>
                            <textarea name="after_body" id="body" class="col-sm-10 form-control" cols="30"
                                      rows="10"></textarea>
                            <?php }?>

                        </div>
                    </div>
                </form>
                      
            </div>
                
        </div>
          
    </div>
</div>
<!-- merges the footer with the template -->
<?php echo $footer; ?>