var DeleteButton = document.querySelector('.delete-from-student');

DeleteButton.addEventListener('click',()=>{
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
                window.location = './student';
            }
        };
    };
    HTTP.open('GET', `deleteStudent?s=${ResultLoc.st}`);
    HTTP.send()
});