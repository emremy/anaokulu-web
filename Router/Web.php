<?php 


use \Router\Routers\Routers;


    /* 
        * İlk parametre url path, ikinci parametre Controller yolu. "|" bu işaretin solu controller adı, sağı ise fonksiyonun adı.
    */

Routers::Router('/','Home|index');
Routers::Router('/login','Login|login');
Routers::Router('/loginRequest','Login|loginCheck');
Routers::Router('/addSeason','Ajax|AddSeason');
Routers::Router('/addClass','Ajax|AddClass');

