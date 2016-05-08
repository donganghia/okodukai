@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title') {{{ trans("admin/employee.users") }}} :: @parent
@stop

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {{{ trans("admin/employee.users") }}}
            <div class="pull-right">
                @if(Auth::user()->admin== 1 || Auth::user()->admin== 2)
                <div class="pull-right">
                    <a href="{{{ URL::to('admin/employee/create') }}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{
					trans("admin/modal.new") }}</a>
                </div>
                @endif
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{{{ trans("admin/employee.code") }}}</th>
            <th>{{{ trans("admin/employee.name") }}}</th>
            <th>{{{ trans("admin/employee.birthday") }}}</th>
            <th>{{{ trans("admin/employee.email") }}}</th>
            <th>{{{ trans("admin/employee.sex") }}}</th>
            <th>{{{ trans("admin/admin.created_at") }}}</th>
            <th>{{{ trans("admin/admin.action") }}}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@stop

{{-- Scripts --}}
@section('scripts')
    @parent
    <script type="text/javascript">
        var oTable;
        $(document).ready(function () {
            oTable = $('#table').DataTable({
                "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
                "sPaginationType": "bootstrap",
                "processing": true,
                "serverSide": true,
                "ajax": "{{ URL::to('admin/employee/data/') }}",
                "fnDrawCallback": function (oSettings) {
                    $(".iframe").colorbox({
                        iframe: true,
                        width: "75%",
                        height: "95%",
                        onClosed: function () {
                            oTable.ajax.reload();
                        }
                    });
                }
            });
            //nghia add
            $('.dropdown').click(function() { 
                $('.dropdown').toggleClass('open');
            });
        });
    </script>
@stop


