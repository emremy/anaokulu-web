var SeasonList = document.querySelectorAll('.season-list');

SeasonList.forEach(e=>{
    console.log(e);
    SeasonList.addEventListener('change',()=>{
        var ID = SeasonList.options[SeasonList.selectedIndex].value;
        window.location=`./?s=${ID}`;
    });
})
