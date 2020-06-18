<div class="modal delete-student-panel" tabindex="-1" role="dialog" style="display:none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" style="margin-right: -35px;">Öğrenciyi Sil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ChangeResult('delete-student')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p style="line-height: 30px;">
                <span><strong class="mr-1">Adı Soyadı: </strong>{{$Student['name']}} {{$Student['surname']}}</span>
                    <br>
                <span><strong class="mr-1">Sınıfı:</strong>{{$Class}}</span>
                <span class="ml-3"><strong class="mr-1">Dönemi:</strong>{{$Season}}</span>
                </p>
                <p class="mx-3">Öğrenciyi silmek istediğinizden emin misiniz?</p>
                <hr>
                <div class="text-right">
                    <button type="button" class="btn btn-secondary mb-2 mr-2" >Vazgeç</button>
                    <button type="button" class="btn btn-danger mb-2 delete-from-student">Sil</button>
                </div>
            </div>
        </div>
    </div>
</div>