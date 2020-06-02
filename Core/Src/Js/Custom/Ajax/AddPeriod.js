var AddPeriodButton = document.querySelector('#submit-addperiod');
var OptionTasks = document.querySelector('#addperiod-selection');

AddPeriodButton.addEventListener('click',()=>{
    var ChangeID = OptionTasks.options[OptionTasks.selectedIndex].value;
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                setInterval("window.location='./'",1000);
            }
        };
    };
    HTTP.open('GET', `addSeason?seasonName=${ChangeID}`);
    HTTP.send()
});