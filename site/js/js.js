
// Развернуть\свернуть статью
const articles = document.querySelectorAll(".article");
document.addEventListener("click", function(e){
    if(e.target.className=="article-show"){
        console.log(e.target.innerText);
        //console.log(e.target.parentNode.children[2]);
        if(e.target.innerText == "Подробнее")
            e.target.innerText = "Свернуть";
        else
            e.target.innerText = "Подробнее";
        e.target.parentNode.children[2].classList.toggle("article__p");
        e.target.parentNode.children[2].classList.toggle("open");
        
    }
    
})

//Показать\убрать меню в мобилке
const menu = document.querySelector("#nav");
const burger = document.querySelector(".burger");
burger.addEventListener("click", function(){
    // if(menu.classList.contains("menu-none")){
    //     menu.classList.remove("menu-none");
    //     menu.classList.add("menu-active");
    // }
    // else{
    //     menu.classList.remove("menu-active");
    //     menu.classList.add("menu-none");
    // }
    menu.classList.toggle("active");
})


//Поиск
const search = document.querySelector("#search");
const panel = document.querySelector(".search__panel");
const searchTxt = document.querySelector(".search__text");
search.addEventListener("click", function(e){
    if(panel.classList.contains("active_search")){
        if(!searchTxt.value){
            panel.classList.remove("active_search");
        }
        else
        console.log("search:" + searchTxt.value)
    }
    else{
        panel.classList.add("active_search");
    }
})

