<title>โปรแกรมที่เปิดสอบ : Testcenter</title>
<style>
  .card1 {
    background-color: white;
    width: 100%;
    border-radius: 5px;
    box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);

    /* padding: 14px 80px 18px 36px; */
    cursor: pointer;
  }

  .card1:hover {
    transform: scale(1.01);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06);
  }

  @media(max-width: 990px) {
    .card {
      margin: 20px;
    }
  }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<div class="container  wow fadeIn">
  <br><br>
  <nav class="bg-transparent breadcrumb breadcrumb-2 px-0 mb-5" aria-label="breadcrumb">
    <h2 class="h6" style="font-size:18pt"><strong>โปรแกรมที่เปิดอบรมในขณะนี้</strong></h2>
    <ul class="list-unstyled d-flex p-0 m-0">
      <li class="breadcrumb-item"><a href="<?php echo base_url() . 'home'; ?>">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">โปรแกรมที่เปิดอบรมในขณะนี้</li>
    </ul>
  </nav>
  <div class="row pb-4">
    <div id="get_program" class="row pb-4">
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="<?php echo base_url() . 'js' ?>/home.js"></script>

</div>
<script>
  document.getElementById('program').style.color = "#FF6100";
</script>