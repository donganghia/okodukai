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
			<div class="col-md-8" style="overflow: hidden;">
				<div class="form-group">
					<label class="col-md-4 control-label" for="code">{{
						trans('admin/employee.code') }}</label>
                                        <div class="col-md-4" >
                                            {{{ $employee->code }}}
					</div>
				</div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="name">{{
                                                trans('admin/employee.name') }}</label>
                                        <div class="col-md-5">
                                            {{{ $employee->name }}}
                                        </div>
                                </div>
                               <div class="form-group">
                                        <label class="col-md-4 control-label" for="birthday">{{
                                                trans('admin/employee.birthday') }}</label>
                                        <div class="col-md-5">
                                                 {{{ $employee->birthday != '' ? str_replace('-','/',($employee->birthday)) : '' }}}
                                        </div>
                                </div>
                               <div class="form-group" >
                                        <label class="col-md-4 control-label" for="address">{{
                                                trans('admin/employee.address') }}</label>
                                        <div class="col-md-8">
                                            {{{ $employee->address }}}
                                        </div>
                                </div>
                               <div class="form-group">
                                        <label class="col-md-4 control-label" for="email">{{
                                                trans('admin/employee.email') }}</label>
                                        <div class="col-md-8">
                                            {{{ $employee->email }}}
                                        </div>
                                </div>
                               <div class="form-group">
                                        <label class="col-md-4 control-label" for="telephone">{{
                                                trans('admin/employee.telephone') }}</label>
                                        <div class="col-md-4">
                                            {{{ $employee->telephone }}}
                                        </div>
                                </div>
                               <div class="form-group">
                                        <label class="col-md-4 control-label" for="confirm">{{
                                                trans('admin/employee.sex') }}</label>
                                        <div class="col-md-3">
                                            {{{ $employee->sex }}}
                                        </div>
                                </div>
                               <div class="form-group">
                                        <label class="col-md-4 control-label" for="confirm">{{
                                                trans('admin/employee.nationality') }}</label>
                                        <div class="col-md-3">
                                            {{{ $employee->nationality == 'vn' ? 'Viet Nam' : ($employee->nationality == 'uk' ? 'England' : 'Singapore' )}}}
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-4 control-label" for="start_date">{{
                                                trans('admin/employee.start_date') }}</label>
                                        <div class="col-md-5">
                                                 {{{ $employee->start_date != '' ? str_replace('-','/',($employee->start_date)) : '' }}}
                                        </div>
                                </div>
			</div>
                    
                       <div class="col-md-4">
				<div class="form-group">
					<label class="col-md-4 control-label" for="photo">{{
						trans('admin/employee.photo') }}</label>
                                </div>   
                                 <div class="form-group">
					<div  id="mygallery" class="col-md-4">
                                            <a
                                                    href="{{{Request::root().'/upload/'.$employee->photo }}}"
                                                    data-lightbox="roadtrip"> <img alt=""
                                                    src="{{{Request::root().'/upload/thumbs/'.$employee->photo }}}" />
                                            </a> 
					</div>
				</div>
			</div>
                        
		</div>
            <!-- tab 2 -->
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
                         @if (isset($degree))    
                            @foreach($degree as  $key => $item) 
                             <tr class="odd" role="row"> 
                                 <td class="col-md-1">
                                     &nbsp;{{$key + 1}}
                                 </td>
                                 <td class="col-md-4">
                                     {{{$item->degree}}}
                                 </td>
                                 <td  class="col-md-2">
                                     {{{$item->year}}}
                                 </td>
                                 <td>
                                     {{{$item->school}}}
                                 </td>
                             </tr> 
                             @endforeach
                         @endif    
                        </tbody>
                    </table>
                  
                </div>
	</div>
        
        <div style="clear: both;"></div>
        
</form> 
@stop @section('scripts')
<script type="text/javascript">
	$(function() {
		$("#roles").select2();
                $( "#tabs" ).tabs();
                $("#mygallery").justifiedGallery();
	});
</script>
@stop
