<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputFile" style="float:right">أختيار الفريق</label>
<select id="team_type"  class="form-control" onchange="select_team()">
  <option selected><bdi>أختر الفريق</bdi></option>
 <option value="نادى"><bdi>نادى</bdi></option>
 <option value="منتخب"><bdi>منتخب</bdi></option>
</select>
</div>
<table>
  <tr>
      <td style="width: 48%">
        <div class="form-group" id="showteam1"  style="display:none;">
        <label for="exampleInputFile" style="float:right">النادى </label>
        <select  class="form-control"name="team1_id" id="team1" >
        </select>
        </div>
      </td>

</tr>
</table>
