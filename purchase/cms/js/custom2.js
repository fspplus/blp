var all = document.getElementById("all");
var act = document.getElementById("act");
var ict = document.getElementById("ict");

function all(){
    all.classList.add("active");
    act.classList.remove("act");
    ict.classList.remove("ict");
}

function act(){
    act.classList.add("active");
    all.classList.remove("act");
    ict.classList.remove("ict");
}

function ict(){
    ict.classList.add("active");
    act.classList.remove("act");
    all.classList.remove("ict");
}