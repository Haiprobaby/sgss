@extends('backEnd.master')

<!--ASSET-->
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/css')}}/lightbox.css">
@endsection
@section('script')
<script src="{{asset('public/backEnd/js/')}}/lightbox-plus-jquery.js"></script>
@endsection

<!--MAIN CONTENT-->
@section('mainContent')

<!--Section--->
<section class="sms-breadcrumb mb-20 white-box">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('lang.classes') @lang('Schedule')</h1>
      <div class="bc-pages" style="width: 270px">
        <form action="/schedule/select" method="POST">
          {{ csrf_field() }}
          <select class="niceSelect w-100 bb form-control" id="select_class" name="class_id" onchange="this.form.submit()">
            <option data-display="@lang('lang.select') @lang('lang.class') *" value="">@lang('lang.select') @lang('lang.class')</option>
            
            @foreach($classes as $i)
            <option value="{{ $i->id }}" @if ($id == $i->id) selected @endif>{{ $i->class_name }}</option>
            @endforeach
          </select>
        </form>
      </div>
    </div>
  </div>
</section>

<!--Section-->
<section class="container-fluid p-0">
  <div class="row">
    <div class="col text-left mr-20">
      @if (count($table) > 0)
      <button class="primary-btn-small-input primary-btn small tr-bg" type="button" data-toggle="modal" data-target="#addNoteSchedule">
        <span class="ti-plus pr-2"></span>
        @lang('lang.note')
      </button>
      @endif 
    </div>
    <div class="col text-right mr-20">
      <button class="primary-btn-small-input primary-btn small fix-gr-bg" type="button" data-toggle="modal" data-target="#addSchedule">
        <span class="ti-plus pr-2"></span>
        @lang('lang.add')
      </button>
    </div>
  </div>
  <!--Modal note schedule-->
  <div class="modal fade" id="addNoteSchedule">
    <div class="modal-dialog small-modal modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">@lang('Note Schedule')</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="/schedule/note_add" method="post">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col">
                    <select class="niceSelect w-100 bb form-control" id="select_class" name="schedule_id">
                      <option data-display="@lang('lang.select') @lang('Row') *" value="">@lang('lang.select') @lang('lang.field')</option>
                      
                      @foreach ($table as $i)
                      <option value="{{$i->id}}">{{date("h:i A", strtotime($i->start))}} - {{date("h:i A", strtotime($i->end))}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col">
                    <select class="niceSelect w-100 bb form-control" id="select_class" name="element">
                      <option data-display="@lang('lang.select') @lang('Field') *" value="">@lang('lang.select') @lang('lang.field')</option>
                      
                      <option value="id">No</option>
                      <option value="start">Start</option>
                      <option value="end">End</option>
                      <option value="mon">Monday</option>
                      <option value="tue">Tuesday</option>
                      <option value="wed">Wednesday</option>
                      <option value="thu">Thursday</option>
                      <option value="fri">Friday</option>
                      <option value="sat">Saturday</option>
                      <option value="sun">Sunday</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-35">
                  <div class="col">
                    <div class="input-effect">
                      <textarea class="primary-input" name="note" rows="3"></textarea>
                      <label>Note</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center mt-40">
                  <div class="mt-40 d-flex justify-content-center">
                    <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit">@lang('lang.save')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!--Modal Add schedule-->
  <div class="modal fade" id="addSchedule">
    <div class="modal-dialog large-modal modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">@lang('Add Schedule')</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <form action="" method="post">
                {{ csrf_field() }}
                <div class="row justify-content-center">
                  <div class="col-3">
                    <div class="row no-gutters input-right-icon mt-25">
                      <div class="col">
                        <div class="input-effect">
                          <input class="primary-input time form-control has-content" type="text" name="in_time" value="" required="">
                          <label>Start *</label>
                          <span class="focus-border"></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="" type="button">
                          <i class="ti-timer"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="row no-gutters input-right-icon mt-25">
                      <div class="col">
                        <div class="input-effect">
                          <input class="primary-input time form-control has-content" type="text" name="out_time" value="" required="">
                          <label>End *</label>
                          <span class="focus-border"></span>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button class="" type="button">
                          <i class="ti-timer"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-35 justify-content-center">
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="mon" rows="2"></textarea>
                      <label>Monday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="tue" rows="2"></textarea>
                      <label>Tuesday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="wed" rows="2"></textarea>
                      <label>Wednesday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="thu" rows="2"></textarea>
                      <label>Thursday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="fri" rows="2"></textarea>
                      <label>Friday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="row justify-content-center mt-35">
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="sat" rows="2"></textarea>
                      <label>Saturday</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                  <div class="col-lg-2">
                    <div class="input-effect">
                      <textarea class="primary-input" name="sun" rows="2"></textarea>
                      <label>Sunsay</label>
                      <span class="focus-border"></span>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 text-center mt-40">
                  <div class="mt-40 d-flex justify-content-between">
                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                    <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit">@lang('lang.save')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
</div>

  <div class="white-box mt-10 p-3">
    <div>
      <table class="w-100 text-center mb-10" style="table-layout:fixed;">
        <tr>
          <th width="4%">No</th>
          <th width="8%">Start</th>
          <th width="8%">End</th>
          <th width="12%">SUN</th>
          <th width="12%">MON</th>
          <th width="12%">TUE</th>
          <th width="12%">WED</th>
          <th width="12%">THU</th>
          <th width="12%">FRI</th>
          <th width="12%">SAT</th>
        </tr>
      </table>
    </div>
    <div>
      <table class="w-100 text-center" style="table-layout:fixed;">
        @foreach ($table as $i)
        <tr style="border-top: 1px solid #828BB2;">
          <td style="overflow: hidden;" width="4%">
          @php
            $id_note = $note->where("schedule_id", $i->id)->where("element", "id")->first();
            $id_note_id = $id_note->color_id;
            $id_note_color = $colors->find($id_note_id)->color;
            $id_note_body = $id_note->body;
          @endphp

          @if ($id_note_body != "")
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_no_{{$loop->index}}"
          >
            <div style="color:{{ $id_note_color }}">
              {{ $loop->index + 1 }}
            </div>
          </a>
          @else 
          {{ $loop->index + 1 }}
          @endif
          <div class="modal fade" id="info_no_{{$loop->index}}">
            <div class="modal-dialog small-modal modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">@lang('Note')</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <p style="color:{{ $id_note_color }}">{{ $id_note_body }}</p>
                      </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $id_note->id }}">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                            @foreach ($colors as $c)
                            <option 
                              value="{{$c->id}}"
                              @if ($c->id == $id_note_id)
                                selected
                              @endif
                            >
                              {{ $c->color }}
                            </option>
                            @endforeach
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="8%">
          @php
            $start_note = $note->where("schedule_id", $i->id)->where("element", "start")->first();
            $start_note_id = $start_note->color_id;
            $start_note_color = $colors->find($start_note_id)->color;
            $start_note_body = $start_note->body;
          @endphp

          @if ($start_note_body != "")
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_start_{{$loop->index}}"
            style="color:{{ $start_note_color }}"
          >
            {{ date("h:i A", strtotime($i->start)) }}
          </a>
          @else 
          {{ date("h:i A", strtotime($i->start)) }}
          @endif
          <div class="modal fade" id="info_start_{{$loop->index}}">
            <div class="modal-dialog small-modal modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">@lang('Note')</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <p style="color:{{ $start_note_color }}">
                        {{ $start_note_body }}
                        </p>
                      </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $start_note->id }}">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                            @foreach ($colors as $c)
                            <option 
                              value="{{$c->id}}"
                              @if ($c->id == $start_note_id)
                                selected
                              @endif
                            >
                              {{ $c->color }}
                            </option>
                            @endforeach
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="8%">
          @php
            $end_note = $note->where("schedule_id", $i->id)->where("element", "end")->first();
            $end_note_id = $end_note->color_id;
            $end_note_color = $colors->find($end_note_id)->color;
            $end_note_body = $end_note->body;
          @endphp
          
          @if ($end_note_body != "")
          <a 
            href="" 
            data-toggle="modal" 
            data-target="#info_end_{{$loop->index}}"
          >
            <div style="color:{{ $end_note_color }}">
              {{ date("h:i A", strtotime($i->end)) }}
            </div>
          </a>
          @else
          {{ date("h:i A", strtotime($i->end)) }}
          @endif
          <div class="modal fade" id="info_end_{{$loop->index}}">
            <div class="modal-dialog small-modal modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">@lang('Note')</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col">
                        <p style="color:{{ $end_note_color }}">
                          {{ $end_note_body }}
                        </p>
                      </div>
                    </div>
                    <hr>
                    <div class="row justify-content-between">
                      <div class="col-6">
                        <form action="/schedule/select_color" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="id" value="{{ $end_note->id }}">
                          <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                            <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                            @foreach ($colors as $c)
                            <option 
                              value="{{$c->id}}"
                              @if ($c->id == $end_note_id)
                                selected
                              @endif
                            >
                              {{ $c->color }}
                            </option>
                            @endforeach
                          </select>
                         </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
              $sun_note = $note->where("schedule_id", $i->id)->where("element", "sun")->first();
              $sun_note_id = $sun_note->color_id;
              $sun_note_color = $colors->find($sun_note_id)->color;
              $sun_note_body = $sun_note->body;
            @endphp

            @if ($sun_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sun_{{$loop->index}}"
            >
              <div style="color:{{ $sun_note_color }}">
                {{ $i->sun }}
              </div>
            </a>
            @else
            {{ $i->sun }}
            @endif
            <div class="modal fade" id="info_sun_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $sun_note_color }}">
                            {{ $sun_note_body }}
                          </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $sun_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $sun_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $mon_note = $note->where("schedule_id", $i->id)->where("element", "mon")->first();
            $mon_note_id = $mon_note->color_id;
            $mon_note_color = $colors->find($mon_note_id)->color;
            $mon_note_body = $mon_note->body;
            @endphp

            @if ($mon_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_mon_{{$loop->index}}" 
              style="color:{{ $mon_note_color }}"
            >
              {{ $i->mon }}
            </a>
            @else
            {{ $i->mon }}
            @endif
            <div class="modal fade" id="info_mon_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $mon_note_color }}">{{ $mon_note_body }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $mon_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $mon_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $tue_note = $note->where("schedule_id", $i->id)->where("element", "tue")->first();
            $tue_note_id = $tue_note->color_id;
            $tue_note_color = $colors->find($tue_note_id)->color;
            $tue_note_body = $tue_note->body;
            @endphp

            @if ($tue_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_tue_{{$loop->index}}"
              style="color:{{ $tue_note_color }}"
            >
              {{ $i->tue }}
            </a>
            @else
            {{ $i->tue }}
            @endif
            <div class="modal fade" id="info_tue_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $tue_note_color }}">
                            {{ $tue_note_body }}</p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $tue_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $tue_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $wed_note = $note->where("schedule_id", $i->id)->where("element", "wed")->first();
            $wed_note_id = $wed_note->color_id;
            $wed_note_color = $colors->find($wed_note_id)->color;
            $wed_note_body = $wed_note->body;
            @endphp

            @if ($wed_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_wed_{{$loop->index}}"
              style="color:{{ $wed_note_color }}"
            >
              {{ $i->wed }}
            </a>
            @else
            {{ $i->wed }}
            @endif
            <div class="modal fade" id="info_wed_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $wed_note_color }}">
                            {{ $wed_note_body }}
                          </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $wed_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $wed_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $thu_note = $note->where("schedule_id", $i->id)->where("element", "thu")->first();
            $thu_note_id = $thu_note->color_id;
            $thu_note_color = $colors->find($thu_note_id)->color;
            $thu_note_body = $thu_note->body;
            @endphp

            @if ($thu_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_thu_{{$loop->index}}"
              style="color:{{ $thu_note_color }}"
            >
              {{ $i->thu }}
            </a>
            @else
            {{ $i->thu }}
            @endif
            <div class="modal fade" id="info_thu_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $thu_note_color }}">
                            {{ $thu_note_body }}
                          </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $thu_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $thu_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $fri_note = $note->where("schedule_id", $i->id)->where("element", "fri")->first();
            $fri_note_id = $fri_note->color_id;
            $fri_note_color = $colors->find($fri_note_id)->color;
            $fri_note_body = $fri_note->body;
            @endphp

            @if ($fri_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_fri_{{$loop->index}}"
              style="color:{{ $fri_note_color }}"
            >
              {{ $i->fri }}
            </a>
            @else
            {{ $i->fri }}
            @endif
            <div class="modal fade" id="info_fri_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $fri_note_color }}">
                            {{ $fri_note_body }}
                          </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $fri_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $fri_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12%">
            @php
            $sat_note = $note->where("schedule_id", $i->id)->where("element", "sat")->first();
            $sat_note_id = $sat_note->color_id;
            $sat_note_color = $colors->find($sat_note_id)->color;
            $sat_note_body = $sat_note->body;
            @endphp

            @if ($sat_note_body != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sat_{{$loop->index}}"
              style="color:{{ $sat_note_color }}"
            >
              {{ $i->sat }}
            </a>
            @else
            {{ $i->sat }}
            @endif
            <div class="modal fade" id="info_sat_{{$loop->index}}">
              <div class="modal-dialog small-modal modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">@lang('Note')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col">
                          <p style="color:{{ $sat_note_color }}">
                            {{ $sat_note_body }}
                          </p>
                        </div>
                      </div>
                      <hr>
                      <div class="row justify-content-between">
                        <div class="col-6">
                          <form action="/schedule/select_color" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $sat_note->id }}">
                            <select class="niceSelect w-100 bb form-control" name="color" onchange="this.form.submit()">
                              <option data-display="@lang('lang.select') @lang('lang.color') *" value=""></option>
                              @foreach ($colors as $c)
                              <option 
                                value="{{$c->id}}"
                                @if ($c->id == $sat_note_id)
                                  selected
                                @endif
                              >
                                {{ $c->color }}
                              </option>
                              @endforeach
                            </select>
                           </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="8"></td>
          <td>
            <div class="col-lg-2 mr-20 text-right">
              <button class="primary-btn-small-input primary-btn small mb-10 mt-10" type="button" data-toggle="modal" data-target="#updateSchedule{{$loop->index}}">
                @lang('lang.update')
              </button>
            </div>
          </td>
          <td>
            <div class="col-lg-2 mr-20 text-right">
              <button class="primary-btn-small-input primary-btn small mb-10 mt-10" type="button" data-toggle="modal" data-target="#deleteSchedule{{$loop->index}}">
                @lang('lang.delete')
              </button>
            </div>
          </td>
        </tr>
        <!--update schedule-->
        <div class="modal fade" id="updateSchedule{{$loop->index}}">
          <div class="modal-dialog large-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">@lang('Update Staff Schedule')</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <form action="/schedule/update/{{ $i->id }}" method="post">
                      {{ csrf_field() }}
                      <div class="row justify-content-center">
                        <div class="col-3">
                          <div class="row no-gutters input-right-icon mt-25">
                            <div class="col">
                              <div class="input-effect">
                                <input class="primary-input time form-control has-content" type="text" name="in_time" value="{{ $i->start }}" required="">
                                <label>Start *</label>
                                <span class="focus-border"></span>
                              </div>
                            </div>
                            <div class="col-auto">
                              <button class="" type="button">
                                <i class="ti-timer"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="row no-gutters input-right-icon mt-25">
                            <div class="col">
                              <div class="input-effect">
                                <input class="primary-input time form-control has-content" type="text" name="out_time" value="{{ $i->end }}" required="">
                                <label>End *</label>
                                <span class="focus-border"></span>
                              </div>
                            </div>
                            <div class="col-auto">
                              <button class="" type="button">
                                <i class="ti-timer"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-35 justify-content-center">
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="mon" rows="2">{{$i->mon}}</textarea>
                            <label>Monday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="tue" rows="2">{{$i->tue}}</textarea>
                            <label>Tuesday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="wed" rows="2">{{$i->wed}}</textarea>
                            <label>Wednesday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="thu" rows="2">{{$i->thu}}</textarea>
                            <label>Thursday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="fri" rows="2">{{$i->fri}}</textarea>
                            <label>Friday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row justify-content-center mt-35">
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="sat" rows="2">{{$i->sat}}</textarea>
                            <label>Saturday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="input-effect">
                            <textarea class="primary-input" name="sun" rows="2">{{$i->sun}}</textarea>
                            <label>Sunday</label>
                            <span class="focus-border"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-12 text-center mt-40">
                        <div class="mt-40 d-flex justify-content-center">
                          <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit">@lang('lang.save')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        <!--delete schedule-->
        <div class="modal fade" id="deleteSchedule{{$loop->index}}">
          <div class="modal-dialog small-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">@lang('Delete Staff Schedule') {{ $loop->index + 1 }}</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <form action="/schedule/delete/{{ $i->id }}" method="post">
                      {{ csrf_field() }}
                      <div class="row justify-content-center">
                        <div class="col text-center">
                          <h5>Are you sure?</h5>
                        </div>
                      </div>
                      <div class="col-lg-12 text-center mt-40">
                        <div class="mt-40 d-flex justify-content-between">
                          <button type="button" class="primary-btn tr-bg" data-dismiss="modal">@lang('lang.cancel')</button>
                          <button class="primary-btn fix-gr-bg" id="save_button_query" type="submit">@lang('lang.save')</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
        @endforeach
      </table>
    </div>
  </div>
</section>
@endsection
<!--END MAIN CONTENT-->