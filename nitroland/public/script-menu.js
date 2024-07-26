/**
 * Desktop Menu hover: nav-item hover active
 * Đoạn mã này sử dụng sự kiện hover để hiển thị và ẩn menu dropdown, 
 * thay thế sự kiện click trước đây. Việc sử dụng các lớp CSS như show, 
 * home-link, và linear giúp điều chỉnh giao diện theo thiết kế yêu cầu.
 */
document.addEventListener('DOMContentLoaded', function () {

    const menuData = {
        "menu": [
            {
                "title": "Home",
                "link": "#",
                "submenu": [
                    {
                        "title": "Home 1",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 2",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 4",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    },
                    {
                        "title": "Home 3",
                        "link": "#",
                        "image": "./public/images/home-1-min.png"
                    }
                ]
            },
            {
                "title": "Page",
                "link": "#",
                "submenu": [
                    {
                        "title": "About Us",
                        "link": "#"
                    },
                    {
                        "title": "Careers",
                        "link": "#"
                    },
                    {
                        "title": "Coming Soon",
                        "link": "#"
                    },
                    {
                        "title": "Frequently Questions",
                        "link": "#"
                    },
                    {
                        "title": "Login/Register",
                        "link": "#"
                    },
                    {
                        "title": "Error",
                        "link": "#"
                    },
                    {
                        "title": "Maintenance",
                        "link": "#"
                    },
                    {
                        "title": "Team",
                        "link": "#"
                    },
                    {
                        "title": "Contact Us",
                        "link": "#"
                    },
                    {
                        "title": "404",
                        "link": "#"
                    },
                    {
                        "title": "Service",
                        "link": "#"
                    },
                    {
                        "title": "Shop List",
                        "link": "#"
                    }
                ],
                "bannerImage": "./public/images/Banner.png"
            },
            {
                "title": "Shop",
                "link": "#",
                "submenu": [
                    {
                        "title": "About Us",
                        "link": "#"
                    },
                    {
                        "title": "Products",
                        "link": "#"
                    },
                    {
                        "title": "Checkout",
                        "link": "#"
                    },
                    {
                        "title": "Cart",
                        "link": "#"
                    },
                    {
                        "title": "My Account",
                        "link": "#"
                    }
                ]
            },
            {
                "title": "Blog",
                "link": "#",
                "submenu": [
                    {
                        "title": "Blog Default",
                        "link": "#"
                    },
                    {
                        "title": "Blog V2",
                        "link": "#"
                    },
                    {
                        "title": "Single Post No Sidebar",
                        "link": "#",
                        "submenu": [
                            {
                                "title": "Single Post Right Sidebar",
                                "link": "#"
                            },
                            {
                                "title": "Single Post Left Sidebar",
                                "link": "#"
                            }
                        ]
                    },
                    {
                        "title": "Single Post V2 No Sidebar",
                        "link": "#",
                        "submenu": [
                            {
                                "title": "Single Post V2 Left Sidebar",
                                "link": "#"
                            },
                            {
                                "title": "Single Post V2 Right Sidebar",
                                "link": "#"
                            }
                        ]
                    }
                ]
            },
            {
                "title": "Contact",
                "link": "#"
            }
        ]
    };

    const menuContainer = document.getElementById('menu');

    function createMenu(menuItems) {
        /**
         * Tạo menu từ dữ liệu JSON
         * @param {Array} menuItems - Dữ liệu menu JSON
         * @returns {void}         
         */
        menuItems.forEach((item, indexMenuItem, array) => {
            const menuItem = document.createElement('li');
            const menuLink = document.createElement('a');

            if (indexMenuItem == array.length - 1) {
                // MENU CUỐI CÙNG không thêm 2 class dropdown và dropdown-toggle
                menuItem.className = 'nav-item';
                menuLink.className = 'nav-link';
            } else {
                // MENU KHÁC THÌ THÊM 2 Class dropdown và dropdown-toggle
                menuItem.className = 'nav-item dropdown';
                menuLink.className = 'nav-link dropdown-toggle';
            }

            menuLink.href = item.link;
            menuLink.textContent = item.title;
            menuLink.setAttribute('id', item.title.toLowerCase() + 'Link');
            menuLink.setAttribute('role', 'button');
            menuLink.setAttribute('data-bs-toggle', 'dropdown');
            menuLink.setAttribute('aria-expanded', 'false');
            menuItem.appendChild(menuLink);


            if (item.submenu) {
                const submenu = document.createElement('ul');
                submenu.className = 'dropdown-menu row';
                submenu.setAttribute('aria-labelledby', item.title.toLowerCase() + 'Link');

                // Xử lý PAGE MENU 2 CỘT
                // ul.dropdown-menu> li.col-md-8> ul.row > li.col-md-3
                const liColMd8 = document.createElement('li');
                const ulRow = document.createElement('ul');
                ulRow.className = 'list-unstyled row';/**Array list */

                const liColMd2 = document.createElement('li');
                liColMd8.className = 'col-md-8';
                liColMd2.className = 'col-md-2';
                if (indexMenuItem == 1) {
                    liColMd8.appendChild(ulRow);
                    submenu.appendChild(liColMd8);
                    submenu.appendChild(liColMd2);
                }



                item.submenu.forEach((subitem, index) => {
                    const submenuItem = document.createElement('li');

                    const submenuLink = document.createElement('a');

                    /** 
                     *  Dò từng phần tử indexMenuItem trong danh mục cấp 1 để 
                     *  chỉnh sửa từng phần tử trong danh mục cấp 2 
                     * */
                    switch (indexMenuItem) {
                        case 0:/**HOME */
                            submenuItem.className = 'col-sm-2';
                            submenuLink.className = 'dropdown-item';
                            submenuLink.href = subitem.link;
                            break;
                        case 1:/**PAGE */

                            submenuItem.className = 'col-sm-3';
                            submenuLink.className = 'dropdown-item';
                            submenuLink.href = subitem.link;
                            submenuLink.textContent = subitem.title;

                            break;
                        default:/**ANOTHER */
                            submenuLink.className = 'dropdown-item';
                            submenuLink.href = subitem.link;
                            submenuLink.textContent = subitem.title;
                            break;
                    }

                    if (subitem.image) {
                        const submenuImage = document.createElement('img');
                        submenuImage.className = 'img-fluid';
                        submenuImage.src = subitem.image;
                        submenuImage.alt = subitem.title;

                        submenuLink.prepend(submenuImage);
                    }
                    // Danh mục PAGE có 2 cột
                    if (indexMenuItem == 1) {
                        // ul.dropdown-menu> li.col-md-8> ul.row > li.col-md-3
                        submenuItem.appendChild(submenuLink);
                        ulRow.appendChild(submenuItem);
                    } else {
                        // Danh mục còn lại chỉ có 1 cột
                        submenuItem.appendChild(submenuLink);
                        submenu.appendChild(submenuItem);
                    }
                });

                if (item.bannerImage) {
                    const bannerItem = document.createElement('li');
                    const bannerImage = document.createElement('img');
                    bannerImage.src = item.bannerImage;
                    bannerImage.alt = 'Banner';
                    bannerImage.className = 'img-fluid';
                    bannerItem.appendChild(bannerImage);
                    liColMd2.appendChild(bannerItem);
                }

                menuItem.appendChild(submenu);
            }

            menuContainer.appendChild(menuItem);
        });


        // Truy cập tất cả các phần tử nav-item
        const navItems = document.querySelectorAll('.nav-item.dropdown');
        /**
         * Duyệt qua từng phần tử nav-item để thêm sự kiện mouseover và mouseleave
         * vào phần tử nav-link và dropdown-menu tương ứng         
         */
        navItems.forEach((item, index, array) => {

            // MENU CAP 1: Truy cập phần tử nav-link và home-link 
            const navLink = item.querySelector('.nav-link.dropdown-toggle');
            const dropdownMenu = item.querySelector('.dropdown-menu');

            if (dropdownMenu === null) return;

            // Thêm lớp CSS đặc biệt hoặc thay đổi style trực tiếp cho 2 phần tử đầu tiên
            if (index == 0 || index == 1) {
                // Thêm lớp CSS đặc biệt 
                dropdownMenu.classList.add('home-link');
                // Tách lớp linear ra khỏi dropdownMenu
                if (index == 0) {
                    dropdownMenu.classList.add('linear-home-link');
                    dropdownMenu.classList.add('height-home-link');
                }
            }

            // Thêm sự kiện mouseover cho nav-link
            navLink.addEventListener('mouseover', () => {
                dropdownMenu.classList.add('show');
            });

            // Thêm sự kiện mouseleave cho nav-item
            item.addEventListener('mouseleave', () => {
                dropdownMenu.classList.remove('show');
            });

            // Thêm sự kiện mouseover cho home-link để giữ nó hiển thị
            dropdownMenu.addEventListener('mouseover', () => {
                dropdownMenu.classList.add('show');
            });

            // Thêm sự kiện mouseleave cho home-link để ẩn nó khi không hover
            dropdownMenu.addEventListener('mouseleave', () => {
                dropdownMenu.classList.remove('show');
            });
        });
    }

    createMenu(menuData.menu);
});

