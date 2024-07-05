 <!-- section sản phẩm mới-->
 <section id="sanphammoi">
     <div class="container">
         <div class="row mt-4 text-center">
             <h3 class="text-danger  text-uppercase ">Sản phẩm</h3>
             <!-- ba hình thoi và đường kẻ ngang -->
             <div class="square-area">
                 <div class="rotated-square">
                     <div class="line"></div>
                 </div>
             </div>
         </div>
         <!-- San pham nổi bật -->
         <div class="row mb-3 dsSanPhamNoiBat">
             <!-- danh sach san pham: tieu de danh sach-->
             <div class="col-md-12">
                 <div class="row">
                     <div class="col-md-6">
                         <h4 class="text-danger text-uppercase">Sản phẩm nổi bật</h4>
                     </div>
                     <div class="col-md-6">
                         <!-- bread cum -->
                         <nav>
                             <ul class="roboto-slab">
                                 <li>
                                     <a class="text-danger active" href=""><?= $v['ten' . $lang] ?></a>
                                 </li>
                             </ul>
                         </nav>
                     </div>
                 </div>
             </div>
             <!-- danh sach san pham: danh sach hien thi -->
             <!-- php loop start -->
             <div class="owl-carousel owl-theme auto_dcategory">
                 <?php foreach ($sanpham_nb as $value) {  ?>
                     <!-- danh sach san pham -->
                     <!-- sanpham margin -->
                     <div class="p-0">
                         <div class="card">

                             <?php
                                // UPLOAD_PRODUCT_L trong định nghĩa file constant.php
                                $imagePath =  UPLOAD_PRODUCT_L . $value['photo'];
                                $defaultImage = THUMBS . "/190x200x1/assets/images/noimage.png";
                                $imageSrc = file_exists($imagePath) && !empty($value['photo']) ? $imagePath : $defaultImage;
                                ?>
                             <div class="card-body">
                                 <img class="card-img-top" src="<?= $imageSrc ?>" alt="<?= $value['ten' . $lang] ?>" />
                                 <h5 class="card-title roboto-slab"><?= $value['ten' . $lang] ?></h5>
                             </div>

                             <div class="card-footer text-danger">
                                 <!-- định dạng giá tiền -->
                                 <!-- lấy giá tiền từ database -->
                                 <!-- $value['gia'] -->
                                 <p class="card-text"> Giá: <?= $func->format_money($value['gia']) ?> </p>
                                 <p class="text-align-center">HOTLINE: <?= $optsetting['hotline'] ?></p>
                             </div>
                         </div>
                     </div>
                     <!-- php loop end -->
                 <?php } ?>
             </div>
             <!-- end carousel -->
         </div>
         <!-- sản phẩm theo loại nổi bật -->
         <?php foreach ($danhmucnb_list as $key => $v) { ?>
             <div class="row mb-3 dsSanPhamNoiBat">
                 <!-- danh sach san pham: tieu de danh sach-->
                 <div class="col-md-12">
                     <div class="row">
                         <div class="col-md-6">
                             <h4 class="text-danger text-uppercase"><?= $v['ten' . $lang] ?></h4>
                         </div>
                         <div class="col-md-6">
                             <!-- bread cum -->
                             <nav>
                                 <ul class="roboto-slab">
                                     <li>
                                         <a class="text-danger active" href=""><?= $v['ten' . $lang] ?></a>
                                     </li>
                                 </ul>
                             </nav>
                         </div>

                     </div>
                 </div>
                 <!-- danh sach san pham: danh sach hien thi -->
                 <!-- php loop start -->
                 <?php $sanpham = $d->rawQuery("select ten$lang, tenkhongdauvi, mota$lang, ngaytao,photo, id,gia from #_product where id_list = ? and hienthi>0 and type='san-pham' order by stt,id desc", array($v['id'])); ?>
                 <div class="owl-carousel owl-theme auto_dcategory">
                     <?php foreach ($sanpham as $key => $value) { ?>
                         <!-- danh sach san pham -->
                         <!-- sanpham margin -->
                         <div class="p-0">
                             <div class="card">
                                 <?php
                                    // UPLOAD_PRODUCT_L trong định nghĩa file constant.php
                                    $imagePath =  UPLOAD_PRODUCT_L . $value['photo'];
                                    $defaultImage = THUMBS . "/190x200x1/assets/images/noimage.png";
                                    $imageSrc = file_exists($imagePath) && !empty($value['photo']) ? $imagePath : $defaultImage;
                                    ?>
                                 <!-- this.src là giữ cho src luôn có hình mặc định khi event onerror được kích hoạt -->
                                 <div class="card-body">
                                     <img class="card-img-top" onerror="this.src=<?= $defaultImage ?>" src="<?= $imageSrc ?>" alt="<?= $value['ten' . $lang] ?>" />
                                     <h5 class="card-title roboto-slab"><?= $value['ten' . $lang] ?></h5>
                                 </div>

                                 <div class="card-footer text-danger">
                                     <!-- định dạng giá tiền -->
                                     <!-- lấy giá tiền từ database -->
                                     <!-- $value['gia'] -->
                                     <p class="card-text"> Giá: <?= $func->format_money($value['gia']) ?> </p>
                                     <p class="text-align-center">HOTLINE: <?= $optsetting['hotline'] ?></p>
                                 </div>
                             </div>
                         </div>
                         <!-- php loop end -->
                     <?php } ?>
                 </div><!-- end carousel -->
             </div>
         <?php } ?>
     </div>
     <!-- xem thêm -->
     <div class="container xemthem_container">
         <div class="row">
             <div class="col-md-12 xemthem_btn">
                 <a href="san-pham" class="text-danger text-uppercase">Xem thêm <span><i class="fa fa-plus"></i></span></a>
             </div>
         </div>
     </div>
 </section>
 <!-- section đăng ký nhận tin -->
 <section id="dangkynhantin">
     <div class="container">
         <div class="row justify-content-center align-items-center">
             <div class="col-md-4 mt-4 mb-4">
                 <img class="img-fluid" src="../assets/images/dangkynhantin/dangkynhantin-title.svg" alt="">
                 <p class="text-light">Đăng ký nhận tin để nhân được thông tin sản phẩm và chương trình khuyến mãi nhanh nhất</p>
             </div>
             <div class="col-md-8">
                 <form>
                     <!-- email -->
                     <div class="row mb-3 mt-3">
                         <div class="col-md-9">
                             <input type="text" class="form-control" id="email" placeholder="Email:" name="email">
                         </div>
                     </div>
                     <!-- phone number -->
                     <div class="row mb-3 mt-3">
                         <div class="col-md-9 mb-3">
                             <input type="text" class="form-control" id="phonenumber" placeholder="Số điện thoại:" name="phonenumber">
                         </div>
                         <div class="col-md-3">
                             <button type="submit" class="btn btn-light text-danger text-uppercase">
                                 <img class="img-fluid" src="../assets/images/dangkynhantin/sent_font.svg" alt="send img">
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
 <!-- section vi sao chon chung toi -->
 <section id="visaochonchungtoi">
     <div class="container">
         <div class="mt-4 text-center">
             <h3 class="text-danger  text-uppercase ">Vì sao chọn chúng tôi</h3>
             <!-- ba hình thoi và đường kẻ ngang -->
             <div class="square-area">
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
                             <div class="image_container">
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
                             <div class="image_container">
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
                             <div class="image_container">
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
                             <div class="image_container">
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
                             <div class="image_container">
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
                             <div class="image_container">
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
 <section id="kienthuc-tintuc-video">
     <div class="container">
         <div class="row kienthuc-tintuc-video">
             <!-- kien thuc -->
             <div class="col-md-4 col-sm-12">
                 <div class="bottom_slash">
                     <h3 class="text-uppercase text-danger">kiến thức</h3>
                 </div>
                 <p>Chia sẽ kiến thức từ Toàn Thịnh Phát</p>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Uy tín chất lượng cao</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Giá cả cạnh tranh</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Hỗ trợ khách hàng 24/7</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
             </div>
             <!-- tin tuc -->
             <div class="col-md-4 col-sm-12">
                 <div class="bottom_slash">
                     <h3 class="text-uppercase text-danger">tin tức</h3>
                 </div>
                 <p>Cập nhật những tin tức mới từ Toàn Thịnh Phát</p>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Uy tín chất lượng cao</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Giá cả cạnh tranh</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
                 <div class="card">
                     <img class="card-img-top" src="../../assets/images/kienthuc-tintuc-video/hinhmau.png" alt="hinhmau">
                     <div class="card-body">
                         <h5 class="card-title">Hỗ trợ khách hàng 24/7</h5>
                         <p class="card-text text-justify">Chúng tôi luôn đặt uy tín lên hàng đầu, dịch vụ cho thuê xe du lịch Hoàng Thái đã trở thành đối tác uy tín trong khu vực</p>
                     </div>
                 </div>
             </div>
             <!-- video -->
             <div class="col-md-4 col-sm-12">
                 <div class="bottom_slash">
                     <h3 class="text-uppercase text-danger">videos</h3>
                 </div>
                 <p>Review và trải nghiệm sản phẩm</p>
                 <div class="card">
                     <!-- <div class="owl-carousel owl-theme auto_video">
                         <?php foreach ($video as $k => $v) { ?>
                             <a data-fancybox="video" class="tailvideo_item_owl" data-src="<?= $v['video'] ?>" data-name="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" style="background:url(https://img.youtube.com/vi/<?= $func->getYoutube($v['video']) ?>/hqdefault.jpg) no-repeat center; background-size:cover;">
                             </a>
                         <?php } ?>
                     </div> -->
                     <video controls class="video">
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
 <section id="doitacvathuonghieu">
     <div class="container-fluid">
         <div class="mt-4 text-center m-auto">
             <h3 class="text-danger text-uppercase">Đối tác và thương hiệu của chúng tôi</h3>
             <!-- ba hình thoi và đường kẻ ngang -->
             <div class="square-area">
                 <div class="rotated-square">
                     <div class="line"></div>
                 </div>
             </div>
         </div>
         <div class="row doitac">
             <!-- đối tác -->
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac1.png" alt="doitac1">
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac2.png" alt="doitac2">
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac3.png" alt="doitac3">
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac4.png" alt="doitac4">
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac5.png" alt="doitac5">
             <img class="img-fluid col-md-2 col-5" src="../assets/images/doitacvathuonghieucuachungtoi/doitac6.png" alt="doitac6">
         </div>
     </div>
 </section>