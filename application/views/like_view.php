<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Video Disukai</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-heart-o"></i>&nbsp; Suka
            </li>
        </ol>
    </div>
</div>
<div class="col-lg-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Android ID</th>
                    <th>Title</th>
                    <th>Episode</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($likes->result() as $l) {
                echo "<tr>"
                        . "<td >". $l->android_id."</td>"
                        . "<td >". $l->video_title."</td>"
                        . "<td >". $l->list_title."</td>"
                        . "<td >". date("d/m/y h:ia", strtotime($l->created)) ."</td>"
                    . "</tr>"; 
            } ?>
            </tbody>
        </table>
    </div>
</div>