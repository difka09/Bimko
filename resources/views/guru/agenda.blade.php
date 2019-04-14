@extends('guru.templates.defaultprofil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="ui-block">
            <div class="ui-block-title bg-blue">
                <h6 class="title c-white">Create a New Topic</h6>
            </div>

            <div class="ui-block-content">
            <div class="form-group label-floating is-select is-empty">
                <label class="control-label">Personal Event</label>
                <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="Personal Event" aria-expanded="false"><span class="filter-option pull-left">Personal Event</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" x-placement="bottom-start" style="max-height: 799px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, 58px, 0px); top: 0px; left: 0px; will-change: transform;"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 781px; overflow-y: auto; min-height: 0px;"><li data-original-index="0" class=""><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Private Event</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">Personal Event</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
                <option value="MA">Private Event</option>
                <option value="FE">Personal Event</option>
                </select></div>
                <span class="material-input"></span>
            </div>

            <div class="form-group label-floating">
                <label class="control-label">Event Name</label>
                <input class="form-control" placeholder="" value="Take Querty to the Veterinarian" type="text">
                <span class="material-input"></span></div>
            <div class="form-group label-floating is-empty">
                <label class="control-label">Event Location</label>
                <input class="form-control" placeholder="" value="" type="text">
                <span class="material-input"></span></div>
            <div class="form-group date-time-picker label-floating is-focused">
                <label class="control-label">Event Date</label>
                <input name="datetimepicker" value="26/03/2016">
                <span class="input-group-addon">
                <svg class="olymp-calendar-icon icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use></svg>
                </span>
            </div>

            <div class="row">

            <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="form-group label-floating">
                <label class="control-label">Event Time</label>
                <input class="form-control" placeholder="" value="09:00" type="text">
                <span class="material-input"></span>
            </div>
            </div>

            <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">AM-PM</label>
                <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="AM" aria-expanded="false"><span class="filter-option pull-left">AM</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" x-placement="bottom-start" style="max-height: 464px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, 398px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries=""><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 446px; overflow-y: auto; min-height: 0px;"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">AM</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">PM</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
                    <option value="MA">AM</option>
                    <option value="FE">PM</option>
                </select>
                </div>
                <span class="material-input"></span>
            </div>
            </div>

            <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Timezone</label>
                <div class="btn-group bootstrap-select form-control"><button type="button" class="btn dropdown-toggle btn-secondary" data-toggle="dropdown" role="button" title="US (UTC-8)" aria-expanded="false"><span class="filter-option pull-left">US (UTC-8)</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox" x-placement="bottom-start" style="max-height: 464px; overflow: hidden; min-height: 0px; position: absolute; transform: translate3d(0px, 398px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries=""><ul class="dropdown-menu inner" role="listbox" aria-expanded="false" style="max-height: 446px; overflow-y: auto; min-height: 0px;"><li data-original-index="0" class="selected"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="true"><span class="text">US (UTC-8)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="1"><a tabindex="0" class=" dropdown-item" style="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">UK (UTC-0)</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker form-control" tabindex="-98">
                    <option value="MA">US (UTC-8)</option>
                    <option value="FE">UK (UTC-0)</option>
                </select>
                </div>
                <span class="material-input"></span>
            </div>
            </div>

            </div>

            <div class="form-group label-floating">
                <label class="control-label">Event Description</label>
                <textarea class="form-control" placeholder="">I need to take Querty for a check up and ask the doctor if he needs a new tank.
                </textarea>
                <span class="material-input"></span>
            </div>

            <button class="btn btn-breez btn-lg full-width">Create Event</button>

        </div>
        </div>
        </div>
    </div>
</div>



@endsection
