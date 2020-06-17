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
Routers::Router('/deleteClass','Ajax|DeleteClass');
Routers::Router('/students','Students|index');
Routers::Router('/addStudent','Ajax|AddStudent');
Routers::Router('/editStudent','Ajax|EditStudent');
Routers::Router('/student','Student|index');
Routers::Router('/searchStudent','Ajax|SearchStudent');
Routers::Router('/deleteStudent','Ajax|DeleteStudent');
Routers::Router('/addDues','Ajax|AddDues');