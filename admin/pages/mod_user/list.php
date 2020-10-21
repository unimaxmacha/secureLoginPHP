<?php
$heading  = "ユーザー管理";
$m     = "user";
$form  = "form";
$view  = "view";

$sql = "SELECT * FROM tbl_users";

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0"><?php echo $heading; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <a href="#">
          	<button type="button" class="btn btn-primary btn-sm pull-right" aria-label="Add">
		  		<span class="fa fa-plus" aria-hidden="true"></span> ユーザー追加
			</button>
		</a>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<table id="table_data" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>S.No.</th>
            <th>名前</th>
            <th>ユーザー名</th>
            <th>E－メール</th>
            <th>住所</th>
            <th>作成日</th>
            <th>＃</th>
        </tr>
    </thead>
    <tbody>
    	<?php $sn = 1;
    		if ($result = $dbConn->query($sql)) {
				if($result->num_rows > 0) { 
					while($row = $result->fetch_array()) {
					?>
					<tr>
			            <td><?php echo $sn; ?></td>
			            <td><?php echo $row['fullname']; ?></td>
			            <td><?php echo $row['username']; ?></td>
			            <td><?php echo $row['email']; ?></td>
			            <td><?php echo $row['address']; ?></td>
			            <td><?php echo $row['create_at']; ?></td>
			            <td><a href="#"><span class="fa fa-eye"></span></a>&nbsp;<a href="#"><span class="fa fa-edit"></span></a>&nbsp;<a href="#"><span class="fa fa-trash"></span></a></td>
			        </tr>
			        <?php $sn++;}
				} else {
					echo "No record in the table.";
				}
			} else {
				echo "Wrong Select Query!";
			}
    	?>
    </tbody>
    <tfoot>
        <tr>
            <th>S.No.</th>
            <th>名前</th>
            <th>ユーザー名</th>
            <th>E－メール</th>
            <th>住所</th>
            <th>作成日</th>
            <th>＃</th>
        </tr>
    </tfoot>
</table>
</div>
</div>  
<script>
	$(document).ready(function() {
		$('#table_data').dataTable( {
		    "pagingType": "full_numbers",
			"scrollX": true
		} );
	});
</script>