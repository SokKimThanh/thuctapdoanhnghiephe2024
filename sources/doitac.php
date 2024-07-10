<?php
if (!defined('SOURCES')) die("Error");
// Danh sach doi tac
$dsDoiTac = $d->rawQuery("select photo, link from #_photo where type = ? and hienthi > 0 order by stt,id desc", array('doitac'));

/* breadCrumbs */
if (isset($title_crumb) && $title_crumb != '') $breadcr->setBreadCrumbs($com, $title_crumb);
$breadcrumbs = $breadcr->getBreadCrumbs();
