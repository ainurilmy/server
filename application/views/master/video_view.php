<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).on('click', "#edit", function() {
    var video_id    = $(this).attr("edit-video_id");
    var summary     = $(this).attr("edit-summary");
    var title       = $(this).attr("edit-title");
    var cover       = $(this).attr("edit-cover");
    var category    = $(this).attr("edit-category");
    console.log(video_id);
    $(".modal-body #video_id_edit").val( video_id );
    $(".modal-body #title_edit").val( title );
    $(".modal-body #summary_edit").val( summary );
    $(".modal-body #cover_edit").val( cover );
    $(".modal-body #category_edit").val( category );
});
$(document).on('click', "#del", function() {
    var video_id    = $(this).attr("del-video_id");
    var cover       = $(this).attr("del-cover");
    var title       = $(this).attr("del-title");
    console.log(video_id);
    $(".modal-body #video_id_del").val( video_id );
    $(".modal-body #cover_del").val( cover );
    $("#title_del > p").text( 'Yakin mau menghapus ' + title + '?' );
});    
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Video</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-video-camera"></i>&nbsp; Video
            </li>
        </ol>
    </div>
</div>
<div class="col-lg-12">
    <div class="form-group">
        <button class="btn btn-sm btn-default" id="new" data-toggle='modal' data-target='#modal_new'>
            <span class='glyphicon glyphicon-plus'></span>&nbsp;Tambah Baru
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Video</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th><span class="fa fa-eye" /></th>
                    <th colspan="2" style="width: 50px;">Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($videos->result() as $v) {
                $img = $v->cover;    
                if (file_exists("./assets/cover/".$img) === FALSE || $img == null) {
                    $img = "no_image.png";
                }
                
                if ($v->lst > 0) {
                    $hide = "class='hidden'";
                } else {
                    $hide = "";
                }
                    
                echo "<tr>"
                        . "<td >". anchor('master/video/'.$v->video_id, $v->title) ."</td>"
                        . "<td >". anchor('master/video/'.$v->video_id, $v->lst) ."</td>"
                        . "<td ><img style='width:50px;' src='./assets/cover/".$img."'></td>"
                        . "<td >". $v->category."</td>"
                        . "<td >". date("d/m/y h:ia", strtotime($v->created)) ."</td>"
                        . "<td >". date("d/m/y h:ia", strtotime($v->updated)) ."</td>"
                        . "<td >". $v->view."</td>"
                        
                        . "<td width='40' id='edit' data-toggle='modal' "
                        . "edit-video_id='".$v->video_id."' edit-title='".$v->title."' "
                        . "edit-cover='".$v->cover."' edit-category='".$v->category."' edit-summary='".$v->summary."' data-target='#modal_edit'>"
                        . "<a width='40' href='#' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-pencil'></span></a></td>"
                        
                        . "<td ".$hide." id='del' data-toggle='modal' del-video_id='".$v->video_id."' del-cover='".$v->cover."' del-title='".$v->title."' data-target='#modal_del'>"
                        . "<a href='#' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-trash'></span></a></td>"
                    . "</tr>"; 
            }?>
            </tbody>
        </table>
    </div>
</div>

<!-- MODAL CREATE -->
<div id="modal_new" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <?php echo form_open_multipart('master'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Baru</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <input class="form-control" id="title" name="title" placeholder="Title" required>
          </div>
          <div class="form-group">
              <textarea class="form-control" rows="5" name="summary" placeholder="Summary"></textarea>
          </div>
          <div class="form-group">
              <label style="margin-left: 5px">Image</label>
              <input class="btn btn-default form-control" type="file" name="userfile" id="userfile" required>
          </div>
          <div class="form-group">
              <input class="form-control" name="categories" placeholder="Categories">
              <p style="margin: 5px; color: #999;">Pisahkan kategori dengan tanda koma (,)</p>
          </div>
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_create" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <?php echo form_close('master'); ?>
  </div>
</div>

<!-- MODAL EDIT -->
<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
  <?php echo form_open_multipart('master'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perbarui</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <input type="hidden" id="video_id_edit" name="video_id_edit" required>
              <input class="form-control" id="title_edit" name="title_edit" placeholder="Title" required>
          </div>
          <div class="form-group">
              <textarea class="form-control" rows="5" id="summary_edit" name="summary_edit" placeholder="Summary"></textarea>
          </div>
          <div class="form-group">
              <label style="margin-left: 5px">Image</label>
              <input type="input" id="cover_edit" name="cover_edit" />
              <input class="btn btn-default form-control" type="file" name="userfile" id="userfile">
          </div>
          <div class="form-group">
              <input class="form-control" id="category_edit" name="category_edit" placeholder="Categories">
              <p style="margin: 5px; color: #999;">Pisahkan kategori dengan tanda koma (,)</p>
          </div>
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_edit" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <?php echo form_close('master'); ?>
  </div>
</div>

<!-- MODAL DELETE -->
<div id="modal_del" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
  <?php echo form_open_multipart('master'); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
          <input hidden id="video_id_del" name="video_id_del">
          <input hidden id="cover_del" name="cover_del">
          <div id="title_del"><p></p></div>
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_delete" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
    <?php echo form_close('master'); ?>
  </div>
</div>