var EditButton = document.querySelector('.update-information');

EditButton.addEventListener('click',()=>{
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

    var Send = {
        'sname':document.querySelector('.student-name').value,
        'ssurname':document.querySelector('.student-surname').value,
        'stc':document.querySelector('.student-tc').value,
        'smtname':document.querySelector('.student-mtname').value,
        'smtnumber':document.querySelector('.student-mtnumber').value,
        'sftname':document.querySelector('.student-ftname').value,
        'sftnumber':document.querySelector('.student-ftnumber').value,
        'sother':document.querySelector('.student-other').value,
        'sothernumber':document.querySelector('.student-othernumber').value,
        'sid':ResultLoc.se,
        'stid':ResultLoc.st,
        'change':EditButton.id,
    };
    var Checker = false;
    Object.keys(Send).forEach(e => {
        if(Send[e] == ''){
            console.log(Send[e]);
            Checker = true;
        }
    });
    if(Checker){
        alert('Gerekli Alanları Doldurunuz..!');
        return false;
    }
    var Url = `editStudent?Change=${Send['change']}&StudentID=${Send['stid']}&SeasonID=${Send['sid']}&StudentName=${Send['sname']}&StudentSurname=${Send['ssurname']}&StudentTc=${Send['stc']}&StudentMtName=${Send['smtname']}&StudentMtNumber=${Send['smtnumber']}&StudentFtName=${Send['sftname']}&StudentFtNumber=${Send['sftnumber']}&StudentOName=${Send['sother']}&StudentONumber=${Send['sothernumber']}`;
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
            console.log('OK!');
            if(HTTP.status == 202){
                location.reload();
            }
        };
    };
    HTTP.open('GET', Url);
    HTTP.send()
});