function ChangeResult(Value,DateId=null){
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
    if(Value == 'deleteClass'){
        var DeleteClassPanel = document.querySelector('#delete-class');
        if(DeleteClassPanel.style.display == 'none'){
            DeleteClassPanel.style.display = 'flex';  
        }else{
            DeleteClassPanel.style.display = 'none';
        }
    }
    if(Value == 'addStudent'){
        var AddStudentPanel = document.querySelector('.add-student-panel');
        if(AddStudentPanel.style.display == 'none'){
            AddStudentPanel.style.display = 'flex';  
        }else{
            AddStudentPanel.style.display = 'none';
        }
    }
    if(Value == 'show-dues'){
        var DuesPanel = document.querySelector('.dues-table');
        if(DuesPanel.style.display == 'none'){
            DuesPanel.style.display = 'flex';  
        }else{
            DuesPanel.style.display = 'none';
        }
    }
    if(Value == 'clear'){
        var SeasonItem = document.querySelector('.season-list');
        var Season = SeasonItem.options[SeasonItem.selectedIndex].value;
        if(Season != undefined){
            Season = Season.split('e=');
            Season = Season[1].trim();
            window.location = `./student?se=${Season}`;
        }

    }
    if(Value == 'Show-Dues-Panel'){
        var SingleDuesPanel = document.querySelector('.dues-panel');
        if(SingleDuesPanel.style.display == 'none'){
            SingleDuesPanel.style.display = 'flex';
            document.querySelector('.date-value').value = DateId;  
        }else{
            SingleDuesPanel.style.display = 'none';
        }
    }
}