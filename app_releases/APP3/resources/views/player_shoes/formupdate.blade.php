<input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
<label for="exampleInputFile">أختيار ماركة الحذاء</label>
<select  class="form-control"
 name="shoes_id">
 @foreach($shoes as $shoes_id => $brand)
  <option value="{!! $shoes_id !!}">{!! $brand !!}</option>
  @endforeach
</select>
</div>
<div class="form-group">
<td style="width: 48%">
<label for="exampleInputFile">المباراه</label>
<select  class="form-control"  id="match"
 name="match_id">
 @foreach($matches as $key=>$value)
  <option value="{!! $value['matchid'] !!}">{!! $value['team1_name'] !!} - {!! $value['team2_name'] !!}</option>
  @endforeach
</select>

</div>

<div class="form-group">
<label for="exampleInputFile">أختيار النادى</label>
<select  class="form-control" onchange="show()" id="team-id" name="team_id">
 @foreach($teams as $team_id => $team_name)
  <option value="{!! $team_id !!}">{!! $team_name !!}</option>
  @endforeach
</select>
</div>

<div class="form-group"  id="show_players">
<label for="exampleInputFile">أختيار اللاعب</label>
<select  class="form-control" id="player_ID" name="player_id">
</select>
</div>
