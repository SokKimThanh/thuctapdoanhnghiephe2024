/**
 * su kien cho menu mobile
 */
const menuButton = document.getElementById('menu-button-mobile');
const menuContainerVisible = document.querySelector('.menu-container-visible');
const menuContainer = document.querySelector('.menu-container');
menuButton.addEventListener('click', () => {
    menuContainerVisible.classList.toggle('show-menu');
    // bat tiep su kien thu 2
    menuContainer.classList.toggle('show-menu-box');
});

/**
 * su kien cho nut search
 */

const btnSearch = document.querySelector('.btn-search');
const searchContainer = document.querySelector('.search-container');
const btnCloseSearch = document.getElementsByClassName('icon-close')[1];

btnSearch.addEventListener('click', () => {
    searchContainer.classList.toggle('show-search-container');
});
btnCloseSearch.addEventListener('click', () => {
    searchContainer.classList.remove('show-search-container');
});


/**
 * Section slider-company
 */
$(document).ready(function () {
    $(".slider-company").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 5
            }
        }
    });
});
/**
 * Trigger animation window scroll
 */
window.addEventListener('scroll', function () {
    /**
     * For section powerful-feature
     */
    const triggerSection = document.getElementById('powerful-feature');
    const sectionPosition = triggerSection.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 2;

    if (sectionPosition < screenPosition) {
        document.querySelectorAll('.row > .col-md-4:nth-child(1)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.row > .col-md-4:nth-child(2)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.4s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.row > .col-md-4:nth-child(3)').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.5s';
            el.classList.add('fade-in', 'slide-in-y');
        });
        document.querySelectorAll('.section-title, .title, .sub-title, .button-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
    /**
     * For section company
     */
    const triggerSectionSliderCompany = document.getElementById('slider-company');
    const sectionPositionSliderCompany = triggerSectionSliderCompany.getBoundingClientRect().top;
    const screenPositionSliderCompany = window.innerHeight;
    if (sectionPositionSliderCompany < screenPositionSliderCompany) {
        document.querySelectorAll('.slider-company-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
    /**
     * For section our-sucesss
     */
    const triggerSectionOurProcess = document.getElementById('our-process');
    const sectionPositionOurProcess = triggerSectionOurProcess.getBoundingClientRect().top;
    const screenPositionOurProcess = window.innerHeight;
    if (sectionPositionOurProcess < screenPositionOurProcess) {
        document.querySelectorAll('.process-bar').forEach(el => {
            el.style.animation = ' scale 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('scale');
        });
    }
    /**
    * For section our-facts
    */
    const triggerSectionOurFacts = document.getElementById('our-facts');
    const sectionPositionOurFacts = triggerSectionOurFacts.getBoundingClientRect().top;
    const screenPositionOurFacts = window.innerHeight;
    if (sectionPositionOurFacts < screenPositionOurFacts) {
        document.querySelectorAll('.our-facts-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
    /**
    * For section faqs
    */
    const triggerSectionFAQs = document.getElementById('faqs');
    const sectionPositionFAQs = triggerSectionFAQs.getBoundingClientRect().top;
    const screenPositionFAQs = window.innerHeight;

    if (sectionPositionFAQs < screenPositionFAQs) {
        document.querySelectorAll('.faqs-container').forEach(el => {
            el.style.animation = 'fade-in 1s ease-in-out, slide-in-y 1s ease-in-out';
            el.style.animationDelay = '0.3s';
            el.classList.add('fade-in', 'slide-in-y');
        });
    }
});

/**
 * Section customer-testimonials
 */
$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 3
            }
        }
    });
});

/**
 * Section FAQs
 */
const faqs = [
    {
        "title": "How long does it take to ship my order?",
        "content": "The shipping time for your order may vary depending on several factors such as your location, shipping method, and the availability of the product you ordered. Generally, standard shipping takes 3-5 business days within the same country, while international shipping may take between 7-14 business days."
    },
    {
        "title": "What payment methods do you accept?",
        "content": "However, the payment methods available for online transactions may vary depending on the website, platform, or merchant you are dealing with. Common payment methods include credit and debit cards, PayPal, Apple Pay, Google Wallet, and bank transfers."
    },
    {
        "title": "What shipping options do you have?",
        "content": "Shipping costs can also vary depending on the chosen option and can sometimes be waived or discounted based on factors such as the order value, customer loyalty, or promotion codes. It's always a good idea to review the options and associated costs before making a purchase to ensure a timely and satisfactory delivery."
    },
    {
        "title": "How do I make changes to an existing order?",
        "content": "When contacting the vendor, it's important to have your order number and other relevant information ready, so that the vendor can locate your order quickly. Depending on the changes you want to make, you may need to provide additional information or pay additional fees."
    },
    {
        "title": "When will my order arrive?",
        "content": "When contacting the vendor, it's important to have your order number and other relevant information ready, so that the vendor can locate your order quickly. Depending on the changes you want to make, you may need to provide additional information or pay additional fees."
    }
];

const faqsContainer = document.querySelector(".faqs-container");

faqs.forEach((faq, index) => {
    const faqItem = document.createElement("div");
    faqItem.className = "col-xl-12 col-md-12 col-sm-12 col-xs-12 faq-item";

    const rowHidden = document.createElement("div");
    rowHidden.className = "row-hidden";
    rowHidden.setAttribute("data-bs-toggle", "collapse");
    rowHidden.setAttribute("data-bs-target", `#collapse${index}`);
    rowHidden.setAttribute("aria-expanded", "false");
    rowHidden.setAttribute("aria-controls", `collapse${index}`);

    const rowTitle = document.createElement("div");
    rowTitle.className = "row-title";
    rowTitle.textContent = faq.title;

    const rowButton = document.createElement("span");
    rowButton.className = "row-button";
    rowButton.innerHTML = '<i class="bi bi-arrow-up-circle"></i>';

    rowHidden.appendChild(rowTitle);
    rowHidden.appendChild(rowButton);

    const rowQuote = document.createElement("div");
    rowQuote.className = "row-quote accordion-collapse collapse";
    rowQuote.id = `collapse${index}`;
    rowQuote.setAttribute("aria-labelledby", `heading${index}`);
    rowQuote.setAttribute("data-bs-parent", "#accordionExample");
    rowQuote.textContent = faq.content;

    faqItem.appendChild(rowHidden);
    faqItem.appendChild(rowQuote);

    faqsContainer.appendChild(faqItem);
});
/**
 * Section pricing-plan
 */
const pricing_choosen_li = document.querySelectorAll('.pricing-choosen li');
const yearly_container = document.querySelector('.yearly');
const monthly_container = document.querySelector('.monthly');

pricing_choosen_li.forEach(item => {
    item.addEventListener('click', () => {
        pricing_choosen_li.forEach(li => {
            li.classList.remove('active');
        });
        item.classList.add('active');
        if (item.textContent === 'Yearly') {
            yearly_container.style.display = 'flex';
            monthly_container.style.display = 'none';
        } else {
            yearly_container.style.display = 'none';
            monthly_container.style.display = 'flex';
        }
    });
});

/**
 * Lập trình hiển thị dữ liệu json cho pricing plan:
 * - Đoạn mã này giúp hiển thị dữ liệu JSON trên trang HTML bằng cách:
 * - Lặp qua các loại kế hoạch (yearly và monthly).
 * - Tạo các phần tử div tương ứng với từng kế hoạch.
 * - Thêm các chi tiết kế hoạch và danh sách tính năng vào phần tử div.
 * - Thêm phần tử div vào container tương ứng trên trang HTML.
 * - Điều này giúp tự động hóa quá trình tạo và hiển thị các kế hoạch giá cả dựa trên
 * dữ liệu JSON, giúp dễ dàng cập nhật và quản lý nội dung trên trang web.
 */

var pricingData = {
    "monthly": [
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-x-circle-fill"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle-fill"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check2"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": true,
            "popular": true
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        }
    ],
    "yearly": [
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-x-circle-fill"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle-fill"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check2"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": true,
            "popular": true
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        },
        {
            "priceValue": "$990 / Per year",
            "priceTitle": "Basic",
            "priceSubTitle": "Basic plan for 40 users",
            "priceFeatures": [
                {
                    "feature": "500+ pages",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Unlimited revisions",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "300+ templates",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Email marketing",
                    "icon": "bi bi-check-circle"
                },
                {
                    "feature": "Social media",
                    "icon": "bi bi-check-circle"
                }
            ],
            "selected": false
        }
    ],
}

/**
 * Tìm các phần tử div tương ứng với các loại kế hoạch (yearly và monthly) 
 * và gán cho các biến container:
 * - containers.yearly và containers.monthly chứa các phần tử div*/
const containers = {
    yearly: document.querySelector('.pricing-card-container.yearly'),
    monthly: document.querySelector('.pricing-card-container.monthly')
};
/**
 * Lặp qua các khóa trong pricingData:
 * - Đoạn mã này lấy tất cả các khóa của đối tượng pricingData (trong trường 
 * hợp này là "yearly" và "monthly") và lặp qua từng khóa.
 */
Object.keys(pricingData).forEach(planType => {
    /**
     * Lặp qua từng kế hoạch trong loại kế hoạch hiện tại:
     * - Đoạn mã này lặp qua từng kế hoạch trong loại kế hoạch hiện tại 
     * (yearly hoặc monthly) và thực hiện các bước tiếp theo cho từng kế hoạch.
     */
    pricingData[planType].forEach(plan => {

        /**
         * Tạo phần tử div mới cho từng kế hoạch:
         * - Tạo một phần tử div mới và đặt các lớp CSS thích hợp cho phần tử 
         * này. Nếu kế hoạch hiện tại được chọn (plan.selected là true), thì thêm lớp selected vào thẻ div.
        */
        const card = document.createElement('div');
        card.className = `col-xl-3 col-md-4 col-sm-6 col-xs-12 pricing-card ${plan.selected ? 'selected' : ''}`;

        /**
         * Thêm huy hiệu "popular" nếu có:
         * - Nếu kế hoạch hiện tại có thuộc tính popular là true, thêm huy hiệu 
         * "popular" vào phần tử div. Nếu không, để trống.
         */
        const popularBadge = plan.popular ? '<div class="popular active"><span ' +
            'class="pupular-badge">popular</span></div>' : '';

        /**
         * Tạo danh sách tính năng của kế hoạch:
         * - Đoạn mã này lặp qua từng tính năng của kế hoạch và tạo các mục danh
         * sách (li) tương ứng với các biểu tượng và tính năng. Kết quả cuối 
         * cùng là một chuỗi HTML chứa tất cả các mục danh sách. */
        const features = plan.priceFeatures.map(feature => `
            <li class="price-item">
                <span class="price-icon"><i class="${feature.icon}"></i></span>${feature.feature}
            </li>
        `).join('');

        /**
         * Thiết lập nội dung HTML cho phần tử div:
         * - Đoạn mã này thiết lập nội dung HTML của phần tử div mới tạo. 
         * Nội dung bao gồm huy hiệu "popular" (nếu có), các chi tiết kế hoạch,
         * danh sách tính năng, và các nút bấm "Get started" và "Learn More".*/
        card.innerHTML = `
            ${popularBadge}
            <div class="pricing-card-detail">
                <div class="price-value"><span class="amount">${plan.priceValue}</span></div>
                <div class="price-title">${plan.priceTitle}</div>
                <div class="price-sub-title">${plan.priceSubTitle}</div>
                <ul class="price-features">
                    ${features}
                </ul>
                <div class="button-container">
                    <button class="btn btn-get-started">Get started</button>
                    <button class="btn btn-learn-more">Learn More</button>
                </div>
            </div>
            <div class="price-line-background-hidden" />
        `;
        /**
         * Thêm phần tử div vào container tương ứng:
         * - Cuối cùng, thêm phần tử div mới tạo vào container tương ứng trong HTML
         * (.pricing-card-container.yearly hoặc .pricing-card-container.monthly).
         */
        containers[planType].appendChild(card);
    });
});

/**
 * section progress_indicator
 */

const progressIndicator = document.querySelector('.progress_indicator');
const progressCircle = document.querySelector('.circle-path');
const navigationDesktop = document.querySelector('#navigation-bar-desktop');
const pathLength = progressCircle.getTotalLength();
// Initial setting of stroke-dasharray and stroke-dashoffset
progressCircle.style.strokeDasharray = pathLength;
progressCircle.style.strokeDashoffset = pathLength;

const updateProgress = () => {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const scrollPercent = scrollTop / docHeight;
    const drawLength = pathLength * scrollPercent;
    progressCircle.style.strokeDashoffset = pathLength - drawLength;

    // Show the progress indicator when scrolling
    if (scrollTop > 100) {
        progressIndicator.classList.add('active-progress');
        navigationDesktop.classList.add('sticky_header_area');
    } else {
        progressIndicator.classList.remove('active-progress');
        navigationDesktop.classList.remove('sticky_header_area');
    }
};

window.addEventListener('scroll', updateProgress);

// Scroll to top when clicking the progress indicator
progressIndicator.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});


