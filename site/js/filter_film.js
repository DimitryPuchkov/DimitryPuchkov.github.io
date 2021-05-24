//Фильтры в каталоге
//В массиве dataFilms хранится информация о всех фильмах
const data = [
    {
        "title"   : "Кино1",
        "year"    : 2000,
        "genre"   : ["Драма", "Комедия"],
        "country" : "",
        "age"     : "18+",
        "score"   : 5.8
    },
    {
        "title": "Кино1",
        "year": 2000,
        "genre": [],
        "country": "",
        "age": "18+",
        "score": 5.8
    },
    {
        "title": "Кино1",
        "year": 2000,
        "genre": [],
        "country": "",
        "age": "18+",
        "score": 5.8
    },
    {
        "title": "Французский фильм",
        "year": 2000,
        "genre": [],
        "country": "Франция",
        "age": "18+",
        "score": 5.8
    },
    {
        "title": "Кино1",
        "year": 2000,
        "genre": [],
        "country": "",
        "age": "18+",
        "score": 5.8
    },
    {
        "title": "Кино1",
        "year": 2000,
        "genre": [],
        "country": "",
        "age": "18+",
        "score": 5.8
    },
    {
        "title": "Кино для детей",
        "year": 2004,
        "genre": [],
        "country": "",
        "age": "0+",
        "score": 5.8
    }
];

const movies = document.querySelector("#movies");

function showMovies(st){
    
    movies.innerHTML = prepareMovies();
}
function prepareMovies(){
    let str = "";
    for(let i in data){
        if(
            (genre.selectedOptions[0].value=="all" || data[i].genre.includes(genre.selectedOptions[0].text)) &&
            (year.value=="" || data[i].year == parseInt(year.value) ) &&
            (country.selectedOptions[0].value=="all" || data[i].country==country.selectedOptions[0].text) &&
            (age.selectedOptions[0].value=="all" || data[i].age==age.selectedOptions[0].text)
        )
        str +='<div class="col-sm-4 mb30"><a href="./catalog_one.html"><img src="./img/frame.png" alt="" class="catalog__prev"><h4>'+data[i].title+'</h4><p class="catalog__p">Оцкнка на кинопоиске: '+data[i].score+'</p><p class="catalog__p">Жанр: '+data[i].genre+'</p></a></div>';
    }
    return str;
}


showMovies()

//const genre = document.querySelector("#genre");
const filterMovie = document.querySelector(".filter-button");
filterMovie.addEventListener("click", showMovies)
