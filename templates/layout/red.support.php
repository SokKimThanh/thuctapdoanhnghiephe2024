 <style>
     /* Định vị và căn chỉnh phần tử #red_sp */
     #red_sp {
         position: fixed;
         right: 0;
         margin-right: 16px;
         bottom: 0;
         margin-bottom: 16px;
     }

     /* Định dạng chung cho các vòng tròn */
     .circle,
     .circle1,
     .circle2,
     .circle3 {
         position: relative;
         width: 60px;
         height: 60px;
         background-color: #E41204;
         border-radius: 50%;
         animation: pulse 2s infinite;
         transform-origin: right center;
         /* Thiết lập gốc của phép biến đổi */
     }

     /* Hiệu ứng động cho các vòng tròn */
     .circle::before,
     .circle::after,
     .circle1::before,
     .circle1::after,
     .circle2::before,
     .circle2::after,
     .circle3::before,
     .circle3::after {
         content: "";
         position: absolute;
         top: 50%;
         left: 50%;
         width: 100%;
         height: 100%;
         background-color: #E41204;
         border-radius: 50%;
         transform: translate(-50%, -50%);
         animation: ripple 2s infinite;
         opacity: 0;
     }

     /* Hiệu ứng delay cho các vòng tròn */
     .circle::after,
     .circle1::after,
     .circle2::after,
     .circle3::after {
         animation-delay: 1s;
     }

     /* Định nghĩa hiệu ứng pulse */
     @keyframes pulse {
         0% {
             transform: scale(1);
         }

         50% {
             transform: scale(1.1);
         }

         100% {
             transform: scale(1);
         }
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

     /* Hiệu ứng khi hover vào các vòng tròn */
     .circle:hover {
         width: 350px;
         /* Tăng chiều rộng của div */
         height: 60px;
         /* Giữ nguyên chiều cao của div */
         background-color: #E41204;
         border-radius: 100px;
         /* Bo cong góc */
         transition: width 500ms ease-out;
         /* Thêm hiệu ứng mượt mà */
     }

     /* Bo cong góc cho các thành phần con khi hover */
     .circle:hover::after,
     .circle:hover::before {
         border-radius: 100px;
     }

     /* Tương tự cho các class khác */
     .circle1:hover {
         width: 350px;
         height: 60px;
         background-color: #E41204;
         border-radius: 100px;
         transition: width 500ms ease-out;
     }

     .circle1:hover::after,
     .circle1:hover::before {
         border-radius: 100px;
     }

     .circle2:hover {
         width: 350px;
         height: 60px;
         background-color: #E41204;
         border-radius: 100px;
         transition: width 500ms ease-out;
     }

     .circle2:hover::after,
     .circle2:hover::before {
         border-radius: 100px;
     }

     .circle3:hover {
         width: 350px;
         height: 60px;
         background-color: #E41204;
         border-radius: 100px;
         transition: width 500ms ease-out;
     }

     .circle3:hover::after,
     .circle3:hover::before {
         border-radius: 100px;
     }

     /* Định dạng thông tin hiển thị khi hover */
     .hover-info {
         position: relative;
     }

     .info-content {
         display: none;
         /* Mặc định ẩn nội dung */
         position: absolute;
         top: 0;
         left: 0;
         width: 300px;
         color: #fff;
     }

     .circle:hover+.info-content,
     .circle1:hover+.info-content,
     .circle2:hover+.info-content,
     .circle3:hover+.info-content {
         display: block;
         /* Hiển thị nội dung khi hover */
     }

     /* Định dạng hình ảnh bên trong vòng tròn */
     .circle_image {
         width: 50px;
         height: 50px;
         object-fit: cover;
         border-radius: 50%;
         border: 1px solid #fff;
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
         transition: border-color 0.5s ease;
         background-color: #fff;
         transform: translate(10%, 10%);
     }
 </style>
 <section id="red_sp">
     <div class="container">
         <div class="circle hover-info mt-3">
             <img class="img-fluid img-rounded circle_image" src="../../assets/images/red_sp/customer-service 1.svg" alt="">
             <div class="info-content">
                 <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <h5>Hỗ trợ</h5>
                         <p>Bạn cần tư vấn gì?</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="circle1 hover-info mt-3">
             <img class="img-fluid img-rounded circle_image" src="../../assets/images/red_sp/customer-service 1.svg" alt="">
             <div class="info-content">
                 <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <h5>Hỗ trợ</h5>
                         <p>Bạn cần tư vấn gì?</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="circle2 hover-info mt-3">
             <img class="img-fluid img-rounded circle_image" src="../../assets/images/red_sp/customer-service 1.svg" alt="">
             <div class="info-content">
                 <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <h5>Hỗ trợ</h5>
                         <p>Bạn cần tư vấn gì?</p>
                     </div>
                 </div>
             </div>
         </div>
         <div class="circle3 hover-info mt-3">
             <img class="img-fluid img-rounded circle_image" src="../../assets/images/red_sp/customer-service 1.svg" alt="">
             <div class="info-content">
                 <div class="row">
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <h5>Hỗ trợ</h5>
                         <p>Bạn cần tư vấn gì?</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 s