     <!-- section footer -->
     <!-- |- row toan thinh phat -->
     <!-- |- row địa chỉ  - fanpage - maps -->
     <!-- |- row bản quyền - số lượng truy cập -->
     <footer>
         <!-- FOOTER LOGO TOAN THINH PHAT -->
         <div class="footer-logo">
             <div class="container">
                 <!-- logo toan thinh phat -->
                 <div class="row mb-3 mt-3">
                     <div class="col-md-8 me-0">
                         <div class="row align-items-center text-align-center">
                             <div class="col-md-2 me-0">
                                 <img src="../assets/images/doitacvathuonghieucuachungtoi/logoToanThinhPhat.svg" alt="logo" class="img-fluid logo logoTTP">
                             </div>
                             <div class="col-md-10 me-0">
                                 <img src="../assets/images/doitacvathuonghieucuachungtoi/fontToanThinhPhat.svg" alt="logo" class="img-fluid">
                                 <p class="text-justify">Toàn Thịnh Phát là công ty hoạt động chủ yếu trong lĩnh vực công nghiệp và dân dụng. Chúng tôi vinh dự trở thành đại diện phân phối các loại các thiết bị công nghiệp uy tín và chất lượng hàng đầu.</p>
                             </div>
                         </div>
                     </div>
                     <!-- logo thuong mai dien tu -->
                     <div class="col-md-4">
                         <ul class="p-0 d-flex justify-content-around align-items-center">
                             <li><a><img src="../assets/images/doitacvathuonghieucuachungtoi/shopee.png" alt="shopee" class="img-fluid logo"></a></li>
                             <li><a><img src="../assets/images/doitacvathuonghieucuachungtoi/lazada.png" alt="lazada" class="img-fluid logo"></a></li>
                             <li><a><img src="../assets/images/doitacvathuonghieucuachungtoi/tiki.png" alt="tiki" class="img-fluid logo"></a></li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
         <!-- FOOTER INFO TOAN THINH PHAT -->
         <div class="footer-info">
             <div class="container text-light">
                 <div class="row mb-3 mt-3">
                     <div class="col-md-6 col-sm-12">
                         <ul>
                             <li><?= $optsetting['diachi'] ?></li>
                             <li>Hotline: <?= $optsetting['hotline'] ?></li>
                             <li>Email: <?= $optsetting['email'] ?></li>
                         </ul>
                         <!-- logo mang xa hoi-->
                         <div class="dsLogoMXH">
                             <!-- logo mang xa hoi -->
                             <?php foreach ($social1 as $v) { ?>
                                 <a href="<?= $v['link'] ?>" class="ftmxh" target="_blank" title="<?= $v['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/0x30x2/<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" title="<?= $v['ten' . $lang] ?>" /></a>
                             <?php } ?>
                         </div>

                     </div>
                     <div class="col-md-3 col-sm-12">
                         <h4 class="roboto-slab text-uppercase mb-3">FanPage</h4>
                         <img class="img-fluid" src="../assets/images/footerTTP/fanpage.png" alt="fanpage">
                         <!-- <iframe src="https://www.facebook.com/plugins/page.php?href=<?= $optsetting['fanpage'] ?>&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="100%" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe> -->
                     </div>
                     <div class="col-md-3 col-sm-12">
                         <h4 class="roboto-slab text-uppercase mb-3">MAPS</h4>
                         <img class="img-fluid" src="../assets/images/footerTTP/map.png" alt="fanpage">
                     </div>
                 </div>
                 <div class="row mb-2">
                     <div class="col-md-8 col-sm-12">
                         <p><?= $optsetting['copyright'] ?></p>
                     </div>
                     <div class="col-md-4 col-sm-12">
                         <!-- truy cap luot xem -->
                         <p><span class="pl-1 pr-1">Online: <?= $online ?></span> <span class="border-left pl-1 pr-1">Hôm nay: <?= $counter['today'] ?></span> <span class="border-left pl-1 pr-1">Tổng truy cập: <?= $counter['total'] ?></span></p>
                     </div>
                 </div>
             </div>
         </div>
     </footer>