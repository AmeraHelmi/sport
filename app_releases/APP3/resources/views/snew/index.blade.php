@extends('admin')
@section('styles')
<style>
.tabs
{
    width:100%;
    display:inline-block;
}
.tab-links:after
{
      display:block;
      clear:both;
      content:'';
}
.tab-links li
{
      margin:0px 5px;
      float:right;
      list-style:none;
}
.tab-links a
{
      padding:9px 15px;
      display:inline-block;
      border-radius:3px 3px 0px 0px;
      background:#7FB5DA;
      font-size:16px;
      font-weight:600;
      color:#4c4c4c;
      transition:all linear 0.15s;
}
.tab-links a:hover
{
      background:#a7cce5;
      text-decoration:none;
}
li.active a, li.active a:hover
{
      background:#fff;
      color:#4c4c4c;
}
.tab-content
{
      padding:15px;
      border-radius:3px;
      box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
      background:#fff;
}
.tab
{
      display:none;
}
.tab.active
{
      display:block;
}
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
           						<i class="icon-remove-sign"></i>تم أضافة خبر بنجـــــــــــاح!.
           						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       						</div>
							</li>
						</ul>
						<ul class="alerts-list" style="display:none;" id="showupdate">
							<li>
     							<div class="alert alert-success alert-dismissable">
           						<i class="icon-remove-sign"></i> تم تحديث الخبر بنجـــــــــــاح!.
           						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       						</div>
							</li>
						</ul>
						<a class="btn btn-primary add" data-toggle="modal" data-target="#addModal" style="margin-bottom:20px;" >
							<i class="fa fa-plus-circle"  style="font-size: 18px;"></i> أضافة خبر
						</a>

            <a class="btn btn-primary add" data-toggle="modal" data-target="#today_new" style="margin-bottom:20px;" >
                <i class="glyphicon glyphicon-arrow-left"></i>  أضافة خبر اليوم
            </a>

            <a class="btn btn-info add" data-toggle="modal" data-target="#today_new_update" style="margin-bottom:20px;" >
                <i class="glyphicon glyphicon-arrow-left"></i>  تعديل خبر اليوم
            </a>

						<div class="widget-content-white glossed">
								<div class="padded">
										<table id="matchs" class="table table-striped table-bordered table-hover datatable">
													<thead>
															<tr>
																	<th class="col-md-3">عنوان الخبر</th>
																	<th class="col-md-2">صورة الخبر </th>
                                  <th class="col-md-2">التاريخ</th>
                                  <th class="col-md-2">الفئه</th>
																	<th class="col-md-3">خيارات</th>
																</tr>
													</thead>
													<tbody>
													@foreach ($tableData->getData()->data as $row)
															<tr>
																	<td>{{ $row->title }}</td>
																	<td>{!! $row->flag !!}</td>
                                  <td>{{ $row->date }}</td>
																	<td>{{ $row->cat_name }}</td>
																	<td>{!!$row->actions !!}</td>
															</tr>
													@endforeach
												  </tbody>
										</table>
							</div>
				</div>
        <!-- data-backdrop="static" data-keyboard="false" -->
				<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" >
    				<div class="modal-dialog">
        				<div class="modal-content">
            				<div class="modal-header">
                				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                				<h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>أضافة  خبر</h4>

                            <form role="form" method="POST" class="addForm" action="{{ url('/snew/store') }}" data-toggle="validator">
                                <div class="modal-body">
                                        @include('snew.form')
                                </div>
                              <div class="modal-footer">
                                  <button type="submit" id="submitForm" class="btn btn-primary">موافق</button>
                                  <button type="submit" class="btn btn-primary" id="addNew">موافق وأضافة جديد</button>
                              </div>
												</form>
						</div>
        </div>
    </div>
</div>
{{-- //خبر اليوم --}}
<div class="modal fade" id="today_new" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>تفعيل خبر اليوم</h4>

                    <form role="form" method="POST"  class="today_form" action="{{ url('/snew/today_new') }}" data-toggle="validator">
                        <div class="modal-body">
                                @include('snew.today_new_form')
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

{{-- // تعديل خبر اليوم --}}
<div class="modal fade" id="today_new_update" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>تعديل خبر اليوم</h4>

                    <form role="form" method="POST"  class="today_edit_form" action="{{ url('/snew/today_new_update') }}" data-toggle="validator">
                        <div class="modal-body">
                                @include('snew.today_new_form_update')
                        </div>
                      <div class="modal-footer">
                          <button type="submit" id="" class="btn btn-primary">تعديل</button>
                      </div>
                </form>
    </div>
</div>
</div>
</div>

<div class="modal fade" id="editgroupModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addModalLabel"><i class="fa fa-plus-circle"></i>أضافة خبر</h4>

                    <form role="form" method="POST" class="editForm" action="{{ url('/snew/update') }}" data-toggle="validator">
                        <div class="modal-body">
                                @include('snew.formupdate')
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
</div>
@endsection

@section('scripts')
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
  $(function(){
  $('#datetime1').combodate();
});

//show_news
  function selectnews(){
  $category_id=$('#category_id').val();
  $.ajax({
      url: '{{ url('snew/get_news') }}',
      type: "POST",
      data:{
        category_id:$category_id
      },
      success: function(res){
          $('#shownews').show();
          $('#show_news').html(res);
      },
      error: function(){
      }
    });

}

//show_news_update
  function selectnews2(){
  $category_id=$('#category_id2').val();
  $.ajax({
      url: '{{ url('snew/get_news') }}',
      type: "POST",
      data:{
        category_id:$category_id
      },
      success: function(res){
          $('#shownews2').show();
          $('#show_news2').html(res);
      },
      error: function(){
      }
    });

}

  </script>
  <script type="text/javascript">
      !function(e){var t=function(t,n){this.$element=e(t),this.type=this.$element.data("uploadtype")||(this.$element.find(".thumbnail").length>0?"image":"file"),this.$input=this.$element.find(":file");if(this.$input.length===0)return;this.name=this.$input.attr("name")||n.name,this.$hidden=this.$element.find('input[type=hidden][name="'+this.name+'"]'),this.$hidden.length===0&&(this.$hidden=e('<input type="hidden" />'),this.$element.prepend(this.$hidden)),this.$preview=this.$element.find(".fileupload-preview");var r=this.$preview.css("height");this.$preview.css("display")!="inline"&&r!="0px"&&r!="none"&&this.$preview.css("line-height",r),this.original={exists:this.$element.hasClass("fileupload-exists"),preview:this.$preview.html(),hiddenVal:this.$hidden.val()},this.$remove=this.$element.find('[data-dismiss="fileupload"]'),this.$element.find('[data-trigger="fileupload"]').on("click.fileupload",e.proxy(this.trigger,this)),this.listen()};t.prototype={listen:function(){this.$input.on("change.fileupload",e.proxy(this.change,this)),e(this.$input[0].form).on("reset.fileupload",e.proxy(this.reset,this)),this.$remove&&this.$remove.on("click.fileupload",e.proxy(this.clear,this))},change:function(e,t){if(t==="clear")return;var n=e.target.files!==undefined?e.target.files[0]:e.target.value?{name:e.target.value.replace(/^.+\\/,"")}:null;if(!n){this.clear();return}this.$hidden.val(""),this.$hidden.attr("name",""),this.$input.attr("name",this.name);if(this.type==="image"&&this.$preview.length>0&&(typeof n.type!="undefined"?n.type.match("image.*"):n.name.match(/\.(gif|png|jpe?g)$/i))&&typeof FileReader!="undefined"){var r=new FileReader,i=this.$preview,s=this.$element;r.onload=function(e){i.html('<img src="'+e.target.result+'" '+(i.css("max-height")!="none"?'style="max-height: '+i.css("max-height")+';"':"")+" />"),s.addClass("fileupload-exists").removeClass("fileupload-new")},r.readAsDataURL(n)}else this.$preview.text(n.name),this.$element.addClass("fileupload-exists").removeClass("fileupload-new")},clear:function(e){this.$hidden.val(""),this.$hidden.attr("name",this.name),this.$input.attr("name","");if(navigator.userAgent.match(/msie/i)){var t=this.$input.clone(!0);this.$input.after(t),this.$input.remove(),this.$input=t}else this.$input.val("");this.$preview.html(""),this.$element.addClass("fileupload-new").removeClass("fileupload-exists"),e&&(this.$input.trigger("change",["clear"]),e.preventDefault())},reset:function(e){this.clear(),this.$hidden.val(this.original.hiddenVal),this.$preview.html(this.original.preview),this.original.exists?this.$element.addClass("fileupload-exists").removeClass("fileupload-new"):this.$element.addClass("fileupload-new").removeClass("fileupload-exists")},trigger:function(e){this.$input.trigger("click"),e.preventDefault()}},e.fn.fileupload=function(n){return this.each(function(){var r=e(this),i=r.data("fileupload");i||r.data("fileupload",i=new t(this,n)),typeof n=="string"&&i[n]()})},e.fn.fileupload.Constructor=t,e(document).on("click.fileupload.data-api",'[data-provides="fileupload"]',function(t){var n=e(this);if(n.data("fileupload"))return;n.fileupload(n.data());var r=e(t.target).closest('[data-dismiss="fileupload"],[data-trigger="fileupload"]');r.length>0&&(r.trigger("click.fileupload"),t.preventDefault())})}(window.jQuery)
		$(document).ready(function()
		{
			jQuery('.tabs .tab-links a').on('click', function(e)
			{
	         var currentAttrValue = jQuery(this).attr('href');
	         // Show/Hide Tabs
	         jQuery('.tabs ' + currentAttrValue).show().siblings().hide();
	         // Change/remove current tab to active
	         jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	         e.preventDefault();
	     });



		function populateForm(response, frm)
		{
        var i;
        for (i in response) {
            if (i in frm.elements)
                frm.elements[i].value = response[i];
        }
    }

		$("#submitForm").on('click', function(e){
        $('#addModal').modal('hide');
    });

    $("#submitForm_today").on('click', function(e){
        $('#today_new').modal('hide');
    });

    $('.addForm').ajaxForm(function() {
    $('.addForm')[0].reset();
    $('#show').show(100);
    oTable.ajax.reload();
    oTable.draw();
        });

    //Update
    $('.editForm').ajaxForm(function() {
    $('#showupdate').show(100);
    $('#editgroupModal').modal('hide');
    oTable.ajax.reload();
    oTable.draw();
        });


   /* Edit Form */
   $(document.body).validator().on('click', '.edit', function() {
  var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/edit" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $data = JSON.parse(res.data);
               populateForm($data, document.getElementsByClassName("editForm")[0] );
               $('#editgroupModal form').attr("data-id", self.data('id') );
               $('#editgroupModal').modal('show');
           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

   /* update publish */
   $(document.body).validator().on('click', '.publish', function() {
       var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/publish" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-success alert-dismissable">\
                           <i class="icon-remove-sign"></i>تم نشر الخبر بنجــــــــاح.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
                window.location.reload(1000);
           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

   /* update today_new */
   $("#today_new form").on('submit', function(e){
       if (!e.isDefaultPrevented())
       {
           var self = $(this);
           $.ajax({
               url: '{{ url('/snew/today_new') }}',
               type: "POST",
               data: self.serialize(),
               success: function(res){
                   $('.today_form')[0].reset();
                   $('.alerts-list').append(
                       '<li>\
                           <div class="alert alert-success alert-dismissable">\
                               <i class="icon-check-sign"></i>تم تفعيل خبر اليوم بنجـــــاح!\
                               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                           </div>\
                       </li>');
               },
               error: function(){
                   $('#today_new').modal('hide');
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

    /* edit today_new */
    $("#today_new_update form").on('submit', function(e){
        if (!e.isDefaultPrevented())
        {
            var self = $(this);
            $.ajax({
                url: '{{ url('/snew/today_new_update') }}',
                type: "POST",
                data: self.serialize(),
                success: function(res){
                    $('.today_edit_form')[0].reset();
                    $('#today_new_update').modal('hide');
                    $('.alerts-list').append(
                        '<li>\
                            <div class="alert alert-success alert-dismissable">\
                                <i class="icon-check-sign"></i>تم تحديث خبر اليوم بنجــاح!\
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                            </div>\
                        </li>');
                },
                error: function(){
                    $('#today_new_update').modal('hide');
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

   /* Disable publish */
   $(document.body).validator().on('click', '.nopublish', function() {
       var self = $(this);
       self.button('loading');
       $.ajax({
           url: "{{ url('snew') }}" + "/" + self.data('id') + "/nopublish" ,
           type: "GET",
           success: function(res){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-success alert-dismissable">\
                           <i class="icon-remove-sign"></i>تم  الغاء الخبر بنجاح.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');

                    window.location.reload(1000);

           },
           error: function(){
               self.button('reset');
               $('.alerts-list').append(
                   '<li>\
                       <div class="alert alert-danger alert-dismissable">\
                           <i class="icon-remove-sign"></i>حدث خطا ما.\
                           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\
                       </div>\
                   </li>');
           }
       });
   });

	oTable = $('#matchs').DataTable({
								"processing": true,
								"serverSide": true,
								"responsive": true,
								"deferLoading": {{ $tableData->getData()->recordsFiltered }},
								"columns": [
										{data: 'title', name: 'title'},
										{data: 'flag', name: 'flag'},
                    {data: 'date',  name: 'date'},
                    {data: 'cat_name',  name: 'cat_name'},
										{data: 'actions', name: 'actions', orderable: false, searchable: false}
								]
							});
							$('#addModal').on('shown.bs.modal', function () {
										$('.addForm')[0].reset();
										$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
										$('.chosen-select-multiple', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
								});

								$('#addModal form2').on('shown.bs.modal', function () {
											$('.addForm')[0].reset();
											$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
											$('.gg', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
									});
								$('#editgroupModal').on('shown.bs.modal', function () {
										$('.chosen-select-it', this).chosen({disable_search_threshold: 10});
										$('.chosen-select-multiple', this).chosen({disable_search_threshold: 10}).trigger("chosen:updated");
								});
								// $('#groupModal').on('shown.bs.modal', function () {
								//     $('.chosen-select-it', this).chosen({disable_search_threshold: 10});
								//     $('.chosen-select-multiple', this).chosen({disable_search_threshold: 10});
								// });
								$('.group-search').chosen({disable_search_threshold: 10});
								$('.gg').chosen({disable_search_threshold: 10});
});
</script>
<script src="{{ asset('/admin-ui/js/for_pages/table.js') }}"></script>

@endsection
