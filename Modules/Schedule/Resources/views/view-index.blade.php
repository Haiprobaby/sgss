@extends('frontEnd.home.layout.front_master')

@push('css')
<link rel="stylesheet" href="{{asset('public/')}}/frontend/css/new_style.css" />
@endpush
@push('css')
<link rel="stylesheet" type="text/css" href="{{asset('public/backEnd/')}}/css/croppie.css">
@endpush

@section('main_content')
<!--Section--->
<div class="container">
  <section class="sms-breadcrumb mb-20 white-box">
  <div class="container-fluid">
    <div class="row justify-content-between">
      <h1>@lang('lang.classes') @lang('Schedule')</h1>
      <div class="bc-pages" style="width: 270px">
        <form action="/schedule/view/select" method="POST">
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
<section class="container-fluid p-0 sms-breadcrumb mb-50 white-box" style="box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
  <div class="white-box mt-10 p-3">
    <div>
      <table class="w-100 text-center mb-10" style="table-layout:fixed;">
        <tr>
          <th width="12.5%" style="color: #33FF39">Time</th>
          <th width="12.5%" style="color: #FCFF33">SUN</th>
          <th width="12.5%" style="color: #336BFF">MON</th>
          <th width="12.5%" style="color: #FF8D33">TUE</th>
          <th width="12.5%" style="color: #FF4633">WED</th>
          <th width="12.5%" style="color: #FF337A">THU</th>
          <th width="12.5%" style="color: #33DDFF">FRI</th>
          <th width="12.5%" style="color: #FF33F3">SAT</th>
        </tr>
      </table>
    </div>
    <div>
      <table class="w-100 text-center" style="table-layout:fixed;">
        @foreach ($table as $i)
        <tr style="border-top: 1px solid #828BB2;">
          <td style="overflow: hidden;" width="6.25%" class="text-center">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="6.25%" class="text-center">
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
            style="color:{{ $end_note_color }}"
          >
            {{ date("h:i A", strtotime($i->end)) }}
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
            @php
              $sun_note = $note->where("schedule_id", $i->id)->where("element", "sun")->first();
              $sun_note_id = $sun_note->color_id;
              $sun_note_color = $colors->find($sun_note_id)->color;
              $sun_note_body = $sun_note->body;
            @endphp
            
            @if ($sun_note != "")
            <a 
              href="" 
              data-toggle="modal" 
              data-target="#info_sun_{{$loop->index}}"
              style="color:{{ $sun_note_color }}"
            >
              {{ $i->sun }}
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                            <p style="color:{{ $mon_note_color }}">
                              {{ $mon_note_body }}
                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                              {{ $tue_note_body }}
                            </p>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td style="overflow: hidden;" width="12.5%" class="text-center">
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
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</section>
</div>
@endsection