<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/animate.min.css">

  <title>Jiasiabro.com</title>
  <style>
    .bg-cover {
      background-position: center center;
      background-repeat: no-repeat;
      -webkit-background-size: cover;
      background-size: cover;
    }

    .carousel-caption {
      background-color: rgba(0, 0, 0, 0.3);
    }

    @media screen and (max-width: 768px) {
      .aaa {
        color: black;
      }

      .bb {
        z-index: 1;
        color: white;
      }
    }

    .text {
      background-color: rgba(0, 0, 0, 0.2);
    }

    .aa {
      background-color: #3565CD;
      color: white;
      font-size: 16px;
    }

    .pic {
      overflow: hidden;
    }

    .pic img {
      transform: scale(1.2, 1.2);
      transition: all 0.3s ease-out;
    }

    .pic img:hover {
      transform: scale(1.4, 1.4);
    }

    /* #work04 {
          animation-duration: 3s;
          animation-delay: 2s;
          animation-iteration-count: infinite;
        }*/
  </style>
</head>

<body>

  <!-- 1 -->
  <section class="bg-secondary">
    <div class="container text-right ">
      <a href="https://zh-tw.facebook.com/"><i class="fab fa-facebook-square text-white"></i></a>
      <a href="https://twitter.com/?lang=zh-tw"><i class="fab fa-twitter-square text-white"></i></a>
    </div>
  </section>

  <!--  2 navbar 選單-->
  <section>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
          <!-- <i class="fas fa-star wow  hinge text-warning"  data-wow-duration="2s" data-wow-delay="0.5s"></i> -->
          <i class="fas fa-tint  text-primary" data-wow-duration="2s" data-wow-delay="0.5s">Jiasiabro</i>

          <!-- <div class="nav-link font-weight-bold" href="#work04" data-wow-duration="2s" data-wow-delay="1s"></div> -->

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link " href="#work04" data-wow-duration="2s" data-wow-delay="1s">關於我們</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#work05" data-wow-duration="2s" data-wow-delay="1s">服務內容</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#" data-wow-duration="2s" data-wow-delay="1s">控制台</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <a href="#" class="btn btn-outline-primary btn-sm mr-2" data-toggle="modal" id="login_ok_btn">登入</a>
            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" id="reg_ok_btn">註冊</a>
          </form>
        </div>
      </div>
    </nav>
  </section>

  <!-- 3  carousel  圖片大小為100vh 填滿整個頁面-->
  <section>
    <div id="carouselExampleCaptions" class="carousel slide 100vh" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active bg-cover" style="background-image: url(img/food01.jpg); height: 80vh;">
          <div class="carousel-caption d-none d-md-block">
            <h5>五方食客享美味，天下吃貨共品香</h5>
            <!-- <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
          </div>
        </div>
        <div class="carousel-item bg-cover" style="background-image: url(img/food02.jpg); height: 80vh;">
          <div class="carousel-caption d-none d-md-block">
            <h5>Second slide label</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="carousel-item bg-cover" style="background-image: url(img/food03.jpg); height: 80vh;">
          <div class="carousel-caption d-none d-md-block">
            <h5>Third slide label</h5>
            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>

  <!-- 4  關於我們-->
  <section class="text-center bg-light  bg-cover p-5" style="background-image: url(img/bg0323.png);" id="work04">
    <div class="font-weight-bold mb-5" style="font-size: 40px">關於我們</div>
    <div class="text-primary font-weight-bold mb-3" style="font-size: 28px">提供您優質的產品與完善解決方案</div>
    <div class="container">
      <div class="row ">
        <div class="col-md-12 mb-3" style="font-size: 20px">Jiasiabro 提供您全台灣最多的美食
        </div>
      </div>
    </div>
    <a href="" class="btn btn-outline-primary mt-4 ab">瞭解更多</a>
  </section>

  <!-- 5 服務內容-->
  <!-- <section>
    	<div class="text-center mt-5 font-weight-bold mb-5" style="font-size: 40px" id="work05">服務內容</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-4">
    				<div class="card pic" >
    					<img src="img/food04.jpg" class="card-img-top " style="border-radius: 20px;height: 450px;" alt="">	
    				</div>
    				<div class=" text-center aa font-weight-bold p-2 mt-1" style="border-radius: 20px">美食清單</div>
    			</div>
    			<div class="col-md-4" > 
    				<div class="card pic" >
    					<img src="img/food05.jpg" class="card-img-top " style="border-radius: 20px;height: 450px;" alt="">	
    				</div>
    				<div class=" text-center aa font-weight-bold p-2 mt-1" style="border-radius: 20px">檢視附近美食</div>
    			</div>
    			<div class="col-md-4">
    				<div class="card pic" >
    					<img src="img/food06.jpg" class="card-img-top " style="border-radius: 20px;height: 450px;" alt="">	
    				</div>
    				<div class=" text-center aa font-weight-bold p-2 mt-1" style="border-radius: 20px">定位功能</div>
    			</div>
    		</div>
    	</div>
	</section> -->

  <!-- Service Card-->
  <section>
    <h1 class="display-4 text-center pt-5 mb-5">服務內容</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card border-0" style="height: 520px;">
            <div class="pic" style="border-radius: 20px 20px 0 0;">
              <img class="card-img-top" src="img/food04.jpg" alt="">
            </div>
            <div class="card-body bg-primary text-white" style="border-radius: 0 0 20px 20px;">
              <h5 class="card-title text-center">美食清單</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0" style="height: 520px;">
            <div class="pic" style="border-radius: 20px 20px 0 0;">
              <img class="card-img-top" src="img/food05.jpg" alt="">
            </div>
            <div class="card-body bg-primary text-white" style="border-radius: 0 0 20px 20px;">
              <h5 class="card-title text-center">檢視附近美食</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card border-0" style="height: 520px;">
            <div class="pic" style="border-radius: 20px 20px 0 0;">
              <img class="card-img-top" src="img/food06.jpg" alt="">
            </div>
            <div class="card-body bg-primary text-white" style="border-radius: 0 0 20px 20px;">
              <h5 class="card-title text-center">定位功能</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="text-center bg-dark text-white p-1 mt-4">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <p class="nav-link " href="#">地址.407台中市西屯區工業區一路100號</p>
      </li>
      <li class="nav-item">
        <p class="nav-link" href="#">電話.(03) 123-4567</p>
      </li>
      <li class="nav-item">
        <p class="nav-link" href="#">傳真.(03) 987-6543</p>
      </li>
      <li class="nav-item">
        <p class="nav-link" href="#">Email.abc@abc.com.tw</p>
      </li>
    </ul>
  </section>


  <section>
    <div class="text-primary text-center  ">版權所有 © Jiasiabro.com</a></div>
  </section>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script>
    $(function() {
      //登入監聽
      $("#login_ok_btn").bind("click", function() {
        // $.ajax({
        //  type: "POST",
        //  url: "api/mem_login_api.php",
        //  data:{account:$("#account").val(),password:$("#password").val()},
        //  dataType: "json",
        //  success: showlogin,
        //  error: function(){
        //    alert("api/mem_login_api.php 接收錯誤!");
        //  }
        //  });
        location.href = "mem_login.php";
      });
      //註冊監聽
      $("#reg_ok_btn").bind("click", function() {

        location.href = "mem_reg.php";
      });
    }); // end $(function()
  </script>
</body>

</html>