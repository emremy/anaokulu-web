<div class="d-flex">
    <h5 style="line-height: 33px;">Dönem: </h5>
    <select class="form-control season-list footer-list" style="max-width: 170px;margin-left: 15px;">
        <option disabled selected value></option>
        @foreach($Season as $Key => $Value)
            @if($Key == $SelectedSeason)
                <option value="@if(!empty($Change) && $Change == 'edit') ./student?se={{$Value}} @else ./?s={{$Value}} @endif" selected>{{$Key}}</option>
            @else
                <option value="@if(!empty($Change) && $Change == 'edit') ./student?se={{$Value}} @else ./?s={{$Value}} @endif">{{$Key}}</option>
            @endif

        @endforeach
    </select>
</div>