<?php
require _model.'SideFiles/DuesModels.php';

use \App\Controller\Controller\MainController ;
use \App\Model\SideFiles\DuesModels\DuesModels;

class DuesController extends MainController{
    /* 
        *    Kullanım öğrneği ;
        *       public function @RouterViewFunction($Data=null){
        *            return self::View('Home.index',['data'=>$Data]);
        *            // İlk değer olarak gitmek istediğin klasör yolunu belirtiyorsun. Eğer klasör içeriğine ulaşacaksan "." işaretini
        *            kullanıyorsun "klasör.renderEtmekİstediğinDosya".
        *       }
    */
    public $Model;
    public function __construct(){
        $this->Model = new DuesModels();
    }

    public function index($Data){
        $this->SessionChecker(true,false);
        $Data = $this->GetDataCustom($Data,['se','mo']);
        
        if(!empty($Data)){
            $Information = $this->Model->GetSingleSeason($Data[0][1]);
        
            $SeasonName = $Information['seasonName'][0]['season'];
            $SeasonID = $Information['seasonName'][0]['public_id'];
    
            $Analytical = $this->Model->GetMonthDues($Data[0][1]);
            $StudentCounter = $this->Model->GetSeasonStudentCount($Data[0][1]);
            $Students = $this->Model->GetStudentsInfo($Data[0][1],$Data[1][1]);
            $Months = [
                'EYLUL',
                'EKIM',
                'KASIM',
                'ARALIK',
                'OCAK',
                'SUBAT',
                'MART',
                'NISAN',
                'MAYIS',
                'HAZIRAN'
            ];
            $SelectedMonth = $Data[1][1];
        }


        $ReturnValue = [
            'Title' => 'Aidat Vermeyen Öğrenciler',
            'Date'=>$Analytical['Date'],
            'DateCounter'=>$Analytical['Count'],
            'StudentCount'=>$StudentCounter,
            'Seasons'=>$this->Model->GetSeason(),
            'Season'=>$SeasonName,
            'SeasonId'=>$SeasonID,
            'DuesPage'=>true,
            'Students'=>$Students,
            'Months'=>$Months,
            'SelectedMonth'=>$SelectedMonth
        ];


        return self::View('Dues.index',$ReturnValue);
    }
}
?>