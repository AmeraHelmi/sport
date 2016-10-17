<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
    <tr>
        <div class="form-group">
            <label for="exampleInputFile">أختيار الفريق</label>
            <select id="team_type"  class="form-control" onchange="select_team()">
                  <option selected><bdi>أختر الفريق</bdi></option>
                  <option value="نادى"><bdi>نادى</bdi></option>
                  <option value="منتخب"><bdi>منتخب</bdi></option>
            </select>
        </div>
    </tr>
    <tr>
        <div class="form-group" id="showteam"  style="display:none;">
            <label for="exampleInputFile">اختيار نادى</label>
            <select  class="form-control"name="team_id" id="team_id" >
            </select>
        </div>
    </tr>
    <tr>
        <div class="form-group">
            <label for="exampleInputFile">أختيار مدرب</label>
            <select id="coach"  class="form-control" name="coach_id">
                  <option selected>أختيار مدرب</option>
                  @foreach($coaches as $coach_id => $coach_name)
                  <option value="{!! $coach_id !!}">{!! $coach_name !!}</option>
                  @endforeach
            </select>
        </div>
    </tr>
    <tr>
        <td style="width: 48%">
            <div class="form-group">
                <label class="control-label" style="display: block;">من</label>
                <input id="datetime1" data-format="YYYY-MM-DD" data-template="YYYY / MM / DD" name="from_date" value="" type="text">
            </div>
            <input type="checkbox" name="present[]" id="present" value="asd" onclick="disable_todate()"> حتى الأن

        </td>
        <td style="width: 48%; padding-left: 2%;" >
            <div class="form-group" id="td_to">
                <label class="control-label" style="display: block;">الى</label>
                <input id="datetime2" data-format="YYYY-MM-DD" data-template="YYYY / MM / DD" name="to_date" value="" type="text">
            </div>
        </td>
    </tr>
</table>
      <div class="form-group">
          <label for="exampleInputPassword1">عقد</label>
          <input type="number" name="contract"  placeholder="contract amount" class="form-control">
          <span class="help-block with-errors errorName"></span>
      </div>


<div class="form-group">
    <label for="exampleInputPassword1">نبذه عن بطولات المدرب مع النادى</label>
    <textarea rows="2" cols="30"  name="addition_info" class="form-control" ></textarea>
    <span class="help-block with-errors errorName"></span>
</div>
