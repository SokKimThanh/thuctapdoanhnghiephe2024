 <!DOCTYPE html>
 <html lang="<?= $config['website']['lang-doc'] ?>">


 <head>
     <?php include TEMPLATE . LAYOUT . "head.php"; ?>
     <?php include TEMPLATE . LAYOUT . "css.php"; ?>
 </head>

 <body>
     <?php
        include TEMPLATE . LAYOUT . "red.seo.php";
        include TEMPLATE . LAYOUT . "red.header.php";
        // Nếu không phải là index thì hiển thị breadcrumb và trang con
        if ($source != 'index') {
            include TEMPLATE . LAYOUT . "breadcrumb.php";
            include TEMPLATE . $template . "_tpl.php";
        } else {
            include TEMPLATE . LAYOUT . "red.body.php";
        }

        include TEMPLATE . LAYOUT . "red.footer.php";
         
        include TEMPLATE . LAYOUT . "red.support.php";

        include TEMPLATE . LAYOUT . "modal.php"; //(shopping modal)
        
        include TEMPLATE . LAYOUT . "red.js.php";
        ?>
 </body>

 </html>