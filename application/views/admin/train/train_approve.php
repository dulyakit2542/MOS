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
	<title>อนุมัติการเข้าสอบ</title>
	<style>
		.card1 {
			background-color: white;
			width: 100%;
			border-radius: 10px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 0px 20px 0 rgba(0, 0, 0, 0.19);
		}
		td {
			color: #424242;
			font-size: 11pt
		}
	</style>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . 'js' ?>/train_approve.js"></script>

	<!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
		<!-- <?php
		echo '<pre>';
		var_dump($training_wait);
		echo '</pre>';?> -->
	<div class="content-wrapper">
		<div class="content">

			<!-- Products Inventory -->
			<div class="card card-default">
				<div class="card-header">
					<!-- <h2>Products Inventory</h2> -->
					<a href="<?php echo base_url() . 'admin/training_pass' ?> "><button type="button" class="btn text-white btn-pill mb-3 mb-xxl-0 btn-success" style="font-size: 11pt;"><i class="fas fa-user-check"></i> ตรวจสอบผู้ใช้ที่อนุมัติแล้ว</button></a>
					<br><br>
				</div>
				<div class="card-body overflow-auto" >
					<table id="myTable" class="table table-hover table-product" style="width:100%;">
						<thead>
							<tr align="center" class="h6">
								<th style="color: #323232; font-weight: bold;">ลำดับ</th>
								<th style="color: #323232; font-weight: bold;">ชื่อ</th>
								<th style="color: #323232; font-weight: bold;">รหัสบัตรประชาชน</th>
								<th style="color: #323232; font-weight: bold;">หน่วยงาน</th>
								<th style="color: #323232; font-weight: bold;">โปรแกรม</th>
								<th style="color: #323232; font-weight: bold;">กลุ่ม</th>
								<th style="color: #323232; font-weight: bold;">วันที่ยืนยัน</th>
								<th style="color: #323232; font-weight: bold;">จัดการ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// var_dump($checktraining);
							foreach ($training_wait as $ck) {
							?>
								<tr>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										echo $ck->train_member_id;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $ck->prefix . $ck->fname . ' ' . $ck->lname;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $ck->personal_id;
										?>
									</td>
									<td style="vertical-align: middle;">
										<?php
										echo $ck->name;
										?>
									</td>
									<td style="text-align: left; vertical-align: middle;">
										<?php
										echo $ck->program_name;
										?>
									</td>
									<td style="text-align: center; vertical-align: middle;">
										<?php
										echo $ck->train_room_name;
										?>
									</td>

									<td style="text-align: center; vertical-align: middle;">
										<?php
										$date = $ck->train_member_confirm_date;
										echo DateThai($date);
										?>
									</td>
									<td align="center" style="vertical-align: middle;">

										<!-- embed code -->
										<input type="text" style="display:none" id="status_pass" value="pass" />
										<input type="text" style="display:none" id="status_not" value="notpass" />
										<input type="text" style="display:none" id="status_wait" value="wait" />
										<input type="text" style="display:none" id="admin_check" value="<?php echo $_SESSION["user_info"]->fname_en . " " . $_SESSION["user_info"]->lname_en; ?>">
										<!-- embed code -->

										<div class="row mt-3">
											<div class="col-12">
												<button type="button" class="mb-1 btn btn-pill btn-success" style="font-size: 11pt;" onclick="passBtn(<?php echo $ck->train_member_id; ?>,this)"><i class="fas fa-check"></i> อนุญาต</button>
												<button type="button" class="mb-1 btn btn-pill btn-danger" style="font-size: 11pt;" onclick="failBtn(<?php echo $ck->train_member_id; ?>,this)"><i class="fas fa-times"></i> ไม่อนุญาต</button>
												<h6 style="display:none; justify-content: center; align-items: left; color:#00CE48; font-size:25pt;"><i class="fas fa-check-circle"></i></h6>
												<h6 style="display:none; justify-content: center; align-items: left; color:red; font-size:25pt;"><i class="fas fa-times-circle"></i></h6>
												<button type="button" class="mb-1 btn btn-pill btn-danger" style="display: none;" onclick="canBtn(<?php echo $ck->train_member_id; ?>,this)" >ยกเลิก</button>
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
		console.log(new Date);
		$(document).ready(function() {
			$('#myTable').DataTable();
		});
	</script>
<?php
	// <!-- ไม่ใช่ ADMIN -->
} else {
	redirect('program/error404');
}
?>