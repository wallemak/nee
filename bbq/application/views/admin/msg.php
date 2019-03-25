<?php $this->load->view("admin/header.php");?>
    <div class="content">
        <div class="header">
            <h1 class="page-title">留言列表</h1>
        </div>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url("admin/lake/index")?>">Home</a> <span class="divider">/</span></li>
            <li class="active">List</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <button class="btn btn-primary" onClick="location='<?php echo site_url('admin/lake/msg_add'); ?>'"><i class="icon-plus"></i>添加留言</button>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>编号</th>
          <th>留言人</th>
          <th>留言内容</th>
          <th>联系电话</th>
          <th>邮箱</th>
          <th>留言时间</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>
      <tbody>
		<?php foreach($msg as $value){?>
        <tr>
          <td><?php echo $a++;?></td>
          <td><?php echo $value['msg_name']?></td>
          <td><?php echo str_cut($value['msg_int'],0,30) ?></td>
          <td><?php echo str_cut($value['msg_int'],0,30) ?></td>
          <td><?php echo str_cut($value[' msg_phone'],0,30) ?></td>
          <td><?php echo str_cut($value[' msg_email'],0,30) ?></td>
          <td><?php echo date("Y-m-d",$value['msg_addtime']);?></td>
          <td>
              <a href="<?php echo site_url("admin/lake/msg_edit");?>?msg_id=<?php echo $value['msg_id']; ?>"><i class="icon-pencil"></i></a>
              <a href="#myModal" role="button" data-toggle="modal" data_id="<?php echo $value['msg_id'];?>" id="a_delete" ><i class="icon-remove"></i></a>
          </td>
        </tr>

        <?php }  ?>
      </tbody>
    </table>
</div>
<div class="pagination">
    <!--ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">Next</a></li>
    </ul-->
</div>
<div id="msg_id"></div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button msg="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p><!-- 点击删除弹出来的对话框 -->
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
    


    <script src="<?php echo base_url('static/admin/lib/bootstrap/js/bootstrap.js');?>"></script>
    <script msg="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    <script msg="text/javascript">
      //做刪除的功能
    //点击删除按钮将当前信息的主键存到id="blog_id"元素内做为data_id的值
     $(".icon-remove").click(function(){
      //拿到当前点击那个a连接的data_id的值,就是当前数据的主键
      var data_id=$(this).parent('a').attr("data_id");
      //放到id="blog_id"元素内作为一个属性
      $("#msg_id").attr("data_id",data_id);
      console.log(data_id);
     })
    //点击弹出窗删除按钮将id="blog_id"元素内data_id的值传到控制器中执行删除功能
    $(".btn-danger").click(function(){
      //先拿到id="blog_id"元素内data_id的值也就是当前数据的主键
      var data_id=$("#msg_id").attr("data_id");
      location.href = "<?php echo site_url('admin/lake/msg_del'); ?>?msg_id="+data_id;
    })
    </script>
    
  </body>
</html>


