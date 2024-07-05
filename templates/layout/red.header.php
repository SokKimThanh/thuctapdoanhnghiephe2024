     <!-- section Sản phẩm -->
     <!-- |- sản phẩm mới -->
     <!-- |- danh mục cấp 1 - sản phẩm -->
     <section id="header">
         <div class="container">
             <!-- logo; search; phone; -->
             <div class="row align-items-center text-center">
                 <!-- logo -->
                 <div class="col-md-3">
                     <img onerror="this.src='<?= THUMBS ?>/0x200x1/assets/images/noimage.png';" src="<?= THUMBS ?>/0x200x1/<?= UPLOAD_PHOTO_L . $logo['photo'] ?>" />
                 </div>
                 <!-- search -->
                 <div class="col-md-6">
                     <div>
                         <div class="col-md-8">
                             <form method="get">
                                 <div class="input-group mb-3">
                                     <input type="text" class="form-control" id="keyword2" name="keyword" placeholder="Tìm kiếm sản phẩm" onkeypress="doEnter(event,'keyword2');">
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
                     <nav class="danhmuc">
                         <div class="danhmuc-header roboto-slab container-fluid d-flex align-items-center">
                             <button class="btn btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="true" aria-label="Toggle navigation">
                                 <span class="fa-1x text-white"><i class="fa fa-bars"></i></span>
                             </button>
                             <h6 class="text-uppercase">Danh mục sản phẩm</h6>
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
                 <!-- menu; slider, hinh -->
                 <div class="col-md-9">
                     <!-- menu -->
                     <div class="row mb-3">
                         <div class="col-md-12">
                             <?php include TEMPLATE . LAYOUT . "red.menu.php"; ?>
                         </div>
                     </div>
                     <!-- slider -->
                     <div class="row">
                         <div class="col-md-8">
                             <?php include TEMPLATE . LAYOUT . "red.slide.php"; ?>
                         </div>
                         <div class="col-md-4 text-align-center">
                             <ul>
                                 <li>
                                     <a>
                                         <img class="img-fluid" src="../assets/images/bannersanpham/banner4.png" alt="banner-4">
                                     </a>
                                 </li>
                                 <li>
                                     <a>
                                         <img class="img-fluid" src="../assets/images/bannersanpham/banner5.png" alt="banner-5">
                                     </a>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <section id="banner">
         <div class="container">
             <!-- banner -->
             <div class="row">
                 <div class="col-md-4 mt-3">
                     <img class="img-fluid" src="../assets/images/bannersanpham/banner1.png" alt="banner-1">
                 </div>
                 <div class="col-md-4 mt-3">
                     <img class="img-fluid" src="../assets/images/bannersanpham/banner2.png" alt="banner-2">
                 </div>
                 <div class="col-md-4 mt-3">
                     <img class="img-fluid" src="../assets/images/bannersanpham/banner3.png" alt="banner-3">
                 </div>
             </div>
         </div>
     </section>