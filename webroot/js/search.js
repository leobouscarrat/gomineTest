$(document).ready(function(){
    var searchBtn = document.getElementById("searchBtn");
    var searchInput = document.getElementById("searchInput");

    function research(value){
        if(value == "pacman")
            document.location.href = $("a#pacmanLink").attr("href");
    }

    searchBtn.addEventListener("click", function(e){
        research(searchInput.value);
    }, false);

    searchInput.addEventListener("keydown", function(e){
        if(e.which == 13){
            research(searchInput.value);
        }
    });
});
