<table class="table table-hover table-striped table-bordered">
    <thead>
        <tr>
            <th><strong>#</strong></th>
            <th>Adı Soyadı:</th>
            <th>TC Kimlik No:</th>
            <th>Anne Adı</th>
            <th>Baba Adı</th>
            <th>3.Kişi Tel</th>
            <th class="text-center">Aidatlar</th>
        </tr>
    </thead>
    <tbody>
        @php
        function ChangePhoneNumber($Number){
            $Result = sprintf(
                "(%s)-%s-%s-%s",
                substr($Number, 0, 3),
                substr($Number, 3, 3),
                substr($Number, 6,2),
                substr($Number, 8,2)
            );
            return $Result;
        }    
        @endphp
        @foreach ($Students as $Student)
            <tr>
                <td class="align-middle"></td>  
            <td class="align-middle">{{$Student['name']}} {{$Student['surname']}}</td>
            <td class="align-middle">{{$Student['tcno']}}</td>
                <td class="align-middle">
                    {{$Student['mtname']}}<span class="ml-2 badge badge-dark">{{ChangePhoneNumber($Student['mtnumber'])}}</span>
                </td>
                <td class="align-middle">
                    {{$Student['ftname']}}<span class="ml-2 badge badge-dark">{{ChangePhoneNumber($Student['ftnumber'])}}</span>
                </td>
            <td class="align-middle">{{ChangePhoneNumber($Student['othernumber'])}}<span class="ml-2 badge badge-dark">{{$Student['othername']}}</span>
                </td>
                <td class="align-middle text-center">
                <a href="./student?st={{$Student['public_id']}}&se={{$SeasonId}}&cl={{$ClassID}}">
                <button class="btn btn-info button-due-detail">
 
                    <i class="fa fa-edit"></i>
                </button>
                </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>