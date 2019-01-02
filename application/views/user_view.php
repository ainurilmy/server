<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pengguna</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-users"></i>&nbsp; Pengguna
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
                    <th>Last login</th>
                    <th>Join</th>
                    <th><span class="fa fa-bookmark-o"></span></th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users->result() as $u) {
                
            echo "<tr>"
                    . "<td >". $u->android_id."</td>"
                    . "<td >". date("d/m/y h:ia", strtotime($u->last_login)) ."</td>"
                    . "<td >". date("d/m/y h:ia", strtotime($u->created)) ."</td>"
                    . "<td >". $u->likes."</td>"
                . "</tr>"; 
            }?>
            </tbody>
        </table>
    </div>
</div>