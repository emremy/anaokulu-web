var SeasonList = document.querySelectorAll('.season-list');
SeasonList.forEach(e=>{
    e.addEventListener('change',()=>{
        var ID = e.options[e.selectedIndex].value;
        window.location=`./?s=${ID}`;
    });
})
