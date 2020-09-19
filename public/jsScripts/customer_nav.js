

let widthSize = () => {
    document.getElementById("aside").classList.remove("aside-show");
}


let toggleNav = () => {
    document.getElementById("aside").classList.toggle("aside-show");
}

document.getElementById("nav-toggle").addEventListener("click", toggleNav)
