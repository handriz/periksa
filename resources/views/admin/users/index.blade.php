@extends('layouts.app2')

@section('content')
<div class="container">
    {{-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pages.index') }}">
                {{ trans('cruds.user.title_singular') }} {{ trans('global.add') }}
            </a>
        </div>
    </div> --}}
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.username') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email_verified_at') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.active') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr data-entry-id="{{ $user->id }}">
                                    <td>
        
                                    </td>
                                    <td>
                                        {{ $user->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->username ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email ?? '' }}
                                    </td>
                                    <td>
                                        {{ $user->email_verified_at ?? '' }}
                                    </td>
                                    <td>
                                        @foreach($user->roles as $key => $item)
                                            <span class="badge badge-info">{{ $item->title }}</span>
                                        @endforeach
                                        {{-- <input type="checkbox" class="toggle-class" data-id="{{ $user->id }}" data-toggle="toggle" data-style="ios" data-onstyle="success" data-offstyle="info" data-on="Admin" data-size="small" data-off="User" {{ $user->is_admin == true ? 'checked' : ''}}> --}}
                                       
                                    </td>
                                    <td>
                                        @can('user_active')
                                        <input type="checkbox" class="toggle-class" data-id="{{ $user->id }}" data-toggle="toggle" data-size="mini" data-style="ios" data-on="Yes" data-off="No" {{ $user->is_active == true ? 'checked' : ''}}>
                                     @endcan
                                    </td>
                                    <td>
                                        @can('user_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.user.edit', $user->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan
        
                                        @can('user_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.user.edit', $user->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan
        
                                        @can('user_delete')
                                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan
        
                                    </td>
        
                                </tr>
                            @endforeach  
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
  </style>
{{-- <script>
    $(function() {
      $('#toggle-two').bootstrapToggle({
        on: 'Yes',
        off: 'No'
      });
    })
  </script> --}}
<script>
    $('.toggle-class').on('change', function() {
        var is_active = $(this).prop('checked') == true ? 1 : 0;
        var user_id  = $(this).data('id');
        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: "{{ route('admin.user.changeStatus') }}",
            data: {
                'is_active': is_active,
                'user_id': user_id
            },
            success:function(data) {
                $('#notifDiv').fadeIn();
                $('#notifDiv').css('background', 'green');
                $('#notifDiv').text('Status Updated Successfully');
                setTimeout(() => {
                    $('#notifDiv').fadeOut();
                }, 3000);
            }
        });
    });
</script>

<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection