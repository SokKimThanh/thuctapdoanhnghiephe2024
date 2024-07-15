     <!-- section Sản phẩm -->
     <!-- |- sản phẩm mới -->
     <!-- |- danh mục cấp 1 - sản phẩm -->
     <section id="header">
         <div class="container">
             <!-- logo; search; phone; -->
             <div id="logosearchphone_container" class="row align-items-center text-center">
                 <!-- logo -->
                 <div class="col-md-3">
                     <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" />
                 </div>
                 <!-- search -->
                 <div class="col-md-6">
                     <div class="input-group mb-3">
                         <input type="text" class="form-control search-input" id="keyword" name="keyword" value="<?= (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keyword','<?= $linkMan ?>')">
                         <button type="submit" class="btn btn-danger" onclick="onSearch('keyword','<?= $linkMan ?>')">
                             <i class="far fa-search"></i>
                         </button>
                     </div>
                 </div>
                 <!-- phone -->
                 <div class="col-md-3">
                     <p class="phone" style="font-size: xx-large;"><strong><span class="fa-1x"><i class="fa fa-phone-alt"></i></span></strong> <?= $optsetting['dienthoai'] ?></p>
                 </div>
             </div>
             <!-- danh muc; menu -->
             <div class="row">
                 <!-- Lập trình ẩn hiện khối div menu - slider - hinh nếu không phải là trang chủ -->
                 <?php if ($source == 'index') { ?>
                     <!-- danh muc -->
                     <div class="col-md-3 pl-0">
                         <nav class="danhmuc">
                             <div class="danhmuc-header roboto-slab container-fluid d-flex align-items-center">
                                 <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                                     <span class="fa-1x text-white"><i class="fa fa-bars"></i></span>
                                 </button>
                                 <h6 class="danhmuc-title">Danh mục sản phẩm</h6>
                             </div>
                             <div class="collapse show" id="navbarToggleExternalContent">
                                 <ul class="danhmuc-body">
                                     <?php foreach ($danhmuc_list as $key => $v) { ?>
                                         <li>
                                             <a href="<?= $v['tenkhongdauvi'] ?>">
                                                 <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/30x30x2/assets/images/noimage.png';" src="<?= THUMBS ?>/30x30x2/<?= UPLOAD_PRODUCT_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                                                 <span><?= $v['ten' . $lang] ?></span>
                                             </a>
                                         </li>
                                     <?php } ?>
                                 </ul>
                             </div>
                         </nav>
                     </div>
                 <?php    } ?>

                 <!-- menu; slider, hinh -->
                 <div class="<?= $colMenu ?> p-0">
                     <!-- menu -->
                     <div class="row mb-3">
                         <div class="col-md-12">
                             <?php include TEMPLATE . LAYOUT . "red.menu.php"; ?>
                         </div>
                     </div>
                     <!-- Lập trình cho khối div ẩn đi khi không phải trang index  -->
                     <?php if ($source == 'index') { ?>
                         <!-- slider -->
                         <div id="list-image-gallery" class="row">
                             <div class="col-md-8">
                                 <?php include TEMPLATE . LAYOUT . "red.slide.php"; ?>
                             </div>
                             <!-- lập trình nguồn dữ liệu động là banner-sanpham-right -->
                             <div class="col-md-4 gallery-container">
                                 <ul class="list-image-gallery gallery">
                                     <?php foreach ($dsSanPhamBannerRight as $key => $v) {   ?>
                                         <li>
                                             <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/419x196x1/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                                         </li>
                                     <?php } ?>
                                 </ul>
                             </div>
                         </div>
                     <?php    } ?>
                 </div>

             </div>
         </div>
     </section>
     <?php if ($source == 'index') { ?>
         <section id="banner">
             <div class="container">
                 <!-- banner -->
                 <div id="banner-desktop" class="row d-flex justify-content-between align-items-center">
                     <?php foreach ($dsSanPhamBanner as $key => $v) {   ?>
                         <img class="img-fluid p-0" onerror="this.src='<?= THUMBS ?>/419x196x1/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                     <?php } ?>
                 </div>
                 <!-- Thêm banner mobile khi hiển thị mobile -->
                 <div id="banner-mobile" class="owl-carousel owl-theme auto_slider">
                     <?php foreach ($dsSanPhamBanner as $key => $v) {   ?>
                         <img class="img-fluid" onerror="this.src='<?= THUMBS ?>/419x196x1/assets/images/noimage.png';" src="<?= UPLOAD_PHOTO_L . $v['photo'] ?>" alt="<?= $v['ten' . $lang] ?>" />
                     <?php } ?>
                 </div>
             </div>
         </section>
     <?php } ?>