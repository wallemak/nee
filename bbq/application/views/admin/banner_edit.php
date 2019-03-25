<?php $this->load->view("admin/header.php");?>
<style>
  #img{
    display:block;
    width:300px;
    height:100px;
    border:1px solid #999;
    text-align:center;
  }
  #upload{
    display:block;
    width:300px;
    height:100px;
    margin-bottom:-100px;
    opacity:0;

  }
</style> 
    <div class="content">
        <div class="header">
            <h1 class="page-title">编辑广告</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="<?php echo site_url('admin/bbq/index') ?>">Home</a> <span class="divider">/</span></li>
            <li class="active">编辑广告</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/bbq/banner') ?>'"><i class="icon-list"></i> 广告列表</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form method="post" enctype="multipart/form-data" action="<?php echo site_url('admin/bbq/banner_edit'); ?>">
          <input type="hidden" name="banner_id" value="<?php echo $banner['banner_id']; ?>">
          <input type="hidden" name="banner_path" value="<?php echo $banner['banner_photo']; ?>">
            <label>广告名字</label>
            <input type="text" value="<?php echo $banner['banner_name']; ?>" class="input-xxlarge" name="banner_name" style="width:300px;">
            
            <label>广告图片</label>
            <input type="file" value="" class="input-xxlarge" name="banner_photo"  id="upload">
            <img src="<?php echo base_url($banner['banner_photo']); ?>" alt="点击编辑图片" id="img">
            <label>广告排序</label>
            <input type="number" value="<?php echo $banner['banner_ord']; ?>" class="input-xxlarge" name="banner_ord" style="width:300px;">
            
            <br>
            <input class="btn btn-primary" type="submit" value="提交" />
        </form>
      </div>
  </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>
  <div class="modal-body">
    
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>


                    
                    <footer>
                        <hr>
                        <!-- Purchase a site license to remove this link from the footer: http://www.portnine.com/bootstrap-themes -->
                        <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                        

                        <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
                    </footer>
                    
            </div>
        </div>
    </div>
    


    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
<script>
  function getObjectURL(file) {
    var url=null;
    if(window.createObjectURL!=undefined){
      url=window.createObjectURL(file);
    }else if(window.URL!=undefined){
      url=window.URL.createObjectURL(file);
    }else if(window.webkitURL!=undefined){
      url=window.webkitURL.createObjectURL(file);
    }
    return url;
  }
  $('#upload').change(function(){
    var url1=getObjectURL(this.files[0]);
    if(url1){
      $('#img').attr('src',url1);
    }
  });
</script>
    
  </body>
</html>

