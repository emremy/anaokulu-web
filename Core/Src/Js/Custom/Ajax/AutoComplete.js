var input = document.querySelector('.search-student');

input.onkeyup = function(e) {
  input_val = this.value;

  var SeasonItem = document.querySelector('.season-list');
  var Season = SeasonItem.options[SeasonItem.selectedIndex].value;
  Season = Season.split('e=');
  Season = Season[1];
  
  if (input_val.length > 0) {
    var HTTP = new XMLHttpRequest();
    HTTP.onreadystatechange = function() {
        if (HTTP.readyState === 4){
              var people_to_show = JSON.parse(this.responseText);
              autocomplete_results = document.getElementById("autocomplete-results");
              autocomplete_results.innerHTML = '';
              var SeasonItem = document.querySelector('.season-list');
              var Season = SeasonItem.options[SeasonItem.selectedIndex].value;
              Season = Season.split('e=');
              Season = Season[1];
              for (i = 0; i < people_to_show.length; i++) {
                  autocomplete_results.innerHTML += '<li class="list-group-item li-item-get" id="'+ people_to_show[i]['public_id'] +'">' + people_to_show[i]['name'] +' '+ people_to_show[i]['surname']+' | '+people_to_show[i]['tcno']+'</li>';
              }
              autocomplete_results.style.display = 'block';
             
        };
    };
    HTTP.open('GET', `searchStudent?keyValue=${input_val}&seasonValue=${Season}`);
    HTTP.send();

  } else{
    people_to_show = [];
    autocomplete_results.innerHTML = '';
    autocomplete_results.style.display = 'none';
  }

}
var ListO = document.querySelector('.ogrenci-listesi');

ListO.addEventListener('click',(e)=>{
    document.querySelector('.search-student').value = e.target.textContent;
    document.querySelector('#data-content-student').value = e.target.id;
    document.getElementById("autocomplete-results").innerHTML = '';
    document.getElementById("autocomplete-results").style.display='none';
})

