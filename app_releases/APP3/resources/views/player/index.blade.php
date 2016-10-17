@extends('admin')
@section('styles')
<style>
.image {
    width: 100%;
    height: 100%;
}
.image img {
    -webkit-transition: all 1s ease; /* Safari and Chrome */
    -moz-transition: all 1s ease; /* Firefox */
    -ms-transition: all 1s ease; /* IE 9 */
    -o-transition: all 1s ease; /* Opera */
    transition: all 1s ease;
}
.image img:hover  {
    -webkit-transform:scale(7.5); /* Safari and Chrome */
    -moz-transform:scale(7.5); /* Firefox */
    -ms-transform:scale(7.5); /* IE 9 */
    -o-transform:scale(7.5); /* Opera */
     transform:scale(7.5);
}
.clearfix{*zoom:1;}.clearfix:before,.clearfix:after{display:table;content:"";line-height:0;}
.clearfix:after{clear:both;}
.hide-text{font:0/0 a;color:transparent;text-shadow:none;background-color:transparent;border:0;}
.input-block-level{display:block;width:100%;min-height:30px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
.btn-file{overflow:hidden;position:relative;vertical-align:middle;}.btn-file>input{position:absolute;top:0;right:0;margin:0;opacity:0;filter:alpha(opacity=0);transform:translate(-300px, 0) scale(4);font-size:23px;direction:ltr;cursor:pointer;}
.fileupload{margin-bottom:9px;}.fileupload .uneditable-input{display:inline-block;margin-bottom:0px;vertical-align:middle;cursor:text;}
.fileupload .thumbnail{overflow:hidden;display:inline-block;margin-bottom:5px;vertical-align:middle;text-align:center;}.fileupload .thumbnail>img{display:inline-block;vertical-align:middle;max-height:100%;}
.fileupload .btn{vertical-align:middle;}
.fileupload-exists .fileupload-new,.fileupload-new .fileupload-exists{display:none;}
.fileupload-inline .fileupload-controls{display:inline;}
.fileupload-new .input-append .btn-file{-webkit-border-radius:0 3px 3px 0;-moz-border-radius:0 3px 3px 0;border-radius:0 3px 3px 0;}
.thumbnail-borderless .thumbnail{border:none;padding:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;-webkit-box-shadow:none;-moz-box-shadow:none;box-shadow:none;}
.fileupload-new.thumbnail-borderless .thumbnail{border:1px solid #ddd;}
.control-group.warning .fileupload .uneditable-input{color:#a47e3c;border-color:#a47e3c;}
.control-group.warning .fileupload .fileupload-preview{color:#a47e3c;}
.control-group.warning .fileupload .thumbnail{border-color:#a47e3c;}
.control-group.error .fileupload .uneditable-input{color:#b94a48;border-color:#b94a48;}
.control-group.error .fileupload .fileupload-preview{color:#b94a48;}
.control-group.error .fileupload .thumbnail{border-color:#b94a48;}
.control-group.success .fileupload .uneditable-input{color:#468847;border-color:#468847;}
.control-group.success .fileupload .fileupload-preview{color:#468847;}
.control-group.success .fileupload .thumbnail{border-color:#468847;}
</style>

@endsection
@section('content')
<div class="content-wrapper">
	 <div class="container-fluid">
			  <div class="row">
				    <div class="col-md-12">
						<br>
						<ul class="alerts-list delete"></ul>
            <ul class="alerts-list" style="display:none;" id="show">
              <li>
                  <div class="alert alert-success alert-dismissable">
                      <i class="icon-remove-sign"></i> تم أضافة لاعب بنجــــــــــاح!.
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  </div>
              </li>
            </ul>
            <ul class="alerts-list" style="display:none;" id="showupdate">
              <li>
                  <div class="alert alert-success alert-dismissable">
                      <i class="icon-remove-sign"></i> تم تحديث بيانات اللاعب!.
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  </div>
              </li>
            </ul>
            <a class="btn btn-primary" data-toggle="modal" data-target="#addModal" style="margin-bottom:20px;" >
                <i class="fa fa-plus-circle"  style="font-size: 18px;"></i> أضافة لاعب
            </a>
            <a class="btn btn-primary add" data-toggle="modal" data-target="#best_player" style="margin-bottom:20px;" >
                <i class="glyphicon glyphicon-arrow-left"></i>  أاضافة افضل لاعب
            </a>
						<div class="widget-content-white glossed">
								<div class="padded">
                  <table id="players" class="table table-striped table-bordered table-hover datatable">
                      <thead>
                          <tr>
                            <th class="col-md-1">أسم اللاعب</th>
                            <th class="col-md-1">أسم الدوله</th>
                            <th class="col-md-1">الصوره</th>
                            <th class="col-md-1">القدم المفضله</th>
                            <th class="col-md-1">الوزن</th>
                            <th class="col-md-1">الطول </th>
                            <th class="col-md-1">السرعه</th>
                            <th class="col-md-1">المركز</th>
                            <th class="col-md-1">المنتخب</th>
                            <th class="col-md-1">خيارات</th>
                         </tr>
                     </thead>
                     <tbody>
                        @foreach ($tableData->getData()->data as $row)
                        <tr>
                           <td>{{ $row->playername }}</td>
                           <td>{{ $row->countryname }}</td>
                           <td>{!! $row->flag !!}</td>
                           <td>{{ $row->player_prefered_foot }}</td>
                           <td>{{ $row->player_weight }}</td>
                           <td>{{ $row->player_height }}</td>
                           <td>{{ $row->player_speed }}</td>
                           <td>{{ $row->player_position }}</td>
                           <td>{{ $row->team_name }}</td>
                           <td>{!!$row->actions !!}</td>
                        </tr>
                        @endforeach
                     </tbody>
                 </table>
							</div>
				</div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i> أضافة لاعب</h4>
                   </div>
                   <form role="form" method="POST" class="addForm" action="{{ url('/player/store') }}" data-toggle="validator" enctype="multipart/form-data" >
                       <div class="modal-body">
                         @include('player.form')
                       </div>
                       <div class="modal-footer">
                           <button type="submit" id="submitForm" class="btn btn-primary">موافق</button>
                           <button type="submit" class="btn btn-primary" id="addNew">موافق وأضافة جديد</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
<!-- افضل لاعب -->
<div class="modal fade" id="best_player" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>تفعيل افضل لاعب</h4>

                    <form role="form" method="POST"  class="today_form" action="{{ url('/player/best_player') }}" data-toggle="validator">
                        <div class="modal-body">
                                @include('player.best_player')
                        </div>
                      <div class="modal-footer">
                          <button type="submit" id="submitForm_today" class="btn btn-primary">موافق</button>
                          <button type="submit" class="btn btn-primary" id="addNew">موافق وأضافة جديد</button>
                      </div>
                </form>
    </div>
</div>
</div>
</div>



            <div class="modal fade" id="editplayerModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="editEmployeeModalLabel"><i class="fa fa-pencil"></i> تحديث</h4>
                        </div>
                        <form role="form"  method="POST" class="editForm" data-id="" action="{{ url('/player/update') }}" data-toggle="validator" enctype="multipart/form-data">
                            <div class="modal-body">
                                @include('player.formupdate')
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="submit" class="btn btn-primary">تحديث</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</div>
</div>
</div>
</div>
</div>
@endsection

	@section('scripts')

	  <script src="http://malsup.github.com/jquery.form.js"></script>

    <script>

  $(function(){
      $('#datetime12').combodate();
  });

  </script>

	<script type="text/javascript">
  function select_team(){
  $team_type=$('#team_type').val();
  $.ajax({
      url: '{{ url('player/get_teams') }}',
      type: "POST",
    data:{
        team_type:$team_type
      },
      success:function(res)
      {
        $('#showteam1').show();
        $('#team1').html(res);
      },
      error:function(){
      }
    });
  }
  function select_player(){
  $team_id=$('#team1').val();
  $team_type=$('#team_type').val();
  $.ajax({
      url: '{{ url('player/select2') }}',
      type: "POST",
    data:{
        team_id:$team_id,
        team_type:$team_type
      },
      success:function(res)
      {
        $('#showplayer').show();
        // alert(res);
        $('#player').html(res);
      },
      error:function(){
        alert("error");
      }
    });
  }

		function selectCity(){
		$country_id=$('#country').val();
		$.ajax({
				url: '{{ url('player/getCities') }}',
				type: "POST",
				data:{
					country_id:$country_id
				},
				success: function(res){
			   		$('#showCity').show();
						$('#cityID').html(res);
				},
				error: function(){
				}
			});

	}
//update
  function selectCity2(){
  $country_id=$('#country2').val();
  $.ajax({
      url: '{{ url('player/getCities') }}',
      type: "POST",
      data:{
        country_id:$country_id
      },
      success: function(res){
          $('#show-City').show();
          $('#cityID2').html(res);
      },
      error: function(){
      }
    });

}

$("#submitForm_today").on('click', function(e){
    $('#best_player').modal('hide');
    $('#show').show(100);

});
$("#best_player form").on('submit', function(e){
    if (!e.isDefaultPrevented())
    {
        var self = $(this);
        $.ajax({
            url: '{{ url('/player/best_player') }}',
            type: "POST",
            data: self.serialize(),
            success: function(res){
                $('.best_player')[0].reset();
                $('.alerts-list').append(
                    '<li>\
                        <div class="alert alert-success alert-dismissable">\
                            <i class="icon-check-sign"></i>تم  اضافة افضل لاعب !\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                        </div>\
                    </li>');
            },
            error: function(){
                $('#best_player').modal('hide');
                $('.alerts-list').append(
                    '<li>\
                        <div class="alert alert-danger alert-dismissable">\
                            <i class="icon-remove-sign"></i> <strong>Opps!</strong>حدث خطأ.\
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                        </div>\
                    </li>');
            }
        });
        e.preventDefault();
    }
 });

  function show(){

  $country_id=$('#country-id').val();

  $.ajax({

      url: '{{ url('player/getCities') }}',

      type: "POST",

      data:{

        country_id:$country_id

      },

      success: function(res){

          $('#city-id').html(res);

      },

      error: function(){

      }

    });

}

	  !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)

	$(document).ready(function() {

    show();

    //addcountry

    $('.addForm').ajaxForm(function() {

    $('.addForm')[0].reset();

    $('#show').show(100);

    oTable.ajax.reload();

    oTable.draw();

        });



    //Updatecountry

    $('.editForm').ajaxForm(function() {

    $('#showupdate').show(100);

    $('#editplayerModal').modal('hide');

    oTable.ajax.reload();

    oTable.draw();

        });



		function populateForm(response, frm) {

        var i;

        for (i in response) {

            if (i in frm.elements)

                frm.elements[i].value = response[i];

        }

    }



		$("#submitForm").on('click', function(e){

        $('#addModal').modal('hide');

    });



	     /* Edit Form */

	     $(document.body).validator().on('click', '.edit', function() {

	    var self = $(this);

	         self.button('loading');

	         $.ajax({

	             url: "{{ url('player') }}" + "/" + self.data('id') + "/edit" ,

	             type: "GET",

	             success: function(res){

	                 self.button('reset');

	                 $data = JSON.parse(res.data);

	                 populateForm($data, document.getElementsByClassName("editForm")[0] );

	                 $('#editplayerModal form').attr("data-id", self.data('id') );

	                 $('#editplayerModal').modal('show');

	             },

	             error: function(){

	                 self.button('reset');


                  $('.alerts-list').append(
                       '<li>\
                           <div class="alert alert-danger alert-dismissable">\
                               <i class="icon-remove-sign"></i> <strong>Opps!</strong> حدث خطأ.\
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                           </div>\
                       </li>');

	             }

	         });

	     });





							oTable = $('#players').DataTable({

								"processing": true,

								"serverSide": true,

								"responsive": true,

								"deferLoading": {{ $tableData->getData()->recordsFiltered }},

								"columns": [

										{data: 'playername', name: 'playername'},

										{data: 'countryname', name: 'countryname'},

                    {data: 'flag',  name: 'flag'},

                    {data: 'player_prefered_foot', name: 'player_prefered_foot'},

                    {data: 'player_weight', name: 'player_weight'},

                    {data: 'player_height', name: 'player_height'},

		{data: 'player_speed', name: 'player_speed'},

				{data: 'player_position', name: 'player_position'},

{data: 'team_name', name: 'team_name'},

				{data: 'actions', name: 'actions', orderable: false, searchable: false}

								]

							});

});

</script>

<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>



	@endsection
