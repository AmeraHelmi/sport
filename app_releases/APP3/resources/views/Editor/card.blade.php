<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="matchid" value="{{ $matchdetail->match_id }}">
<input type="hidden" name="T1" value="{{ $matchdetail->T1ID }}">
<input type="hidden" name="T2" value="{{ $matchdetail->T2ID }}">
<div class="form-group">
<label for="exampleInputFile">Select team</label>
<select id="team_id6"  class="form-control" onchange="card()" name="team_id">
 <option selected>select Team</option>
 @foreach($match as  $T)
<option value="{!! $T->T1ID !!}">{!! $T->T1name !!}</option>
<option value="{!! $T->T2ID !!}">{!! $T->T2name !!}</option>
@endforeach
</select>
</div>
<div class="form-group" style="display:none;" id="showplayer6">
<label for="exampleInputFile">Select player</label>
<select id="player_id6"  class="form-control"  name="player_id">
</select>
</div>
<div class="form-group" >
<label for="exampleInputFile">card color</label>
<br>
<label class="radio-inline">
     <input type="radio" name="cardcolor" value="yellow"><img width="20px" height="20px" src="images/2000px-Yellow_card.svg.png">
   </label>
   <label class="radio-inline">
     <input type="radio" name="cardcolor" value="red"><img width="20px" height="20px" src="images/2000px-Red_card.svg.png">
   </label>


</div>
