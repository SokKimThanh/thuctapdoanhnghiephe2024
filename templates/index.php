 <!DOCTYPE html>
 <html lang="<?= $config['website']['lang-doc'] ?>">


 <head>
     <?php include TEMPLATE . LAYOUT . "head.php"; ?>
     <?php include TEMPLATE . LAYOUT . "css.php"; ?>
     <style>
         /* thêm style chung cho tiêu đề (kiểu chữ và màu chữ) */
         .roboto-slab,
         .text-danger {
             font-family: "Roboto Slab", serif;
             font-optical-sizing: auto;
             font-weight: normal;
             font-style: normal;

         }

         /* sửa màu text-danger của bootstrap */
         .text-danger {
             color: #C50608 !important;
         }

         /* thêm style cho nút bấm ở mục đăng ký nhận tin */
         .btn-light {
             text-transform: uppercase;
         }

         /* thêm style cho card ở mục vì sao chọn chúng tôi */
         .card-title {
             font-weight: bold;
         }

         /* thêm gạch chân cho tiêu đề kiến thức - tin tức - video */
         .bottom_slash {
             position: relative;
             margin-top: 20px;
             border-bottom: 1px solid #C50608;
             width: 50%;
         }

         /* Thêm style cho hình vuông xoay 45 độ */
         .rotated-square {
             width: 20px;
             height: 20px;
             border: 2px solid #C50608;
             transform: rotate(45deg);
             position: relative;
             margin: 50px;
         }

         /* thêm 2 hình thoi trước và sau */
         .rotated-square::before,
         .rotated-square::after {
             content: '';
             width: 20px;
             height: 20px;
             border: 1px solid #B8B8B8;
             position: absolute;
             top: 0;
             left: 0;
             transform: rotate(45deg);
             /* canh tâm quay của chính nó ra giữa mỗi hình */
             transform-origin: center;
             opacity: 0.5;
         }

         .rotated-square::before {
             transform: rotate(90deg) translate(-45%, -20%)
         }

         .rotated-square::after {
             transform: rotate(90deg) translate(25%, 50%);
         }

         /* Thêm line kẻ ngang 3 hình thoi */
         .rotated-square .line {
             position: absolute;
             width: 72px;
             height: 1px;
             border-bottom: 1px solid #B8B8B8;
             top: 50%;
             left: 50%;
             transform: rotate(135deg) translate(-50%, -50%);
             transform-origin: 0;
         }
     </style>
 </head>

 <body>
     <!-- cắt trang html thành từng khu vực -->
     <!-- section header -->
     <!-- |- header top chao mung + email info-->
     <!-- |- header body -->
     <!-- |-|-row logo cong ty - ô tìm kiếm  - số điện thoại-->
     <!-- |-|- row danh mục - menu - slider-->
     <!-- |-|- row sản phẩm nổi bật-->
     <section>
         <div class="container">
             <div class="row mt-4 align-items-center">

                 <div class="col-md-8">
                     <p class="text-uppercase text-primary m-0 text-center">Công ty thiết bị công nghiệp Toàn Thịnh Phát xin kính chào quý khách</p>
                 </div>
                 <div class="col-md-4">
                     <div class="row align-items-center">
                         <div class="col-md-2">
                             <p class="text-primary m-0">Email:</p>
                         </div>
                         <div class="col-md-4">
                             <p class="text-primary m-0"><?= $optsetting['email'] ?></p>
                         </div>
                         <div class="col-md-6 border-left">
                             <!-- logo mang xa hoi -->
                             <?php foreach ($social1 as $v) { ?>
                                 <a href="<?= $v['link'] ?>" class="ftmxh" target="_blank" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/0x30x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>
                             <?php } ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- section Sản phẩm -->
     <!-- |- sản phẩm mới -->
     <!-- |- danh mục cấp 1 - sản phẩm -->
     <section>
         <div class="container">
             <!-- logo; search; phone; -->
             <div class="row align-items-center">
                 <!-- logo -->
                 <div class="col-md-3">
                     <a class="header_logo" href=""><img onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" /></a>
                 </div>
                 <!-- search -->
                 <div class="col-md-6">
                     <div class="row justify-content-center">
                         <div class="col-md-8">
                             <form>
                                 <div class="input-group mb-3">
                                     <input type="text" class="form-control" id="keyword2" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keyword2');">
                                     <button type="submit" class="btn btn-danger" onclick="onSearch('keyword2');"><i class="far fa-search"></i></button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <!-- phone -->
                 <div class="col-md-3">
                     <p class="phone" style="font-size: xx-large;"><strong><span class="fa-1x"><i class="fa fa-phone-alt"></i></span></strong> <?= $optsetting['dienthoai'] ?></p>
                 </div>
             </div>
             <!-- danh muc; menu -->
             <div class="row">
                 <!-- danh muc -->
                 <div class="col-md-3">
                     <div class="danhmuc">
                         <div class="tieude">Danh mục sản phẩm</div>
                         <ul>
                             <?php foreach ($danhmuc_list as $key => $v) { ?>
                                 <li>
                                     <a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a>
                                 </li>
                             <?php } ?>
                         </ul>
                     </div>
                 </div>
                 <!-- menu; slider, hinh -->
                 <div class="col-md-9">
                     <!-- menu -->
                     <div class="row mb-3">
                         <div class="col-md-12">
                             <?php include TEMPLATE . LAYOUT . "menu.php"; ?>
                         </div>
                     </div>
                     <!-- slider -->
                     <div class="row">
                         <div class="col-md-10">
                             <?php include TEMPLATE . LAYOUT . "slide.php"; ?>
                         </div>
                         <div class="col-md-2">
                             <div class="row">
                                 <div class="col-md-12 text-center">
                                     <img class="img-fluid" src="http://ttpcorp.vn/upload/product/cq5dam-495_430x400.jpeg" alt="">
                                 </div>
                                 <div class="col-md-12">
                                     <img class="img-fluid img-thumbnail" src="http://ttpcorp.vn/upload/product/318807624554052182471537432612429541933056n-8986_321x548.jpg" alt="">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- san pham noi bat -->
             <div class="row">
                 <div class="col-md-4">
                     <img src="http://ttpcorp.vn/upload/images/1.png" alt="img-1" class="img-fluid">
                 </div>
                 <div class="col-md-4">
                     <img src="http://ttpcorp.vn/upload/images/1.png" alt="img-2" class="img-fluid">
                 </div>
                 <div class="col-md-4">
                     <img src="http://ttpcorp.vn/upload/images/1.png" alt="img-3" class="img-fluid">
                 </div>
             </div>
         </div>
     </section>
     <!-- section sản phẩm mới-->
     <section>
         <div class="container">
             <div class="mt-4 text-center">
                 <h3 class="text-danger  text-uppercase ">Sản phẩm</h3>
                 <!-- ba hình thoi và đường kẻ ngang -->
                 <div class="row justify-content-center">
                     <div class="rotated-square">
                         <div class="line"></div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <!-- danh sach san pham -->
                 <ul>
                     <?php foreach ($sanpham_list as $key => $v) { ?>
                         <li>
                             <a href="<?= $v['tenkhongdauvi'] ?>"><?= $v['ten' . $lang] ?></a>
                         </li>
                     <?php } ?>
                 </ul>
             </div>
         </div>
     </section>
     <!-- section đăng ký nhận tin -->
     <section style="background: url('../assets/images/dangkynhantin/bg_dangkynhantin.svg') no-repeat;">
         <div class="container-fluid">
             <div class="row justify-content-center align-items-center">
                 <div class="col-md-3 mt-4 mb-4" style="padding-left:53px;">
                     <img class="img-fluid" src="../assets/images/dangkynhantin/dangkynhantin.svg" alt="">
                     <p class="text-light">Đăng ký nhận tin để nhân được thông tin sản phẩm và chương trình khuyến mãi nhanh nhất</p>
                 </div>
                 <div class="col-md-9">
                     <form>
                         <!-- email -->
                         <div class="row mb-3 mt-3">
                             <div class="col-md-9">
                                 <input type="text" class="form-control" id="email" placeholder="Email:" name="email">
                             </div>
                         </div>
                         <!-- phone number -->
                         <div class="row mb-3 mt-3">
                             <div class="col-md-9">
                                 <input type="text" class="form-control" id="phonenumber" placeholder="Số điện thoại:" name="phonenumber">
                             </div>
                             <div class="col-md-3">
                                 <button type="submit" class="btn btn-light text-danger text-uppercase">Gửi</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </section>
     <!-- section vi sao chon chung toi -->
     <section>
         <div class="container">
             <div class="mt-4 text-center">
                 <h3 class="text-danger  text-uppercase ">Vì sao chọn chúng tôi</h3>
                 <!-- ba hình thoi và đường kẻ ngang -->
                 <div class="row justify-content-center">
                     <div class="rotated-square">
                         <div class="line"></div>
                     </div>
                 </div>
             </div>
             <!-- hang 1 -->
             <div class="row">
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/hangchinhhang.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Hàng Chính hãng</h5>
                                     <p class="card-text">Đúng xuất xứ, đầy đủ giấy tờ</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/giaca.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Giá cả cạnh tranh</h5>
                                     <p class="card-text">Chiết khấu cao cho khối</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/khohang.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Kho hàng có sẵn</h5>
                                     <p class="card-text">Đáp ứng khối lượng > 30 tỷ</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- hang 2 -->
             <div class="row">
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/doingu.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Đội ngũ</h5>
                                     <p class="card-text">Hơn 10 năm kinh nghiệm</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/tuvan.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Tư vấn 24/7</h5>
                                     <p class="card-text">Đáp ứng mọi nhu cầu</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-4">
                     <div class="card mb-3">
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="d-flex h-100 justify-content-center">
                                     <img src="../assets/images/visaochonchungtoi/baohanh.png" class="img-fluid rounded-start align-self-center" alt="">
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <h5 class="card-title">Bảo hành tốt</h5>
                                     <p class="card-text">Bảo hành nhanh một đổi một</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- section kiến thức - tin tức - video -->
     <style>
         /* Thêm xử lý tiêu đề card sát góc lề trái trên cùng*/
         .card-body.ps-0 {
             padding-left: 0;
             padding-top: 0;
         }
     </style>
     <section>
         <div class="container">
             <div class="row">
                 <!-- kien thuc -->
                 <div class="col-md-4">
                     <div class="bottom_slash">
                         <h3 class="text-uppercase text-danger">kiến thức</h3>
                     </div>
                     <p>Chia sẽ kiến thức từ Toàn Thịnh Phát</p>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Uy tín chất lượng cao</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Giá cả cạnh tranh</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Hổ trợ khách hàng 24/7</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- tin tuc -->
                 <div class="col-md-4">
                     <div class="bottom_slash">
                         <h3 class="text-uppercase text-danger">tin tức</h3>
                     </div>
                     <p>Cập nhật những tin tức mới từ Toàn Thịnh Phát</p>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Uy tín chất lượng cao</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Giá cả cạnh tranh</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card mb-3 border-0 me-0 mb-2">
                         <div class="row">
                             <div class="col-md-4">
                                 <img class="img-fluid" src="<?= THUMBS ?>/190x200x1/assets/images/noimage.png" alt="<?= $value['ten' . $lang] ?>" />
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body ps-0">
                                     <h5 class="card-title">Hổ trợ khách hàng 24/7</h5>
                                     <p class="card-text">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- video -->
                 <div class="col-md-4">
                     <div class="bottom_slash">
                         <h3 class="text-uppercase text-danger">videos</h3>
                     </div>
                     <p>Review và trải nghiệm sản phẩm</p>
                     <div>
                         <video controls height="450" width="350">
                             <source src="movie.mp4" type="video/mp4">
                             <source src="movie.ogg" type="video/ogg">
                             Your browser does not support the video tag.
                         </video>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- section đối tác và thương hiệu -->
     <style>
         .doitac {
             display: flex;
             flex-wrap: wrap;
             justify-content: center;
             align-items: center;
             gap: 10px;
             padding: 20px;
             border-radius: 10px;
             overflow: hidden;
         }
     </style>
     <section>
         <div class="container">
             <div class="mt-4 text-center m-auto">
                 <h3 class="text-danger text-uppercase">Đối tác và thương hiệu của chúng tôi</h3>
                 <!-- ba hình thoi và đường kẻ ngang -->
                 <div class="row justify-content-center">
                     <div class="rotated-square">
                         <div class="line"></div>
                     </div>
                 </div>
             </div>
             <div class="row doitac">
                 <!-- đối tác -->
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac1.png" alt="doitac1">
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac2.png" alt="doitac2">
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac3.png" alt="doitac3">
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac4.png" alt="doitac4">
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac5.png" alt="doitac5">
                 <img class="img-fluid" src="../assets/images/doitacvathuonghieucuachungtoi/doitac6.png" alt="doitac6">
             </div>
         </div>
     </section>
     <!-- section footer -->
     <!-- |- row toan thinh phat -->
     <!-- |- row địa chỉ  - fanpage - maps -->
     <!-- |- row bản quyền - số lượng truy cập -->
     <style>
         .footer-logo {
             border-top: #C50608 solid 1px;
             padding-top: 13px;
         }

         .footer-info {
             background: #1BA9FF;
             margin: 0 !important;
             padding: 30px 0;
         }

         .footer-info ul {
             list-style-type: disc;
             /* Hiển thị gạch đầu dòng tròn */
             padding-left: 20px;
             /* Căn lề để gạch đầu dòng không sát mép */
         }

         .footer-info li {
             margin-bottom: 5px;
             /* Thêm khoảng cách giữa các mục */
         }

         .footer li::before {
             content: '-';
             /* Thay đổi bullet thành gạch đầu dòng */
             padding-right: 8px;
         }
     </style>
     <footer>
         <!-- FOOTER LOGO TOAN THINH PHAT -->
         <div class="footer-logo">
             <div class="container">
                 <!-- logo toan thinh phat -->
                 <div class="row mb-3 mt-3">
                     <div class="col-md-8 me-0">
                         <div class="row align-items-center">
                             <div class="col-md-2 me-0">
                                 <img src="../assets/images/doitacvathuonghieucuachungtoi/logoToanThinhPhat.svg" alt="logo" class="img-fluid">
                             </div>
                             <div class="col-md-10 me-0">
                                 <img src="../assets/images/doitacvathuonghieucuachungtoi/fontToanThinhPhat.svg" alt="logo" class="img-fluid">
                                 <p>Toàn Thịnh Phát là công ty hoạt động chủ yếu trong lĩnh vực công nghiệp và dân dụng. Chúng tôi vinh dự trở thành đại diện phân phối các loại các thiết bị công nghiệp uy tín và chất lượng hàng đầu.</p>
                             </div>
                         </div>
                     </div>
                     <!-- logo thuong mai dien tu -->
                     <div class="col-md-4">
                         <div class="row">
                             <div class="col-md-4"><img src="../assets/images/doitacvathuonghieucuachungtoi/shopee.png" alt="shopee" class="img-fluid"></div>
                             <div class="col-md-4"><img src="../assets/images/doitacvathuonghieucuachungtoi/lazada.png" alt="lazada" class="img-fluid"></div>
                             <div class="col-md-4"><img src="../assets/images/doitacvathuonghieucuachungtoi/tiki.png" alt="tiki" class="img-fluid"></div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- FOOTER INFO TOAN THINH PHAT -->
         <div class="footer-info">
             <div class="container text-light">
                 <div class="row mb-3 mt-3">
                     <div class="col-md-6">
                         <ul>
                             <li>Văn Phòng: C41 Nguyễn Thị Búp, Phường Hiệp Thành Quận 12</li>
                             <li>Cơ sở 2: Khu tái định cư Bình Sơn, Xã Lộc An,
                                 Huyện Long Thành, Tỉnh Đồng Nai</li>
                             <li>Cơ sở 3: C41 Nguyễn Thị Búp, Phường Hiệp Thành Quận 12</li>
                             <li>Hotline: 0938 898 087</li>
                             <li>Email: info@ttpcorp.vn</li>
                         </ul>
                         <!-- logo mang xa hoi-->
                         <div>
                             <!-- logo mang xa hoi -->
                             <?php foreach ($social1 as $v) { ?>
                                 <a href="<?= $v['link'] ?>" class="ftmxh" target="_blank" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/0x30x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>
                             <?php } ?>
                         </div>

                     </div>
                     <div class="col-md-3">
                         <h4 class="roboto-slab text-uppercase mb-3">FanPage</h4>
                         <img src="../assets/images/footerTTP/fanpage.png" alt="fanpage">
                     </div>
                     <div class="col-md-3">
                         <h4 class="roboto-slab text-uppercase mb-3">MAPS</h4>
                         <img src="../assets/images/footerTTP/map.png" alt="fanpage">
                     </div>
                 </div>
                 <div class="row mb-2">
                     <div class="col-md-8">
                         <p>2024 © Toàn Thịnh Phát designed by sotagroup.vn</p>
                     </div>
                     <div class="col-md-4">
                         <!-- truy cap luot xem -->
                         <p><span class="pl-2 pr-2">Online: 1</span> <span class="border-left pl-2 pr-2">Hom nay: 20</span> <span class="border-left pl-2 pr-2">Tong truy cap: 100000</span></p>
                     </div>
                 </div>
             </div>
         </div>
     </footer>
     <?php
        include TEMPLATE . LAYOUT . "phone3.php";
        include TEMPLATE . LAYOUT . "modal.php";
        include TEMPLATE . LAYOUT . "js.php";
        ?>
 </body>

 </html>