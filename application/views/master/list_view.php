<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).on('click', "#del", function() {
    var id          = $(this).attr("list_id");
    var filename    = $(this).attr("filename");
    var title       = $(this).attr("title");
    console.log(id);
    $(".modal-body #list_id").val( id );
    $(".modal-body #filename").val( filename );
    $("#msg > p").text( 'Yakin mau menghapus ' + title + '?' );
});    
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $videos['title'] ?></h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="<?php echo base_url()?>master"><i class="fa fa-video-camera"></i>&nbsp; Video</a>
            </li>
            <li class="active">
                <i class="fa fa-list-ol"></i>&nbsp; List
            </li>
        </ol>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <a href="<?php echo base_url() ?>master/upload/<?php echo $video_id; ?>" class="btn btn-sm btn-default">
            <span class='glyphicon glyphicon-plus'></span>&nbsp;Tambah Baru
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Filename</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th colspan="2" style="width: 50px;">Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($lists->result() as $l) {
            echo "<tr>"
                    . "<td >". $l->title ."</td>"
                    . "<td >". $l->filename ."</td>"
                    . "<td >". date("d/m/y h:ia", strtotime($l->created)) ."</td>"
                    . "<td >". date("d/m/y h:ia", strtotime($l->updated)) ."</td>"
                    . "<td width='50' id='up' data-id='".$l->list_id."' uid='".$l->list_id."'>"
                    . "<a width='50' href='". base_url()."/master/edit/".$l->list_id."' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-pencil'></span></a></td>"
                    . "<td id='del' data-toggle='modal' list_id='".$l->list_id."' filename='".$l->filename."' title='".$l->title."' data-target='#modal_del'>"
                    . "<a class='btn btn-sm btn-default'><span class='glyphicon glyphicon-trash'></span></a></td>"
                . "</tr>"; 
            }?>
            </tbody>
        </table>
    </div>
</div>


<div id="modal_del" class="modal fade" role="dialog">
    <?php echo form_open('master/video'); ?>
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
          
          <input hidden name="video_id" value="<?php echo $video_id; ?>">
          <input hidden id="list_id" name="list_id">
          <input hidden id="filename" name="filename">
          <div id="msg"><p></p></div>
          
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_delete" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
