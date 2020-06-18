<div class="modal dues-panel" tabindex="-1" role="dialog" style="display:none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" style="margin-right: -35px;">Aidat Düzenle</h5>
                <button class="close" data-dismiss="modal" aria-label="Close" onclick="ChangeResult('Show-Dues-Panel')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
            <p><span><strong>Öğrenci: </strong>{{$Student['name']}} {{$Student['surname']}}</span><span class="ml-2"><strong>Dönem: </strong>{{$Season}}</span></p>
                <hr>
                <div class="form-inline justify-content-center">

                    <div class="input-group mb-2" style="width: 80%;">
                        <div class="input-group-prepend" style="width: 115px;">
                            <div class="input-group-text w-100">Tarih Giriniz:</div>
                        </div>
                        <input type="text" class="form-control custom-date" value="" placeholder="Tarih...">
                    </div>

                    <div class="input-group mb-2" style="width: 80%;">
                        <div class="input-group-prepend" style="width: 115px;">
                            <div class="input-group-text w-100">Aidat Giriniz:</div>
                        </div>
                        <input type="number" class="form-control custom-amount" value="" placeholder="Tutar...">
                    </div>
                </div>
                <input type="hidden" class="date-value" value="">
                <hr>
                <button type="button" class="px-5 btn btn-primary add-dues-btn">Kaydet</button>
            </div>
        </div>
    </div>
</div>