<div class="modal" id="delete-class" tabindex="-1" role="dialog" style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" style="margin-right: -35px;">Sınıf Sil</h5>
                <button type="button" id="close-dclass-btn" class="close" data-dismiss="modal" aria-label="Close" onclick="ChangeResult('deleteClass')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form class="form-inline justify-content-center">
                    <div class="form-group mb-2">
                        <label>Sınıf Seçiniz:</label>
                    </div>
                    <select class="form-control mx-3 mb-2 delete-class-select" style="max-width: 170px;margin-left: 15px;">
                        @foreach($DeleteClasses as $Key)
                            <option value="{{$Key['public_id']}}" selected>{{$Key['class_name']}}</option>
                        @endforeach
                    </select>
                <button type="button" class="btn btn-danger mb-2 delete-class-button" value="{{$ConfirmSeason}}">Sil</button>
                </form>
            </div>
        </div>
    </div>
</div>
