<?php

namespace Modules\Schedule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;

//models
use \Modules\Schedule\Entities\ColorNoteSchedule;
use \Modules\Schedule\Entities\Classes;
use \Modules\Schedule\Entities\NoteSchedule;
use \Modules\Schedule\Entities\StaffSchedule;

class ScheduleController extends Controller {
  public function redirect_view() {
    try {
      $classes = Classes::get(["id", "class_name"])->last();
      return redirect("/schedule/view/{$classes->id}");
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function view($id) {
    try {
      $classes = Classes::get(["id", "class_name"]);
      $table = StaffSchedule::where("staff_id", $id)->get();
      $note = NoteSchedule::get();
      $colors = ColorNoteSchedule::get();
      
      return view("schedule::view-index", compact("id", "table", "note", "classes", "colors"));
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function view_select(Request $request) {
    try {
      return redirect("/schedule/view/{$request->get("class_id")}");
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function select_color(Request $request) {
    try {
      NoteSchedule::where("id", $request->get("id"))->update([
        "color_id" => $request->get("color")
      ]);
      Toastr::success("Update color successfully", "Success");
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function redirect_index() {
    try {
      $classes = Classes::get(["id", "class_name"])->last();
      return redirect("/schedule/{$classes->id}");
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function index($id) {
    try {
      $classes = Classes::get(["id", "class_name"]);
      $table = StaffSchedule::where("staff_id", $id)->get();
      $note = NoteSchedule::get();
      $colors = ColorNoteSchedule::get();


      return view("schedule::index", compact("id", "table", "note", "classes", "colors"));
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function select(Request $request) {
    try {
      return redirect("/schedule/{$request->get("class_id")}");
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function create($id, Request $request) {
    try {
      $schedule = new StaffSchedule();
      $schedule->staff_id = $id;
      $schedule->start = date("G:i", strtotime($request->get("in_time")));
      $schedule->end = date("G:i", strtotime($request->get("out_time")));
      $schedule->mon =  $request->get("mon");
      $schedule->tue =  $request->get("tue");
      $schedule->wed =  $request->get("wed");
      $schedule->thu =  $request->get("thu");
      $schedule->fri =  $request->get("fri");
      $schedule->sat =  $request->get("sat");
      $schedule->sun =  $request->get("sun");
      $schedule->save();

      $note_id = new NoteSchedule();
      $note_id->schedule_id = $schedule->id;
      $note_id->element = "id";
      $note_id->body = "";
      $note_id->save();

      $note_start = new NoteSchedule();
      $note_start->schedule_id = $schedule->id;
      $note_start->element = "start";
      $note_start->body = "";
      $note_start->save();

      $note_end = new NoteSchedule();
      $note_end->schedule_id = $schedule->id;
      $note_end->element = "end";
      $note_end->body = "";
      $note_end->save();

      $note_mon = new NoteSchedule();
      $note_mon->schedule_id = $schedule->id;
      $note_mon->element = "mon";
      $note_mon->body = "";
      $note_mon->save();

      $note_tue = new NoteSchedule();
      $note_tue->schedule_id = $schedule->id;
      $note_tue->element = "tue";
      $note_tue->body = "";
      $note_tue->save();

      $note_wed = new NoteSchedule();
      $note_wed->schedule_id = $schedule->id;
      $note_wed->element = "wed";
      $note_wed->body = "";
      $note_wed->save();

      $note_thu = new NoteSchedule();
      $note_thu->schedule_id = $schedule->id;
      $note_thu->element = "thu";
      $note_thu->body = "";
      $note_thu->save();

      $note_fri = new NoteSchedule();
      $note_fri->schedule_id = $schedule->id;
      $note_fri->element = "fri";
      $note_fri->body = "";
      $note_fri->save();

      $note_sat = new NoteSchedule();
      $note_sat->schedule_id = $schedule->id;
      $note_sat->element = "sat";
      $note_sat->body = "";
      $note_sat->save();

      $note_sun = new NoteSchedule();
      $note_sun->schedule_id = $schedule->id;
      $note_sun->element = "sun";
      $note_sun->body = "";
      $note_sun->save();

      Toastr::success("Create successfully", "Success");
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function update($id, Request $request) {
    try {
      StaffSchedule::where("id", $id)->update([
        "start" => date("G:i", strtotime($request->get("in_time"))),
        "end" => date("G:i", strtotime($request->get("out_time"))),
        "mon" => $request->get("mon"),
        "tue" => $request->get("tue"),
        "wed" => $request->get("wed"),
        "thu" => $request->get("thu"),
        "fri" => $request->get("fri"),
        "sat" => $request->get("sat"),
        "sun" => $request->get("sun")
      ]);
      Toastr::success("Update successfully", "Success");
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function delete($id) {
    try {
      StaffSchedule::where("id", $id)->delete();
      Toastr::success("Delete successfully", "Success");
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }

  public function note(Request $request) {
    try {
      $payload = StaffSchedule::where("id", $request->get("schedule_id"))->get($request->get("element"))->first()[$request->get("element")];
      if ($payload === "") {
        Toastr::warning("Operation Failed", "Failed");
        return redirect()->back();
      }

      if (!NoteSchedule::where("schedule_id", $request->get("schedule_id"))
                       ->where("element", $request->get("element"))
                       ->get()
                       ->first()
         ) {
        $note = new NoteSchedule();
        $note->schedule_id = $request->get("schedule_id");
        $note->element = $request->get("element");
        $note->body = $request->get("note");
        $note->save();
      } else {
        NoteSchedule::where("schedule_id", $request->get("schedule_id"))->where("element", $request->get("element"))->update([
          "schedule_id" => $request->get("schedule_id"),
          "element" => $request->get("element"),
          "body" => $request->get("note")
        ]);
      };
      Toastr::success("Add note successfully", "Success");
      return redirect()->back();
    } catch (\Exception $e) {
      Toastr::error("Operation Failed", "Failed");
      return redirect()->back();
    }
  }
}