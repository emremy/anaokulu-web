var DeleteClassButton = document.querySelector('.delete-class-button');
DeleteClassButton.addEventListener('click',()=>{
    var Item = document.querySelector('.delete-class-select');
    var Data = Item.options[Item.selectedIndex].value;
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                window.location = `./?s=${DeleteClassButton.id}`;
            }
        };
    };
    HTTP.open('GET', `deleteClass?classID=${Data}&seasonID=${DeleteClassButton.id}`);
    HTTP.send()
});