var MonthsList = document.querySelectorAll('#switch-mounth');
MonthsList.forEach(e=>{
    e.addEventListener('change',()=>{
        var ID = e.options[e.selectedIndex].value;
        window.location= ID;
    });
})
