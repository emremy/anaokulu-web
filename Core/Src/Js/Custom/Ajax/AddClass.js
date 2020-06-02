var AddClassButton = document.querySelector('.add-class');
AddClassButton.addEventListener('click',()=>{
    var Data = document.querySelector('.add-class-input').value;
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                window.location = `./?s=${AddClassButton.id}`;
            }
        };
    };
    HTTP.open('GET', `addClass?ClassName=${Data}&seasonID=${AddClassButton.id}`);
    HTTP.send()
});