<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script type="text/javascript">
function change_password(){
    var sess     = "<?php echo $this->session->userdata('pass_adm'); ?>";
    var pass1    = $("#pass1").val();
    var pass2    = $("#pass2").val();
    var confirm  = $("#confirm").val();
    console.log("klik");
    if(pass1 === '' || pass2 === '' || confirm === ''){
        $("#notif").html("<div class='alert alert-warning' role='alert'>All field required!</div>");
    } else if(pass1 !== sess){
        $("#notif").html("<div class='alert alert-warning' role='alert'>Please confirm current password correctly!</div>");
    } else if(pass2 !== confirm){
        $("#notif").html("<div class='alert alert-warning' role='alert'>Please confirm password correctly!</div>");
    } else {
        $.ajax({
            url:"<?php echo base_url() ?>admin/password_update",
            type:"GET",
            data:'password=' + pass2,
                success:function(data){
                    $("#notif").html("<div class='alert alert-success' role='alert'>Change password successfully!</div>");
                    $("#pass1").val(''); $("#pass2").val(''); $("#confirm").val('');
                }
        });
    }
}
</script>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengaturan</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-user"></i>&nbsp; Akun
            </li>
        </ol>
    </div>
</div>

<div class="col-lg-6">
    <div id="notif"></div>
    <div class="form-group">
        <input type="password" class="form-control" id="pass1" name="pass1" placeholder="Password saat ini" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Password baru" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Konfirmasi password" required>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-default" onclick="change_password()">SUBMIT</button>
    </div>
</div>