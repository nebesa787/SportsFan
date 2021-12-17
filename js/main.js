(() => {
    let headerMenuItem = document.querySelectorAll('.header__submenu-item'),
        body = document.querySelector('body'),
        //hamburger = document.querySelector('.hamburger'),
        headerMenu = document.querySelector('.header__menu'),
        tabsContent = document.querySelectorAll('.logo__right-item'),
        tabs = document.querySelectorAll('.logo__right-tab'),
        headerMenuLink = document.querySelectorAll('.header__submenu-title');

    headerMenuLink.forEach((item) => {
        item.addEventListener('click', () => {
            if(!(headerMenu.classList.contains('active'))) {
                if(!(item.closest('.header__submenu-item').classList.contains('active'))) {
                    headerMenuItem.forEach((it) => {
                        it.classList.remove('active');
                    });
                    item.closest('.header__submenu-item').classList.add('active');
                } 
                else if (item.closest('.header__submenu-item').classList.contains('active')) {
                    item.closest('.header__submenu-item').classList.remove('active');
                }
            }
        });
    });

    /*hamburger.addEventListener('click', () => {
        if(!(headerMenu.classList.contains('active'))) {
            headerMenu.classList.add('active');
            body.style.overflow = 'hidden';
        } else {
            headerMenu.classList.remove('active');
            body.style.overflow = 'unset';
        }
    });
	*/

    let removeActiveTab = function() {
        tabs.forEach((item, index) => {
            if(item.classList.contains('active')) {
                item.classList.remove('active');
                tabsContent[index].classList.remove('active');
            }
        });
    }

    tabs.forEach((item, index) => {
        if(item.classList.contains('active')) {
            tabsContent[index].classList.add('active');
        }
        item.addEventListener('click', (e) => {
            if(!(item.classList.contains('active'))) {
                removeActiveTab();
                tabs[index].classList.add('active');
                tabsContent[index].classList.add('active');
            }
        });
    });
    
})();