<style>
	.title-cart {
		font-size: 1.1rem;
		background: var(--red30);
		color: black;
		padding: 8px 20px;
		border-radius: 4px;
		margin-bottom: 15px;
	}

	.btn-quantity {
		padding: 1rem;
		width: 30px;
		height: 30px;
		display: -webkit-flex;
		justify-content: center;
		align-items: center;
		border-radius: 4px;
	}

	.input-quantity,
	.btn-quantity {
		border: 1px solid #00000055;
	}

	.input-quantity {
		width: 3rem;
		text-align: center;
	}


	#cart-mobile {
		display: none;
	}

	@media screen and (max-width: 768px) {
		#cart-desktop {
			display: none;
		}

		#cart-mobile {
			display: block;
		}

	}
</style>

<section>
	<div class="container">
		<div class="mt-4 text-center">
			<!-- 2. Chi tiết từng phần: -->
			<!-- a. Hiển thị tiêu đề:-->
			<h3 class="text-danger  text-uppercase"><?= (@$title_cat != '') ? $title_cat : @$title_crumb ?></h3>
			<!-- ba hình thoi và đường kẻ ngang -->
			<div class="square-area">
				<div class="rotated-square">
					<div class="line"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<form class="form-cart validation-cart" novalidate method="post" action="" enctype="multipart/form-data">
				<?php if (isset($_SESSION['cart']) && count($_SESSION['cart'])) { ?>
					<div class="row border mb-3">
						<p class="title-cart roboto-slab"><?= giohangcuatoi ?></p>
						<div id="cart-desktop" class="col-md-12">
							<table class="table table-hover">
								<thead class="thead-primary">
									<tr>
										<th>
											<p><?= hinhanh ?></p>
										</th>
										<th>
											<p><?= tensanpham ?></p>
										</th>
										<th>
											<p><?= soluong ?></p>
										</th>
										<th>
											<p><?= thanhtien ?></p>
										</th>
										<th>
											<p>Thao tác</p>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $max = count($_SESSION['cart']);
									for ($i = 0; $i < $max; $i++) {
										$pid = $_SESSION['cart'][$i]['productid'];
										$quantity = $_SESSION['cart'][$i]['qty'];
										$mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
										$size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
										$code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
										$proinfo = $cart->get_product_info($pid);
										$pro_price = $proinfo['gia'];
										$pro_price_new = $proinfo['giamoi'];
										$pro_price_qty = $pro_price * $quantity;
										$pro_price_new_qty = $pro_price_new * $quantity; ?>
										<tr>
											<td>
												<a href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
												<a data-code="<?= $code ?>">
													<i class="fa fa-times-circle"></i>
													<span><?= xoa ?></span>
												</a>
											</td>
											<td>
												<h6><a href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a></h6>
												<div>
													<?php if ($mau) {
														$maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
														<p>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></p>
													<?php } ?>
													<?php if ($size) {
														$sizedetail = $d->rawQueryOne("select ten$lang from #_product_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
														<p>Size: <strong><?= $sizedetail['ten' . $lang] ?></strong></p>
													<?php } ?>
												</div>
											</td>
											<td class="quantity-procart">
												<div class="price-procart price-procart-rp">
													<?php if ($proinfo['giamoi']) { ?>
														<p class="price-new-cart load-price-new-<?= $code ?>">
															<?= $func->format_money($pro_price_new_qty) ?>
														</p>
														<p class="price-old-cart load-price-<?= $code ?>">
															<?= $func->format_money($pro_price_qty) ?>
														</p>
													<?php } else { ?>
														<p class="price-new-cart load-price-<?= $code ?>">
															<?= $func->format_money($pro_price_qty) ?>
														</p>
													<?php } ?>
												</div>
												<div class="input-group">
													<span class="btn btn-quantity counter-procart">-</span>
													<input type="number" class="input-quantity" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
													<span class="btn btn-quantity counter-procart">+</span>
												</div>
											</td>

											<td class="price-procart">
												<?php if ($proinfo['giamoi']) { ?>
													<p class="price-new-cart load-price-new-<?= $code ?>">
														<?= $func->format_money($pro_price_new_qty) ?>
													</p>
													<p class="price-old-cart load-price-<?= $code ?>">
														<?= $func->format_money($pro_price_qty) ?>
													</p>
												<?php } else { ?>
													<p class="price-new-cart load-price-<?= $code ?>">
														<?= $func->format_money($pro_price_qty) ?>
													</p>
												<?php } ?>
											</td>
											<td>
												<div class="pic-procart pic-procart-rp">
													<!-- <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a> -->
													<a class="del-procart text-decoration-none" data-code="<?= $code ?>">
														<i class="fa fa-times-circle"></i>
														<span><?= xoa ?></span>
													</a>
												</div>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div id="cart-mobile" class="col-md-12">
							<?php $max = count($_SESSION['cart']);
							for ($i = 0; $i < $max; $i++) {
								$pid = $_SESSION['cart'][$i]['productid'];
								$quantity = $_SESSION['cart'][$i]['qty'];
								$mau = ($_SESSION['cart'][$i]['mau']) ? $_SESSION['cart'][$i]['mau'] : 0;
								$size = ($_SESSION['cart'][$i]['size']) ? $_SESSION['cart'][$i]['size'] : 0;
								$code = ($_SESSION['cart'][$i]['code']) ? $_SESSION['cart'][$i]['code'] : '';
								$proinfo = $cart->get_product_info($pid);
								$pro_price = $proinfo['gia'];
								$pro_price_new = $proinfo['giamoi'];
								$pro_price_qty = $pro_price * $quantity;
								$pro_price_new_qty = $pro_price_new * $quantity; ?>
								<div class="row">
									<div class="col-6 d-flex justify-content-center align-items-center">
										<a href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a>
										<!-- <a data-code="<?= $code ?>">
											<i class="fa fa-times-circle"></i>
											<span><?= xoa ?></span>
										</a> -->
									</div>
									<div class="col-6">
										<td>
											<h6><a href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><?= $proinfo['ten' . $lang] ?></a></h6>
											<div>
												<?php if ($mau) {
													$maudetail = $d->rawQueryOne("select ten$lang from #_product_mau where type = ? and id = ? limit 0,1", array($proinfo['type'], $mau)); ?>
													<p>Màu: <strong><?= $maudetail['ten' . $lang] ?></strong></p>
												<?php } ?>
												<?php if ($size) {
													$sizedetail = $d->rawQueryOne("select ten$lang from #_product_size where type = ? and id = ? limit 0,1", array($proinfo['type'], $size)); ?>
													<p>Size: <strong><?= $sizedetail['ten' . $lang] ?></strong></p>
												<?php } ?>
											</div>
										</td>
										<td class="quantity-procart">
											<div class="price-procart price-procart-rp">
												<?php if ($proinfo['giamoi']) { ?>
													<p class="price-new-cart load-price-new-<?= $code ?>">
														<?= $func->format_money($pro_price_new_qty) ?>
													</p>
													<p class="price-old-cart load-price-<?= $code ?>">
														<?= $func->format_money($pro_price_qty) ?>
													</p>
												<?php } else { ?>
													<p class="price-new-cart load-price-<?= $code ?>">
														<?= $func->format_money($pro_price_qty) ?>
													</p>
												<?php } ?>
											</div>
											<div class="input-group">
												<span class="btn btn-quantity counter-procart">-</span>
												<input type="number" class="input-quantity" min="1" value="<?= $quantity ?>" data-pid="<?= $pid ?>" data-code="<?= $code ?>" />
												<span class="btn btn-quantity counter-procart">+</span>
											</div>
										</td>

										<td class="price-procart">
											<?php if ($proinfo['giamoi']) { ?>
												<p class="price-new-cart load-price-new-<?= $code ?>">
													<?= $func->format_money($pro_price_new_qty) ?>
												</p>
												<p class="price-old-cart load-price-<?= $code ?>">
													<?= $func->format_money($pro_price_qty) ?>
												</p>
											<?php } else { ?>
												<p class="price-new-cart load-price-<?= $code ?>">
													<?= $func->format_money($pro_price_qty) ?>
												</p>
											<?php } ?>
										</td>
										<td>
											<div class="pic-procart pic-procart-rp">
												<!-- <a class="text-decoration-none" href="<?= $proinfo[$sluglang] ?>" target="_blank" title="<?= $proinfo['ten' . $lang] ?>"><img onerror="this.src='<?= THUMBS ?>/85x85x2/assets/images/noimage.png';" src="<?= THUMBS ?>/85x85x1/<?= UPLOAD_PRODUCT_L . $proinfo['photo'] ?>" alt="<?= $proinfo['ten' . $lang] ?>"></a> -->
												<a class="del-procart text-decoration-none" data-code="<?= $code ?>">
													<i class="fa fa-times-circle"></i>
													<span><?= xoa ?></span>
												</a>
											</div>
										</td>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-md-12">
							<?php if ($config['order']['ship']) { ?>
								<div class="total-procart d-flex align-items-center justify-content-between d-none">
									<p><?= tamtinh ?>:</p>
									<p class="total-price load-price-temp"><?= $func->format_money($cart->get_order_total()) ?></p>
								</div>
							<?php } ?>
							<!-- <?php if ($config['order']['ship']) { ?>
								<div class="total-procart d-flex align-items-center justify-content-between">
									<p><?= phivanchuyen ?>:</p>
									<p class="total-price load-price-ship">0đ</p>
								</div>
							<?php } ?> -->
							<div class="total-procart d-flex align-items-center justify-content-between">
								<p><?= tongtien ?>:</p>
								<p class="total-price load-price-total"><?= $func->format_money($cart->get_order_total()) ?></p>
							</div>
							<input type="hidden" class="price-temp" name="price-temp" value="<?= $cart->get_order_total() ?>">
							<input type="hidden" class="price-ship" name="price-ship">
							<input type="hidden" class="price-total" name="price-total" value="<?= $cart->get_order_total() ?>">
						</div>
					</div>
					<!-- <div class="row border mb-3">
						<p class="title-cart roboto-slab"><?= hinhthucthanhtoan ?></p>
						<div class="col-md-12">
							<div class="information-cart">
								<?php foreach ($httt as $key => $value) { ?>
									<div class="payments-cart custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="payments-<?= $value['id'] ?>" name="payments" value="<?= $value['id'] ?>" required>
										<label class="payments-label custom-control-label" for="payments-<?= $value['id'] ?>" data-payments="<?= $value['id'] ?>"><?= $value['ten' . $lang] ?></label>
										<div class="payments-info payments-info-<?= $value['id'] ?> transition"><?= str_replace("\n", "<br>", $value['mota' . $lang]) ?></div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div> -->
					<div class="row border mb-3">
						<p class="title-cart roboto-slab"><?= thongtingiaohang ?>:</p>
						<div class="col-md-12">
							<form>
								<div class="row mb-2">
									<div class="col-md-6 col-6">
										<input type="text" class="form-control" id="ten" name="ten" placeholder="<?= hoten ?>" required />
										<div class="invalid-feedback"><?= vuilongnhaphoten ?></div>
									</div>
									<div class="col-md-6 col-6">
										<input type="number" class="form-control" id="dienthoai" name="dienthoai" placeholder="<?= sodienthoai ?>" required />
										<div class="invalid-feedback"><?= vuilongnhapsodienthoai ?></div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-12">
										<input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
										<div class="invalid-feedback"><?= vuilongnhapdiachiemail ?></div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-4 col-4">
										<select class="select-city-cart custom-select" required id="city" name="city">
											<option value=""><?= tinhthanh ?></option>
											<?php for ($i = 0; $i < count($city); $i++) { ?>
												<option value="<?= $city[$i]['id'] ?>"><?= $city[$i]['ten'] ?></option>
											<?php } ?>
										</select>
										<div class="invalid-feedback"><?= vuilongchontinhthanh ?></div>
									</div>
									<div class="col-md-4 col-4">
										<select class="select-district-cart select-district custom-select" required id="district" name="district">
											<option value=""><?= quanhuyen ?></option>
										</select>
										<div class="invalid-feedback"><?= vuilongchonquanhuyen ?></div>
									</div>
									<div class="col-md-4 col-4">
										<select class="select-wards-cart select-wards custom-select" required id="wards" name="wards">
											<option value=""><?= phuongxa ?></option>
										</select>
										<div class="invalid-feedback"><?= vuilongchonphuongxa ?></div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-12">
										<input type="text" class="form-control" id="diachi" name="diachi" placeholder="<?= diachi ?>" required />
										<div class="invalid-feedback"><?= vuilongnhapdiachi ?></div>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-12">
										<textarea class="form-control" id="yeucaukhac" name="yeucaukhac" placeholder="<?= yeucaukhac ?>" /></textarea>
									</div>
								</div>
								<div class="row mb-2">
									<div class="col-md-12">
										<input type="submit" class="btn btn-danger w-100 roboto-slab" name="thanhtoan" value="<?= thanhtoan ?>" disabled>
									</div>
								</div>
							</form>
						</div>
					</div>
				<?php } else { ?>
					<a href="" class="empty-cart text-decoration-none">
						<i class="fa fa-cart-arrow-down"></i>
						<p><?= khongtontaisanphamtronggiohang ?></p>
						<span><?= vetrangchu ?></span>
					</a>
				<?php } ?>
			</form>
		</div>
	</div>
</section>