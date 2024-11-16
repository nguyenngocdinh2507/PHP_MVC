// Menu Selected
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const menus = $$('.menu-items');

const start_menu = () => menus.forEach((menu,index) => {
    if(index != 0) {
        menu.classList.remove("menu-selected");
    }

});

start_menu();

menus.forEach((menu,index) => {
    menu.onclick = function() {
        $('.menu-items.menu-selected').classList.remove("menu-selected");
        this.classList.add("menu-selected");
    }
});

