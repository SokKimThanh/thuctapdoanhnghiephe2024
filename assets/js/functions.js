/**
 * Đoạn mã bạn cung cấp chứa các hàm JavaScript sử dụng jQuery để thực hiện 
 * nhiều chức năng khác nhau trong một trang web thương mại điện tử. 
 * Dưới đây là phân tích và tổng hợp chi tiết về từng hàm:

*/
// 1. Hàm modalNotify(text): Hiển thị thông báo thông qua modal popup.
// Mục đích: Hiển thị một thông báo trong một modal.
// Cách hoạt động: Cập nhật nội dung của .modal-body trong modal có ID là #popup-notify với văn bản text, sau đó hiển thị modal này.
function modalNotify(text) {
    $("#popup-notify").find(".modal-body").html(text);
    $('#popup-notify').modal('show');
}
// 2. ValidationFormSelf
// Mục đích: Thực hiện kiểm tra hợp lệ cho các form với class ele.
// Cách hoạt động:
// Kích hoạt các input submit trong form với class ele.
// Gắn sự kiện submit vào các form để kiểm tra tính hợp lệ khi người dùng gửi form.
// Nếu form không hợp lệ, ngăn việc gửi form và hiển thị thông báo lỗi.
function ValidationFormSelf(ele = '') {
    if (ele) {
        $("." + ele).find("input[type=submit]").removeAttr("disabled");
        var forms = document.getElementsByClassName(ele);
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }
}
// 3. loadPagingAjax
// Mục đích: Tải nội dung phân trang bằng AJAX.
// Cách hoạt động:
// Gửi yêu cầu GET đến url với các tham số eShow, id, và id_post.
// Cập nhật nội dung của phần tử eShow với kết quả trả về từ máy chủ.
function loadPagingAjax(url = '', eShow = '', id = '', id_post = 0) {
    if ($(eShow).length && url) {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                eShow: eShow,
                id: id,
                id_post: id_post
            },
            success: function (result) {
                $(eShow).html(result);
                /*if(id!=''){
                    $('html, body').animate({
                        scrollTop: $(id+id_post).offset().top
                    }, 1000);
                }*/
            }
        });
    }
}


// 4. doEnter và onSearch
// Mục đích: Thực hiện tìm kiếm khi người dùng nhấn phím Enter.
// Cách hoạt động:
// doEnter: Khi người dùng nhấn phím Enter (keyCode 13), gọi hàm onSearch.
function doEnter(event, obj) {

    if (event.keyCode == 13 || event.which == 13) onSearch(obj);
}

// onSearch: Lấy giá trị từ input có ID obj. Nếu từ khóa trống, hiển thị thông báo.
//  Nếu không, điều hướng đến trang tìm kiếm với từ khóa đã mã hóa.
function onSearch(obj) {
    var keyword = $("#" + obj).val();

    if (keyword == '') {
        modalNotify(LANG['no_keywords']);
        return false;
    } else {
        location.href = "tim-kiem?keyword=" + encodeURI(keyword);
        loadPage(document.location);
    }
}
// 5. goToByScroll
// Mục đích: Cuộn trang đến một phần tử cụ thể.
// Cách hoạt động:
// Lấy chiều cao của menu nếu có.
// Cuộn trang đến vị trí phần tử với ID id, trừ đi chiều cao của menu.
function goToByScroll(id) {
    var offsetMenu = 0;
    id = id.replace("#", "");
    if ($(".menu").length) offsetMenu = $(".menu").height();
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top - (offsetMenu * 2)
    }, 'slow');
}
// 6. update_cart
// Mục đích: Cập nhật giỏ hàng.
// Cách hoạt động:
// Gửi yêu cầu POST đến ajax/ajax_cart.php với thông tin về sản phẩm.
// Cập nhật các phần tử trên trang với thông tin giỏ hàng mới sau khi nhận được phản hồi từ máy chủ.
function update_cart(id = 0, code = '', quantity = 1) {
    if (id) {
        var ship = $(".price-ship").val();

        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: { cmd: 'update-cart', id: id, code: code, quantity: quantity, ship: ship },
            success: function (result) {
                if (result) {
                    $('.load-price-' + code).html(result.gia);
                    $('.load-price-new-' + code).html(result.giamoi);
                    $('.price-temp').val(result.temp);
                    $('.load-price-temp').html(result.tempText);
                    $('.price-total').val(result.total);
                    $('.load-price-total').html(result.totalText);
                }
            }
        });
    }
}
// 7. load_district và load_wards
// Mục đích: Tải danh sách quận/huyện và phường/xã dựa trên ID thành phố hoặc quận/huyện.
// Cách hoạt động:
// load_district: Gửi yêu cầu POST đến ajax/ajax_district.php với ID thành phố, 
// cập nhật danh sách quận/huyện và thiết lập lại danh sách phường/xã.
function load_district(id = 0) {
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_district.php',
        data: { id_city: id },
        success: function (result) {
            $(".select-district").html(result);
            $(".select-wards").html('<option value="">' + LANG['wards'] + '</option>');
        }
    });
}
// load_wards: Gửi yêu cầu POST đến ajax/ajax_wards.php với ID quận/huyện, 
// cập nhật danh sách phường/xã.
function load_wards(id = 0) {
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_wards.php',
        data: { id_district: id },
        success: function (result) {
            $(".select-wards").html(result);
        }
    });
}
// 8. load_ship
// Mục đích: Tính và cập nhật phí vận chuyển.
// Cách hoạt động:
// Gửi yêu cầu POST đến ajax/ajax_cart.php với lệnh ship-cart và ID sản phẩm.
// Cập nhật thông tin phí vận chuyển và tổng tiền trên trang với dữ liệu trả về từ máy chủ.
function load_ship(id = 0) {
    if (SHIP_CART) {
        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: { cmd: 'ship-cart', id: id },
            success: function (result) {
                if (result) {
                    $('.load-price-ship').html(result.shipText);
                    $('.load-price-total').html(result.totalText);
                    $('.price-ship').val(result.ship);
                    $('.price-total').val(result.total);
                }
            }
        });
    }
}
/**
 * Tổng kết
 * Đoạn mã cung cấp các hàm JavaScript để xử lý nhiều chức năng liên quan đến
 * hiển thị thông báo, kiểm tra tính hợp lệ của form, tải nội dung phân trang, 
 * tìm kiếm, cuộn trang, cập nhật giỏ hàng, và tải dữ liệu địa lý (quận/huyện, phường/xã)
 * cũng như phí vận chuyển. Các hàm này sử dụng jQuery để thực hiện các tác vụ AJAX 
 * và thao tác trên DOM.
 */