<div class="w-100">
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Adı:</div>
        </div>
    <input type="text" class="form-control student-name" placeholder="Ad yazınız..." value="{{!empty($SingleStudent['Name'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Soyadı:</div>
        </div>
        <input type="text" class="form-control student-surname" placeholder="Soyad yazınız..." value="{{!empty($SingleStudent['Surname'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">TC Kimlik No:</div>
        </div>
        <input type="text" class="form-control student-tc"  placeholder="TC Kimlik No yazınız..." maxlength="11" value="{{!empty($SingleStudent['Tc'])}}">
    </div>

    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Anne İsmi:</div>
        </div>
        <input type="text" class="form-control student-mtname" placeholder="Anne ismini yazınız..." value="{{!empty($SingleStudent['MotherName'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Anne Telefon:</div>
        </div>
        <input type="text" class="form-control student-mtnumber" placeholder="Anne telefonunu yazınız..." maxlength="10" value="{{!empty($SingleStudent['MotherNumber'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Baba İsmi:</div>
        </div>
        <input type="text" class="form-control student-ftname" placeholder="Baba ismini yazınız..." value="{{!empty($SingleStudent['FatherName'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">Baba Telefon:</div>
        </div>
        <input type="text" class="form-control student-ftnumber" placeholder="Baba telefonunu yazınız..." maxlength="10" value="{{!empty($SingleStudent['FatherNumber'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">3. Şahıs Yakınlığı:</div>
        </div>
        <input type="text" class="form-control student-other" placeholder="3. Şahısın yakınlık derecesini yazınız..." value="{{!empty($SingleStudent['OtherName'])}}">
    </div>
    <div class="input-group mb-2 w-100">
        <div class="input-group-prepend">
            <div class="input-group-text w-100">3. Şahıs Telefon: </div>
        </div>
        <input type="text" class="form-control student-othernumber" placeholder="3. Şahısın telefonunu yazınız..." maxlength="10" value="{{!empty($SingleStudent['OtherNumber'])}}">
    </div>
</div>