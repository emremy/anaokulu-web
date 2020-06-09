var AddButton = document.querySelector('.student-request');

AddButton.addEventListener('click',()=>{
    var C_I = document.querySelector('.add-s-cl-id');
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
        'sid':document.querySelector('#S-I').value,
        'cid':C_I.options[C_I.selectedIndex].value,
        'change':AddButton.id,
    };
    var Checker = false;
    Object.keys(Send).forEach(e => {
        if(Send[e] == ''){
            Checker = true;
        }
    });
    if(Checker){
        alert('Gerekli Alanları Doldurunuz..!');
        return false;
    }
    var Url = `addStudent?Change=${Send['change']}&ClassID=${Send['cid']}&SeasonID=${Send['sid']}&StudentName=${Send['sname']}&StudentSurname=${Send['ssurname']}&StudentTc=${Send['stc']}&StudentMtName=${Send['smtname']}&StudentMtNumber=${Send['smtnumber']}&StudentFtName=${Send['sftname']}&StudentFtNumber=${Send['sftnumber']}&StudentOName=${Send['sother']}&StudentONumber=${Send['sothernumber']}`;
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