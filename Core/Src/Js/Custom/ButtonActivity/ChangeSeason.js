var SeasonList = document.querySelector('.season-list');

SeasonList.addEventListener('change',()=>{
    var ID = SeasonList.options[SeasonList.selectedIndex].value;
    window.location=`./?s=${ID}`;
});