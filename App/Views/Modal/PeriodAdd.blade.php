<div class="modal" id="add-period" tabindex="-1" role="dialog" style="display:none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" style="margin-right: -35px;">Dönem Ekle</h5>
                <button type="button" id="close-period-add" class="close" data-dismiss="modal" aria-label="Close" onclick="ChangeResult('period')">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <form class="form-inline justify-content-center">
                    <div class="form-group mb-2">
                        <label>Dönem Seçiniz:</label>
                    </div>
                    <select class="form-control mx-3 mb-2"  id="addperiod-selection" style="max-width: 170px;margin-left: 15px;">
                        <option value="2019/2020">2019/2020</option>
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                        <option value="2023/2024">2023/2024</option>
                        <option value="2024/2025">2024/2025</option>
                        <option value="2025/2026">2025/2026</option>
                    </select>
                    <button type="button" class="btn btn-primary mb-2" id="submit-addperiod">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</div>