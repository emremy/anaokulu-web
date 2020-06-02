var ReturnResult = prompt("Giriş yapmak için şifre giriniz..");

if(ReturnResult != null){
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                setInterval("window.location='./'",1000);
            }
        };
    };
    HTTP.open('GET', `loginRequest?_pass=${ReturnResult}`);
    HTTP.send()
}else{
    setInterval("window.location='/login'",1500);
}