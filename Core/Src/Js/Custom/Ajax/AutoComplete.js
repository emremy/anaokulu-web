var input = document.querySelector('.search-student');

input.onkeyup = function(e) {
  input_val = this.value;

  var SeasonItem = document.querySelector('.season-list');
  var Season = SeasonItem.options[SeasonItem.selectedIndex].value;

  
  if (input_val.length > 0 && Season != undefined) {
    Season = Season.split('e=');
    Season = Season[1];
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

                  autocomplete_results.innerHTML += '<li class="list-group-item li-item-get" id="'+people_to_show[i]['public_id']+'?'+people_to_show[i]['class_id']+'">' + people_to_show[i]['name'] +' '+ people_to_show[i]['surname']+' | '+people_to_show[i]['tcno']+'</li>';
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
    var SeasonItem = document.querySelector('.season-list');
    var Season = SeasonItem.options[SeasonItem.selectedIndex].value;
    if(Season != undefined){
      Season = Season.split('e=');
      Season = Season[1];
      var Ids = e.target.id.split('?');
      if(Ids != ''){
        window.location = `./student?st=${Ids[0].trim()}&se=${Season.trim()}&cl=${Ids[1].trim()}`;
      }

    }

})

