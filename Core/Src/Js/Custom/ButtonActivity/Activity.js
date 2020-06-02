function ChangeResult(Value){
    if(Value == 'period'){
        var AddPeriodPanel  = document.querySelector('#add-period');
        if(AddPeriodPanel.style.display == 'none'){
            AddPeriodPanel.style.display = 'flex';  
        }else{
             AddPeriodPanel.style.display = 'none';
        }
    }
    if(Value =='class'){
        var AddClassPanel = document.querySelector('#add-class');
        if(AddClassPanel.style.display == 'none'){
            AddClassPanel.style.display = 'flex';  
        }else{
            AddClassPanel.style.display = 'none';
        }
    }
}