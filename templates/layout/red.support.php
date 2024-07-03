<style>
    :root {
        --white: #fff;
        --red: #E41204;
        --red10: rgba(255, 18, 8, 0.1);
        --red30: rgba(255, 18, 8, 0.3);
        --white50: rgba(255, 255, 255, 0.5)
    }

    .size-nav {
        position: relative;
        height: 350px;
    }

    /* thêm spacing cho size nav */
    .size-nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* thêm ảnh nền cho side-nav */
    .side-nav ul {
        position: fixed;
        right: 1%;
        bottom: 10%;
        /* thẻ ul đưa lên trên khi lăn chuột*/
        z-index: 1;
        background-color: var(--white50);
        display: inline;
    }

    /* thêm canh lề cho ul */
    .side-nav ul {
        height: 256px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        padding: 16px;
    }

    /* thêm kích thước mặc định li khi chưa đưa chuột vào nút */
    .side-nav ul li {
        position: relative;
        /* thẻ a đưa lên trên khi lăn chuột */
        z-index: 1;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background-image: url('../../assets/images/red_sp/bg_red_support.png');
        background-size: cover;
        background-color: var(--red30);
        cursor: pointer;
    }

    /* Thêm hình cho các li khác */
    .side-nav ul li:nth-child(2) {
        background-position: 0 288px;
    }

    .side-nav ul li:nth-child(3) {
        background-position: 0 192px;
    }

    .side-nav ul li:nth-child(4) {
        background-position: 0 96px;
    }

    /* thay đổi thuộc tính hover của thẻ li */
    .side-nav ul li:hover::before {
        content: '';
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
    }

    /* thẻ a đưa lên trên khi lăn chuột */
    .side-nav ul li:hover::before {
        z-index: 2;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #fff;
        background-image: url('../../assets/images/red_sp/bg_red_support.png');
        background-size: cover;
        transform: translate(-865%, 6%);
    }

    /* thay đổi hình của thẻ li khi hover */
    .side-nav ul li:nth-child(1):hover::before {
        background-position: 0 320px;
    }

    .side-nav ul li:nth-child(2):hover::before {
        background-position: 0 240px;
    }

    .side-nav ul li:nth-child(3):hover::before {
        background-position: 0 160px;
    }

    .side-nav ul li:nth-child(4):hover::before {
        background-position: 0 80px;
    }

    /* Định dạng thẻ a: ẩn thông tin */
    .side-nav ul li a {
        position: relative;
        /* đặt thẻ a ở dưới cùng để nhìn thấy logo */
        z-index: -1;
    }

    /* Định dạng thẻ a: spacing, canh lề tiêu đề */
    .side-nav ul li a {
        /* khóa thẻ a không hiển thị */
        display: none;
        justify-content: center;
        flex-direction: column;
        width: 400px;
        height: 53px;
        padding: 5px 0 5px 50px;
        align-items: start;
    }

    /* Định dạng thẻ a: font style tiêu đề chăm sóc kh */
    .side-nav ul li a {
        background-color: var(--red);
        color: var(--white) !important;
        text-align: left;
    }

    /* Định dạng thẻ a: bo góc 4 bên của thẻ a */
    .side-nav ul li:hover a {
        display: flex;
        /* bug line-height: không thể tìm thấy thẻ before hoặc after của thẻ a; */
        /* line-height: 0; */
        transform: translateX(-87%);
        border-radius: 27px;
        transition: transform 0.5s ease;
    }

    /* Thêm hoạt ảnh cho   */
    .side-nav ul li a::before {
        content: '';
        position: absolute;
        top: calc(100% - 27px);
        left: calc(100% - 200px);
        /* transform: translate(-50%, -50%); */
        height: 100%;
        width: 100%;
        background-color: var(--red30);
        border-radius: 27px;
        /* bật hoạt cảnh */
        animation: ripple 1s infinite ease-in-out;
    }

    /* thêm hoạt cảnh khi mới load trang cho thẻ li */
    /* Hiệu ứng động cho các vòng tròn */
    .side-nav ul li::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 100%;
        background-color: var(--red30);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        animation: ripple 2s infinite;
    }

    .side-nav h1,
    .side-nav p {
        margin: 0;
    }

    /* Định nghĩa hiệu ứng ripple */
    @keyframes ripple {
        0% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }

        100% {
            transform: translate(-50%, -50%) scale(1.5);
            opacity: 0;
        }
    }
</style>

<nav class="side-nav">
    <ul>
        <li>
            <a>
                <h6>Liên hệ</h6>
                <p>Bạn cần liên hệ đặt hàng phải không?</p>
            </a>
        </li>
        <li>
            <a>
                <h6>Đăng ký</h6>
                <p>Bạn hãy đăng ký làm thành viên nhé?</p>
            </a>
        </li>
        <li>
            <a>
                <h6>Lên đầu trang</h6>
                <p>Bạn muốn quay về trang chủ không?</p>
            </a>
        </li>
        <li>
            <a>
                <h6>Hỗ trợ</h6>
                <p>Bạn cần tư vấn gì?</p>
            </a>
        </li>
    </ul>
</nav>