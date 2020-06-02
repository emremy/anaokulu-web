function ChangeResult(Value){
    if(Value == 'period'){
        var AddPeriodPanel  = document.querySelector('#add-period');
        if(AddPeriodPanel.style.display == 'none'){
            AddPeriodPanel.style.display = 'flex';  
        }else{
             AddPeriodPanel.style.display = 'none';
        }
    }
}