<div class="d-flex">
    <h5 style="line-height: 33px;">Dönem: </h5>
    <select class="form-control season-list footer-list" style="max-width: 170px;margin-left: 15px;">
        <option disabled selected value></option>
        @foreach($Season as $Key => $Value)
            @if($Key == $SelectedSeason)
                <option value="{{$Value}}" selected>{{$Key}}</option>
            @else
                <option value="{{$Value}}">{{$Key}}</option>
            @endif

        @endforeach
    </select>
</div>