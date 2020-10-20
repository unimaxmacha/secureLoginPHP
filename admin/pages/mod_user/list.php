<?php
$heading  = "ユーザー管理";
$m     = "user";
$form  = "form";
$view  = "view";
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
        <tr>
            <td>1</td>
            <td>スンダル・マチャマシ</td>
            <td>admin</td>
            <td>sundar.machamasi@sysystem.co.jp</td>
            <td>千葉県市川市伊勢宿1-7山辺ハイツ102</td>
            <td>2020-10-15</td>
            <td><a href="#"><span class="fa fa-eye"></span></a>&nbsp;<a href="#"><span class="fa fa-edit"></span></a>&nbsp;<a href="#"><span class="fa fa-trash"></span></a></td>
        </tr>
        <tr>
            <td>2</td>
            <td>David</td>
            <td>d_vid156</td>
            <td>david_986wil@gmail.com</td>
            <td>United Kindom</td>
            <td>2020-10-15</td>
            <td><a href="#"><span class="fa fa-eye"></span></a>&nbsp;<a href="#"><span class="fa fa-edit"></span></a>&nbsp;<a href="#"><span class="fa fa-trash"></span></a></td>
        </tr>
        <tr>
            <td>3</td>
            <td>सुन्दर मचामासी</td>
            <td>unimax</td>
            <td>unimaxmacha@gmail.com</td>
            <td>गोल्मदि-६,भक्त्तपुर,नेपाल</td>
            <td>2020-10-15</td>
            <td><a href="#"><span class="fa fa-eye"></span></a>&nbsp;<a href="#"><span class="fa fa-edit"></span></a>&nbsp;<a href="#"><span class="fa fa-trash"></span></a></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Age</th>
            <th>Start date</th>
            <th>Salary</th>
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