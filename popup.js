let btn = document.querySelector(".btn");
let popup = document.querySelector(".popup");
let close1 = document.querySelector(".close");
let form = document.querySelector(".form");

let header = document.querySelector("header");
btn.addEventListener("click",function (){
    popup.classList.add("show");
    form.classList.add("opacity");
    header.classList.add("opacity");
    console.log("hello world");
})
close1.addEventListener("click",function(){
    popup.classList.remove("show");
    form.classList.remove("opacity")
    header.classList.remove("opacity");
})
let 






