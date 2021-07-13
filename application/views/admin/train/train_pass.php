<?php
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
	<title>ผู้ใช้ที่อนุมัติแล้ว</title>


	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . 'js' ?>/train_approve.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<style>
		.card1 {
			background-color: white;
			width: 100%;
			border-radius: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
		}

		td {
			color: #424242;
			font-size: 11pt;
		}
	</style>
	<!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
	<div class="content-wrapper">
		<div class="content">
			<!-- Products Inventory -->
			<div class="card card-default">
				<div class="card-header">
					<a href="<?php echo base_url() . 'admin/training_approve' ?> ">
						<button type="button" class="btn btn-success btn-pill" style="font-size: 11pt;"><i class="fas fa-undo"></i> กลับก่อนหน้านี้</button>
					</a>
				</div>

				<div class="card-body overflow-auto">
					<table id="myTable" class="table table-hover table-product" style="width:100%;">
						<thead>
							<tr align="center" class="h6">
								<th style="color: #323232; font-weight: bold;">ลำดับ</th>
								<th style="color: #323232; font-weight: bold;">ชื่อ</th>
								<th style="color: #323232; font-weight: bold;">รหัสบัตรประชาชน</th>
								<th style="color: #323232; font-weight: bold;">หน่วยงาน</th>
								<th style="color: #323232; font-weight: bold;">โปรแกรม</th>
								<th style="color: #323232; font-weight: bold;">กลุ่ม</th>
								<!-- <th style="color: #323232; font-weight: bold;">สถานะ</th> -->
								<th style="color: #323232; font-weight: bold;">วันที่อนุมัติ</th>
								<th style="color: #323232; font-weight: bold;">สถานะ</th>
								<th style="color: #323232; font-weight: bold;">ผู้อนุมัติ</th>
								<th style="color: #323232; font-weight: bold;">จัดการ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($training_pass as $tp) {
							?>
								<tr >
									<td style="vertical-align: middle;">
										<?php
										echo $tp->train_member_id;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $tp->prefix . $tp->fname . ' ' . $tp->lname;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $tp->personal_id;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $tp->name;
										?>
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										echo $tp->program_name;
										?>
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										echo $tp->train_room_name;
										?>
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										$date = $tp->train_member_admin_date;
										echo DateThai($date);
										?>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										$st = $tp->train_member_status;
										if ($st == 'notpass') {
											echo '<h6 style="color: red;">ไม่ผ่าน</h6>';
										} else {
											echo '<h6 style="color: green;">เข้าสอบได้</h6>';
										}
										?>
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										echo $tp->train_member_admin;
										?>
									</td>
									<td align="center">
										<input type="text" style="display:none" id="status" value="pass" />
										<input type="text" style="display:none" id="status_not" value="notpass" />
										<input type="text" style="display:none" id="status_wait" value="wait" />
										<input type="text" style="display:none" id="admin" value="<?php echo $_SESSION["user_info"]->fname_en . " " . $_SESSION["user_info"]->lname_en; ?>">
										<div class="row mt-3">
											<div class="col-12">
												<h6 style="display: none; justify-content: center; align-items: center;">ยกเลิกสำเร็จ</h6>
												<button type="button" class="mb-1 btn btn-pill btn-danger" onclick="cancelBtn(<?php echo $tp->train_member_id; ?>,this)">ยกเลิก</button>
											</div>
										</div>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
	<script>
		document.getElementById("check_training").className = "active";
		document.getElementById("title").innerHTML = `<span style="color: #323232; font-size:16pt; font-weight: bold;" class="h2 d-none d-lg-inline-block">อนุมัติการอบรม/</span>ผู้ใช้ที่อนุมัติแล้ว`;
		
		var date = document.getElementById("date").value;
		document.getElementById("get_date").innerHTML = dateThaiJs(date);
	</script>
<?php
	// <!-- ไม่ใช่ ADMIN -->
} else {
	redirect('program/error404');
}
?>