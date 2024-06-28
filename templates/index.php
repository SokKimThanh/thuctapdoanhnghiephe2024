 <!DOCTYPE html>
 <html lang="<?= $config['website']['lang-doc'] ?>">


 <head>
     <?php include TEMPLATE . LAYOUT . "head.php"; ?>
     <?php include TEMPLATE . LAYOUT . "css.php"; ?>
     <style>
         .card-title {
             font-weight: bold;
         }

         .roboto-slab,
         .text-danger {
             font-family: "Roboto Slab", serif;
             font-optical-sizing: auto;
             font-weight: normal;
             font-style: normal;
         }

         .btn-light {
             /* text-danger align-self-end mb-5 roboto-slab text-uppercase */
             color: #C50608;
             /* align-self: self-end; */
             /* margin-bottom: 16px; */
             text-transform: uppercase;
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
                 <img height="32" width="32" class="img-fluid" src="https://www.kindpng.com/picc/m/17-178316_diamonds-clipart-blue-diamond-openrefine-icon-hd-png.png" alt="">
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
     <section style="background: url('https://free4kwallpapers.com/uploads/originals/2015/04/23/red-line-background.jpg') no-repeat;">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-3 mt-4 mb-4">
                     <div class="h-100 d-flex flex-column justify-content-center align-items-center">
                         <h3 class="text-light text-center text-uppercase roboto-slab">Đăng ký nhận tin</h3>
                         <p class="text-light">Đăng ký nhận tin để nhân được thông tin sản phẩm và chương trình khuyến mãi nhanh nhất</p>
                     </div>
                 </div>
                 <div class="col-md-7  ">
                     <form action="" class="">
                         <div class="form-floating mb-3 mt-3">
                             <input type="text" class="form-control" id="email" placeholder="Email:" name="email">

                         </div>
                         <div class="form-floating mb-3 mt-3">
                             <input type="text" class="form-control" id="phonenumber" placeholder="Số điện thoại:" name="phonenumber">

                         </div>
                     </form>
                 </div>
                 <div class="col-md-2">
                     <div class="d-flex flex-column justify-content-end">
                         <button class="btn btn-light align-items-end">Gửi</button>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!-- section vi sao chon chung toi -->
     <section>
         <div class="container">
             <div class="mt-4 text-center">
                 <h3 class="text-danger  text-uppercase ">Vì sao chọn chúng tôi</h3>
                 <img height="32" width="32" class="img-fluid" src="https://www.kindpng.com/picc/m/17-178316_diamonds-clipart-blue-diamond-openrefine-icon-hd-png.png" alt="">
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
         .bottom_slash {
             position: relative;
             margin-bottom: 20px;
             margin-top: 20px;
             border-bottom: 1px solid #C50608;
             width: 50%;
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
                 </div>
                 <!-- tin tuc -->
                 <div class="col-md-4"></div>
                 <!-- video -->
                 <div class="col-md-4"></div>
             </div>
         </div>
     </section>
     <!-- section đối tác và thương hiệu -->

     <!-- section footer -->
     <!-- |- row toan thinh phat -->
     <!-- |- row địa chỉ  - fanpage - maps -->
     <!-- |- row bản quyền - số lượng truy cập -->
     <footer>

     </footer>
     <?php
        include TEMPLATE . LAYOUT . "phone3.php";
        include TEMPLATE . LAYOUT . "modal.php";
        include TEMPLATE . LAYOUT . "js.php";
        ?>
 </body>

 </html>