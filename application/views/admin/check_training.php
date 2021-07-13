<?php
$strDate = date("Y-m-d h:i:s");
DateThai($strDate);
echo "<pre>";
echo '</pre>';
$permission_admin = false;
if (count($_SESSION) > 1) {
	foreach ($_SESSION['permission'] as $row) {
		if ($row->text_type == 'admin') {
			$permission_admin = true;
		}
	}
}
if ($permission_admin) {
?>
	<title>อนุมัติการเข้าสอบ</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

	<body>
		<br>
		<div class="container-fluid wow fadeIn" style="background-color: #F7F7F7;">
			<nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-2" aria-label="breadcrumb">
				<strong>
					<h2 class="h2" style="color: #323232; font-size:16pt;">อนุมัติการเข้าสอบ</h2>
				</strong>
				<ul class="list-unstyled d-flex p-1 m-1">
					<li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard'; ?>">Dashboard</a></li>
					<li class="breadcrumb-item active" aria-current="page">อนุมัติการเข้าสอบ</li>
				</ul>
			</nav>
			<div>
				<a href="<?php echo base_url() . 'program/training_pass' ?> "><button type="button" class="btn btn-success" style="font-size: 11pt;"><i class="fas fa-user-check"></i> ตรวจสอบผู้ใช้ที่อนุมัติแล้ว</button></a>
				<br><br>
			</div>
			<table id="myTable" class="table " cellspacing="0" style="box-shadow: 0 0px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);">
				<thead>
					<tr align="center">
						<th style="color: #323232; font-weight: bold;">ลำดับ</th>
						<th style="color: #323232; font-weight: bold;">ชื่อ</th>
						<th style="color: #323232; font-weight: bold;">รหัสบัตรประชาชน</th>
						<th style="color: #323232; font-weight: bold;">หน่วยงาน</th>
						<th style="color: #323232; font-weight: bold;">โปรแกรม</th>
						<th style="color: #323232; font-weight: bold;">กลุ่ม</th>
						<!-- <th style="color: #323232; font-weight: bold;">สถานะ</th> -->
						<th style="color: #323232; font-weight: bold;">วันที่ยืนยัน</th>
						<th style="color: #323232; font-weight: bold;">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($checktraining as $ck) {
					?>
						<tr>
							<td style="text-align: center; font-size: 12px;">
								<?php
								echo $ck->program_member_id;
								?>
							</td>
							<td>
								<?php
								echo $ck->prefix . $ck->fname . ' ' . $ck->lname;
								?>
							</td>
							<td>
								<?php
								echo $ck->personal_id;
								?>
							</td>
							<td>
								<?php
								echo $ck->name;
								?>
							</td>
							<td style="text-align: center;">
								<?php
								echo $ck->program_name;
								?>
							</td>
							<td style="text-align: center;">
								<?php

								echo $ck->program_room;

								?>
							</td>
							<!-- <td style="text-align: center;">
								<?php
								echo $ck->wait_for_test;
								?>
							</td> -->
							<td style="text-align: center;">
								<?php
								$date = $ck->wait_date_for_test;
								echo DateThai($date);
								?>
							</td>
							<td align="center">

							<!-- embed code -->
								<input type="text" style="display:none" id="date" value="<?php echo $strDate; ?>" />
								<input type="text" style="display:none" id="status" value="pass" />
								<input type="text" style="display:none" id="status_not" value="notpass" />
								<input type="text" style="display:none" id="status_wait" value="wait" />
								<input type="text" style="display:none" id="admin" value="<?php echo $_SESSION["user_info"]->fname_en . " " . $_SESSION["user_info"]->lname_en; ?>">
							<!-- embed code -->

								<div class="row mt-3">
									<div class="col-12">
										<button type="button" class="btn btn-success" style="font-size: 11pt;" onclick="passBtn(<?php echo $ck->program_member_id; ?>,this)"><i class="fas fa-check"></i> อนุญาต</button>
										<button type="button" class="btn btn-danger" style="font-size: 11pt;" onclick="failBtn(<?php echo $ck->program_member_id; ?>,this)"><i class="fas fa-times"></i> ไม่อนุญาต</button>
										<h6 style="display: none; justify-content: center; align-items: center; color:#00CE48; font-size:25pt;"><i class="fas fa-check-circle"></i></h6>
										<h6 style="display: none; justify-content: center; align-items: center; color:red; font-size:25pt;"><i class="fas fa-times-circle"></i></h6>
										<button type="button" class="btn btn-danger" onclick="canBtn(<?php echo $ck->program_member_id; ?>,this)" style="display: none;">ยกเลิก</button>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<br><br>
	</body>
	<script>
		$('.datepicker').on('mousedown', function preventClosing(event) {
			event.preventDefault();
		});
	</script>
	<script>
		$(document).ready(function() {
			$('#myTable').DataTable({});
			$('.dataTables_length').addClass('bs-select');
		});
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<?php
	// <!-- ไม่ใช่ ADMIN -->
} else {
	redirect('program/error404') ;
}
?>