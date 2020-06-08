<div class="modal add-student-panel" tabindex="-1" role="dialog" style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" style="margin-right: -35px;">Öğrenci Ekle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ChangeResult('addStudent')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form class="form-inline ogrenci-ekle-form">

                    <div class="input-group mb-2 w-100">
                        <div class="input-group-prepend">
                            <div class="input-group-text w-100">Dönem:</div>
                        </div>
                        <div class="form-control text-left" style="background: #e9ecef;">{{$Season}} Eğitim Öğretim Dönemi</div>
                    </div>
                    <div class="input-group mb-2 w-100">
                        <div class="input-group-prepend">
                            <div class="input-group-text w-100">Sınıfı:</div>
                        </div>
                        <select class="form-control add-s-cl-id">
                            @if(!empty($Classes))
                                @foreach ($Classes as $item)
                                    <option value="{{$item['public_id']}}">{{$item['class_name']}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                  @component('Modal.EditStudent')
                      
                  @endcomponent
                </form>
                <hr class="mt-2">
            <input type="hidden" id="S-I" value="{{$SeasonId}}">
            <button type="submit" class="px-5 btn btn-primary student-request" id="{{$Change}}">Kaydet</button>
            </div>
        </div>
    </div>
</div>