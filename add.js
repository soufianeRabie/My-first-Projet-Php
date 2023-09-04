let sel = document.querySelectorAll("button");
let popup = document.querySelector(".popup");
let close1 = document.querySelector(".close");
let form = document.querySelector(".form");
console.log(sel);
let studentId = document.querySelector(".studentId");
let studentName = document.querySelector(".studentnName");

// console.log(Name.innerText);
let header = document.querySelector("header");

let Name = document.querySelector(".Name");



sel.forEach(function(ele){
    ele.onclick= function(){
        sel.forEach(function(ele){
            ele.classList.remove("btn");
            // popup.classList.remove("show")
        })
        this.classList.add("btn");

            popup.classList.add("show");
            // form.classList.add("opacity");
            // header.classList.add("opacity");
            console.log("hello world");
            studentId.value=ele.value;
            studentName.value=Name.value;
            // studentId.innerText= "hello";
            // fullName.value =Name.innerText;
            console.log(this)
        
    }
})
close1.addEventListener("click",function(){
    popup.classList.remove("show");
    // form.classList.remove("opacity")
    // header.classList.remove("opacity");
})
