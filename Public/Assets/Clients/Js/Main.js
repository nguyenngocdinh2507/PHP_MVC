// Menu Selected
//Left bar
const menus = document.querySelectorAll('.menu-items');

const start_menu = () => menus.forEach((menu,index) => {
    if(index != 0) {
        menu.classList.remove("menu-selected");
    }

});

start_menu();

menus.forEach((menu,index) => {
    menu.onclick = function() {
        document.querySelector('.menu-items.menu-selected').classList.remove("menu-selected");
        this.classList.add("menu-selected");
    }
});

//Menu drop header

const avt = document.querySelector('.user-avatar');
const menu_drop = document.querySelector('.dropdown-menu');

// console.log(avt, menu_drop);