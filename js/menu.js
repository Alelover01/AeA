window.onload = function () {
    const menu_btn = document.querySelector(".hamburger");
    const nav_change = document.querySelector(".aComparsa");
    menu_btn.addEventListener("click", function () {
        menu_btn.classList.toggle("is-active");
        nav_change.classList.toggle("is-active");
    })
}