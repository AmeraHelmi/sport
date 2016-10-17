<input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
      <tr>
          <td style="width: 48%">
              <div class="form-group">
                  <label for="exampleInputPassword1">أسم الاستاد</label>
                  <input type="text" name="name" required placeholder="Stadium name" class="form-control">
                  <span class="help-block with-errors errorName"></span>
              </div>
          </td>
          <td style="width: 48%; padding-left: 2%;">
              <div class="form-group">
                  <label for="exampleInputPassword1">السعه</label>
                  <input type="number" name="capacity" required class="form-control">
                  <span class="help-block with-errors errorName"></span>
              </div>
          </td>
      </tr>
      <tr>
          <td style="width: 48%;">
              <div class="form-group">
                  <label for="exampleInputPassword1">الأرضيه</label>
                  <input type="text" name="ground" required placeholder="ground" class="form-control">
                  <span class="help-block with-errors errorName"></span>
              </div>
          </td>
          <td style="width: 48%;  padding-left: 2%; ">
              <div class="form-group">
                  <label for="exampleInputFile">أختيار الدوله</label>
                  <select id="country-id"  class="form-control" onchange="show()" name="country_id">
                        @foreach($countries as $country_id => $country_name)
                        <option value="{!! $country_id !!}">{!! $country_name !!}</option>
                        @endforeach
                  </select>
              </div>
          </td>
      </tr>
</table>
<div class="form-group" id="show-city">
    <label for="exampleInputFile">أختيار المدينه</label>
    <select  class="form-control" name="city_id" id="city-id">
    </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">معلومات أضافيه</label>
    <textarea rows="2" cols="30" name="addition_info" class="form-control"></textarea>
</div>
<div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-primary btn-file"><span class="fileupload-new">الصوره</span>
    <span class="fileupload-exists">تغير</span>
    <input type="file" name="flag" /></span>
    <span class="fileupload-preview"></span>
    <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
</div>
<div class="form-group" style="display:none;">
    <label for="exampleInputFile">pic path</label>
    <input type="text" name="flagcountry" id="flag">
</div>
