@extends('admin.layouts.modal') @section('content')

<form class="form-horizontal" method="post" id="fupload" enctype="multipart/form-data"
	action="@if (isset($employee)){{ URL::to('admin/employee/' . $employee->id . '/edit') }}@endif"
	autocomplete="off">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="tab-content" id="tabs" style="height: 510px ;">
                <ul class="nav nav-tabs">
                    <li ><a href="#tabs-1" data-toggle="tab">{{{
                                    trans('admin/modal.general') }}}</a></li>
                    <li ><a href="#tabs-2" data-toggle="tab">{{{
                            trans('admin/modal.edu') }}}</a></li>
                </ul>
		<div class="tab-pane " id="tabs-1">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="code">{{
						trans('admin/employee.code') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.code') }}" type="text"
							name="code" id="code"
							value="{{{ Input::old('code', isset($employee) ? $employee->code : null) }}}">
					</div>
				</div>
			</div>
                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="name">{{
						trans('admin/employee.name') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.name') }}" type="text"
							name="name" id="name"
							value="{{{ Input::old('name', isset($employee) ? $employee->name : null) }}}">
					</div>
				</div>
			</div>
                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="birthday">{{
						trans('admin/employee.birthday') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.birthday') }}" type="text"
							name="birthday" id="birthday"
							value="{{{ Input::old('birthday', isset($employee) ? str_replace('-','/',$employee->birthday) : null) }}}">
					</div>
				</div>
			</div>
			 <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="address">{{
						trans('admin/employee.address') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.address') }}" type="text"
							name="address" id="address"
							value="{{{ Input::old('address', isset($employee) ? $employee->address : null) }}}">
					</div>
				</div>
			</div>
			
                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="email">{{
						trans('admin/employee.email') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.email') }}" type="text"
							name="email" id="email"
							value="{{{ Input::old('email', isset($employee) ? $employee->email : null) }}}">
					</div>
				</div>
			</div>
                        
                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="telephone">{{
						trans('admin/employee.telephone') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.telephone') }}" type="text"
							name="telephone" id="telephone"
							value="{{{ Input::old('telephone', isset($employee) ? $employee->telephone : null) }}}">
					</div>
				</div>
			</div>

                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="confirm">{{
						trans('admin/employee.sex') }}</label>
					<div class="col-md-3">
						<select class="form-control" name="sex" id="sex">
                                                        <option value="male" {{{ ((isset($employee) && $employee->sex == 'male')? '
								selected="selected"' : '') }}} >Male</option>
                                                        <option value="female" {{{ ((isset($employee) && $employee->sex == 'female')? '
								selected="selected"' : '') }}} >Female</option>
                                                        <option value="other" {{{ ((isset($employee) && $employee->sex == 'other')? '
								selected="selected"' : '') }}} >other</option>
						</select>
					</div>

					<label class="col-md-2 control-label" for="confirm">{{
						trans('admin/employee.nationality') }}</label>
					<div class="col-md-3">
						<select class="form-control" name="nationality" id="nationality">
                                                        <option value="vn" {{{ ((isset($employee) && $employee->nationality == 'vn')? '
								selected="selected"' : '') }}} >Viet Nam</option>
                                                        <option value="uk" {{{ ((isset($employee) && $employee->nationality == 'uk')? '
								selected="selected"' : '') }}} >England</option>
                                                        <option value="sing" {{{ ((isset($employee) && $employee->nationality == 'sing')? '
								selected="selected"' : '') }}} >Singapore</option>
						</select>
					</div>
				</div>
			</div>
                      <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="start_date">{{
						trans('admin/employee.start_date') }}</label>
					<div class="col-md-8">
						<input class="form-control" tabindex="1"
							placeholder="{{ trans('admin/employee.start_date') }}" type="text"
							name="start_date" id="start_date"
							value="{{{ Input::old('start_date', isset($employee) ? str_replace('-','/',$employee->start_date) : null) }}}">
					</div>
				</div>
			</div>
                        <div class="col-md-12">
				<div class="form-group">
					<label class="col-md-3 control-label" for="photo">{{
						trans('admin/employee.photo') }}</label>
					<div class="col-md-5">
                                                <input name="photo"
							type="file" class="uploader" id="photo" value="Upload" />
                                        </div>        
                                    <div class="col-md-3" style="color: #C40D0D;font-style: italic;">support: jpeg, gif, png</div>   
					
				</div>
			</div>
		</div>
            
                <div class="tab-pane" id="tabs-2">                   
                    <table id="table" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>{{{ trans("admin/employee.no") }}}</th>
                                <th>{{{ trans("admin/employee.degree") }}}</th>
                                <th>{{{ trans("admin/employee.year") }}}</th>
                                <th>{{{ trans("admin/employee.university") }}}</th>
                            </tr>
                        </thead>
                        <tbody>
                         @if (isset($degree) && $count = count($degree) > 0 )    
                            @foreach($degree as  $key => $item) 
                             <tr class="odd" role="row"> 
                                 <td class="col-md-1">
                                     &nbsp;{{$key + 1}}
                                 </td>
                                 <td class="col-md-4">
                                     <input id="degree_{{$key + 1}}" maxlength="100" name="degree[]"  class="form-control" type="text" value="{{$item->degree}}"  />
                                 </td>
                                 <td  class="col-md-2">
                                     <input id="year_{{$key + 1}}" maxlength="100" name="year[]" class="form-control" type="number" value="{{$item->year}}"   />
                                 </td>
                                 <td>
                                     <input id="school_{{$key + 1}}" maxlength="100" name="school[]" class="form-control" type="text" value="{{$item->school}}"   />
                                 </td>
                             </tr> 
                             @endforeach
                         @else
                              <tr class="odd" role="row"> 
                                 <td class="col-md-1">
                                     &nbsp;1
                                 </td>
                                 <td class="col-md-4">
                                     <input id="degree_1" maxlength="100" name="degree[]"  class="form-control" type="text" value=""  />
                                 </td>
                                 <td  class="col-md-2">
                                     <input id="year_1" maxlength="100" name="year[]" class="form-control" type="number" value="2015"   />
                                 </td>
                                 <td>
                                     <input id="school_1" maxlength="100" name="school[]" class="form-control" type="text" value=""   />
                                 </td>
                             </tr> 
                         @endif    
                        </tbody>
                    </table>
                    <a class="btn btn-sm  btn-success" id="btn_add_edu">
                        <span class="glyphicon glyphicon-plus-sign" ></span>
                        {{trans("admin/modal.add") }}
                    </a>
                    <a class="btn btn-sm btn-default" id="btn_remove_edu">
                        <span class="glyphicon glyphicon-remove-circle" ></span>
                        {{trans("admin/modal.remove") }}
                    </a>
                </div>
	</div>
        
        <div style="clear: both;"></div>
        
	<div class="form-group">
		<div class="col-md-12">
			<button type="reset" class="btn btn-sm btn-warning close_popup">
				<span class="glyphicon glyphicon-ban-circle"></span> {{
				trans("admin/modal.cancel") }}
			</button>
			<button type="reset" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-remove-circle"></span> {{
				trans("admin/modal.reset") }}
			</button>
			<button type="submit" class="btn btn-sm btn-success">
				<span class="glyphicon glyphicon-ok-circle"></span> 
				    @if	(isset($employee))
				        {{ trans("admin/modal.edit") }}
				    @else
				        {{trans("admin/modal.create") }}
				    @endif
			</button>
		</div>
	</div>
</form> 
@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2();
                Base.datepicker("#birthday,#start_date");

               $( "#tabs" ).tabs();
               
               <?php if(isset($degree) && $count > 0)  { ?> 
                        var totalEdu = <?php echo sizeof($degree);?> 
               <?php } else {  ?>
                        var totalEdu = 1;
               <?php } ?>        
                   
               $('#btn_add_edu').click(function() { 
                   totalEdu +=1;
                   var strHtml = '<tr class="odd" role="row"> '+$("tbody tr").first().html()+'</tr>';
                   strHtml = strHtml.replace(/_1/g,"_"+totalEdu);
                   strHtml = strHtml.replace(/&nbsp;1/,'&nbsp;'+totalEdu);
                   $("tbody").append(strHtml);
               });
               
               $('#btn_remove_edu').click(function() { 
                    if(($("tbody tr").length) > 1 ) 
                        $("tbody tr").last().remove();
               });
	});
</script>
@stop
