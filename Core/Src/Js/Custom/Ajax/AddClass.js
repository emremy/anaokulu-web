var AddClassButton = document.querySelector('.add-class');
AddClassButton.addEventListener('click',()=>{
    var Data = document.querySelector('.add-class-input').value;
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                window.location = `./?s=${AddClassButton.value}`;
            }
        };
    };
    HTTP.open('GET', `addClass?ClassName=${Data}&seasonID=${AddClassButton.value}`);
    HTTP.send()
});