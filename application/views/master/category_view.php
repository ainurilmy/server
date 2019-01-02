<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript">
$(document).on('click', "#edit", function() {
    var id  = $(this).attr("cat_id");
    var cat = $(this).attr("category");
    console.log(id);

    $(".modal-body #cat_id").val( id );
    $(".modal-body #category").val( cat );      
});
$(document).on('click', "#del", function() {
    var id  = $(this).attr("cat_id");
    var cat = $(this).attr("category");
    console.log(id);

    $(".modal-body #cat_id").val( id );
    $("#category > p").text( 'Yakin mau menghapus ' + cat + '?' );
});    
</script>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-tags"></i>&nbsp; Kategori
            </li>
        </ol>
    </div>
</div>
<div class="col-lg-6">
    <div class="form-group">
        <button class="btn btn-sm btn-default" data-toggle='modal' data-target='#modal_new'>
            <span class='glyphicon glyphicon-plus'></span>&nbsp;Tambah Baru
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th colspan="2" style="width: 50px;">Edit</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($categories->result() as $c) {
            echo "<tr>"
                    . "<td >".$c->category."</td>"
                    . "<td width='50' id='edit' data-toggle='modal' cat_id='".$c->cat_id."' category='".$c->category."' data-target='#modal_edit'>"
                    . "<a width='50' href='#' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-pencil'></span></a></td>"
                    . "<td id='del' data-toggle='modal' cat_id='".$c->cat_id."' category='".$c->category."' data-target='#modal_del'>"
                    . "<a href='#' class='btn btn-sm btn-default'><span class='glyphicon glyphicon-trash'></span></a></td>"
                . "</tr>"; 
            }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Create -->
<div id="modal_new" class="modal fade" role="dialog">
  <?php echo form_open('master/category'); ?>
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Baru</h4>
      </div>
      <div class="modal-body">
          <input class="form-control" name="category_new">
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_create" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Perbarui</h4>
      </div>
      <div class="modal-body">
        <input hidden id="cat_id" name="cat_id">
          <input id="category" class="form-control" name="category">
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_update" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div id="modal_del" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
          <input hidden id="cat_id" name="cat_id">
          <div id="category"><p></p></div>
      </div>
      <div class="modal-footer">
            <button type="submit" name="submit_delete" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>