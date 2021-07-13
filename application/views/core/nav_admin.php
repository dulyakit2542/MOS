</div>
<style>
</style>
<nav class="navbar navbar-expand-md navbar-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" >
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link " href="">
            <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url() . 'program' ?> ">
            <i class="fas fa-atlas"></i></i> จัดการห้องอบรม </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url() . 'program/manage_exam_room' ?>">
            <i class="fas fa-book"></i> จัดการห้องสอบ </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url() . 'program/check_training' ?> ">
            <i class="fas fa-user-edit"></i> อนุมัติเข้าสอบ 
            <?php 					
            $c = count($checktraining); 
            if ($c>0){ ?>
            <span class="badge badge-danger"><?php echo $c;?></span>
            <?php } ?>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url(). 'exam/exam_approve' ?>">
            <i class="fas fa-box"></i> กำหนดชุดข้อสอบ 
            <?php 
            $cexam = count($exam_approve);
            if ($cexam>0){ ?>
            <span class="badge badge-danger"><?php echo $cexam;?></span>
            <?php }?>
            </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url() . 'exam/exam_enter_score' ?> ">
          <i class="fas fa-user-graduate"></i> กรอกคะแนนสอบ 
          <?php 
            $cexam = count($exam_archive_score_null);
            if ($cexam>0){ ?>
            <span class="badge badge-danger"><?php echo $cexam;?></span>
            <?php }?>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo base_url() .'exam/exam_archive'; ?>">
            <i class="fas fa-box"></i> จัดการชุดข้อสอบ </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="">
            <i class="fas fa-poll"></i> สรุปผล </a>
        </li>
      </ul>
    </div>
  </div>
</nav>