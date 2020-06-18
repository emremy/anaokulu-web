var AddDuesBtn = document.querySelector('.add-dues-btn');

AddDuesBtn.addEventListener('click',()=>{
    var DateValue = document.querySelector('.date-value').value;
    if(DateValue == ''){
        return false;
    }
    var CustomDate = document.querySelector('.custom-date').value;
    var CustomAmount = document.querySelector('.custom-amount').value;
    if(CustomDate == '' || CustomAmount == ''){
        return false
    }
    var getParams = function (url) {
        var params = {};
        var parser = document.createElement('a');
        parser.href = url;
        var query = parser.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            params[pair[0]] = decodeURIComponent(pair[1]);
        }
        return params;
    };
    var ResultLoc = getParams(window.location);
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                location.reload();
            }
        };
    };
    HTTP.open('GET', `addDues?st=${ResultLoc.st}&amo=${CustomAmount}&da=${CustomDate}&id=${DateValue}`);
    HTTP.send()
});