<!-- Basehref -->
<base href="<?= $config_base ?>" />

<!-- UTF-8 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- Title, Keywords, Description -->
<title><?= $seo->getSeo('title') ?></title>
<meta name="keywords" content="<?= $seo->getSeo('keywords') ?>" />
<meta name="description" content="<?= $seo->getSeo('description') ?>" />

<!-- Robots -->
<meta name="robots" content="index,follow" />

<!-- Favicon -->
<link href="<?= THUMBS ?>/48x48x3/<?= UPLOAD_PHOTO_L . $favicon['photo'] ?>" rel="shortcut icon" type="image/x-icon" />

<!-- Webmaster Tool -->
<?= htmlspecialchars_decode($setting['mastertool']) ?>

<!-- GEO -->
<meta name="geo.region" content="VN" />
<meta name="geo.placename" content="Hồ Chí Minh" />
<meta name="geo.position" content="10.823099;106.629664" />
<meta name="ICBM" content="10.823099, 106.629664" />

<!-- Author - Copyright -->
<meta name='revisit-after' content='1 days' />
<meta name="author" content="<?= $setting['ten' . $lang] ?>" />
<meta name="copyright" content="<?= $setting['ten' . $lang] . " - [" . $optsetting['email'] . "]" ?>" />

<!-- Facebook -->
<meta property="og:type" content="<?= $seo->getSeo('type') ?>" />
<meta property="og:site_name" content="<?= $setting['ten' . $lang] ?>" />
<meta property="og:title" content="<?= $seo->getSeo('title') ?>" />
<meta property="og:description" content="<?= $seo->getSeo('description') ?>" />
<meta property="og:url" content="<?= $seo->getSeo('url') ?>" />
<meta property="og:image" content="<?= $seo->getSeo('photo') ?>" />
<meta property="og:image:alt" content="<?= $seo->getSeo('title') ?>" />
<meta property="og:image:type" content="<?= $seo->getSeo('photo:type') ?>" />
<meta property="og:image:width" content="<?= $seo->getSeo('photo:width') ?>" />
<meta property="og:image:height" content="<?= $seo->getSeo('photo:height') ?>" />

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="<?= $optsetting['email'] ?>" />
<meta name="twitter:creator" content="<?= $setting['ten' . $lang] ?>" />
<meta property="og:url" content="<?= $seo->getSeo('url') ?>" />
<meta property="og:title" content="<?= $seo->getSeo('title') ?>" />
<meta property="og:description" content="<?= $seo->getSeo('description') ?>" />
<meta property="og:image" content="<?= $seo->getSeo('photo') ?>" />

<!-- Canonical -->
<link rel="canonical" href="<?= $func->getCurrentPageURL() ?>" />

<!-- Chống đổi màu trên IOS -->
<meta name="format-detection" content="telephone=no">

<!-- Viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<!-- <meta name="viewport" content="width=1280"> -->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap" rel="stylesheet">

<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=647d994a8b79010019949b1a&product=inline-share-buttons&source=platform" async="async"></script>

<!-- Thực tập page toàn thịnh phát 05/07/2024 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>