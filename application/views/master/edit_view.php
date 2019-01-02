<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $detail['video_title']." - ".$detail['title']?></h1>
        <ol class="breadcrumb">
            <li class="active">
                <a href="<?php echo base_url()?>master"><i class="fa fa-video-camera"></i>&nbsp; Video</a>
            </li>
            <li class="active">
                <a href="<?php echo base_url()?>master/video/<?php echo $detail['video_id']; ?>"><i class="fa fa-list-ol"></i>&nbsp; List</a>
            </li>
            <li class="active">
                <i class="fa fa-upload"></i>&nbsp; Edit
            </li>
        </ol>
    </div>
</div>

<div class="col-lg-6">
    <?php echo form_open_multipart('master/edit')?>
    
    <!--hidden input-->
    <input type="hidden" name="video_id" value="<?php echo $detail['video_id'] ?>" />
    <input type="hidden" name="list_id" value="<?php echo $detail['list_id'] ?>" />
    
    <div class="form-group">
        <input class="form-control" name="title" placeholder="Judul" value="<?php echo $detail['title'] ?>">
    </div>
    <div class="form-group">
        <input type="hidden" name="filename"  value="<?php echo $detail['filename'] ?>"/>
        <input class="btn btn-default form-control" type="file" name="userfile" id="userfile">
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-default">SUBMIT</button>
    </div>
</div>
