<div class="w-100">
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend"> 
            <div class="input-group-text w-100">Adı:</div>
        </div>
    <input type="text" class="form-control student-name" placeholder="Ad yazınız..." value="@if(!empty($Student)){{$Student['name']}}@endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Soyadı:</div>
        </div>
        <input type="text" class="form-control student-surname" placeholder="Soyad yazınız..." value="@if(!empty($Student)){{$Student['surname']}}@endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">TC Kimlik No:</div>
        </div>
        <input type="text" class="form-control student-tc"  placeholder="TC Kimlik No yazınız..." maxlength="11" value="@if(!empty($Student)){{$Student['tcno']}}@endif">
    </div>

    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Anne İsmi:</div>
        </div>
        <input type="text" class="form-control student-mtname" placeholder="Anne ismini yazınız..." value="@if(!empty($Student)){{$Student['mtname']}}@endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Anne Telefon:</div>
        </div>
        <input type="text" class="form-control student-mtnumber" placeholder="Anne telefonunu yazınız..." maxlength="10" value="@if(!empty($Student)){{$Student['mtnumber']}}@endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Baba İsmi:</div>
        </div>
        <input type="text" class="form-control student-ftname" placeholder="Baba ismini yazınız..." value="@if(!empty($Student)){{$Student['ftname']}}@endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Baba Telefon:</div>
        </div>
        <input type="text" class="form-control student-ftnumber" placeholder="Baba telefonunu yazınız..." maxlength="10" value="@if(!empty($Student)) {{$Student['ftnumber']}} @endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">3. Şahıs Yakınlığı:</div>
        </div>
        <input type="text" class="form-control student-other" placeholder="3. Şahısın yakınlık derecesini yazınız..." value="@if(!empty($Student)) {{$Student['othername']}} @endif">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">3. Şahıs Telefon: </div>
        </div>
        <input type="text" class="form-control student-othernumber" placeholder="3. Şahısın telefonunu yazınız..." maxlength="10" value="@if(!empty($Student)) {{$Student['othernumber']}} @endif">
    </div>
</div>