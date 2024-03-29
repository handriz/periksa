<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-title"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-shield-alt') }}"></use>
                </svg> {{ trans('panel.site_title') }} </a></li>

        <li class="c-sidebar-nav-title">Admin Pages</li>
        @can('user_management_access')
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> Master Setting
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('admin.user.index') }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user-x') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span>Daftar User</a></li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("admin.roles.index") }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-lock-unlocked') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span>Role User</a></li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route("admin.izin.index") }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-sync') }}"></use>
                        </svg>
                        <span class="c-sidebar-nav-icon"></span> {{ trans('cruds.permission.title') }}</a></li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg>Master Data</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                            class="c-sidebar-nav-icon"></span> Kode Unit</a></li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                            class="c-sidebar-nav-icon"></span> Daftar Penyedia</a></li>
            </ul>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                            class="c-sidebar-nav-icon"></span> Kontrak Kerja</a></li>
            </ul>
        </li>
        @endcan

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a
                class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> Base</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="base/breadcrumb.html"><span
                            class="c-sidebar-nav-icon"></span> Breadcrumb</a></li>
            </ul>
        </li>

        {{-- @if (auth()->user()->is_admin)
            <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>
        @foreach ($admin_menu as $group)
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                </svg> {{ $group->name }}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @foreach ($group->checklists as $checklist)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" style="padding: .5rem .5rem .5rem 76px"
                        href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                        </svg>
                        {{ $checklist->name }}</a>
                </li>
                @endforeach
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" style="padding: 1rem .5rem .5rem 76px"
                        href="{{ route('admin.checklist_groups.checklists.create', $group) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-note-add') }}"></use>
                        </svg>
                        {{ __('New checklist') }}</a>
                </li>
            </ul>
        </li>
        @endforeach
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.create') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
                </svg>
                {{ __('New checklist group') }}</a>
        </li>

        <li class="c-sidebar-nav-title">{{ __('Pages') }}</li>
        @foreach (\App\Models\Page::all() as $page)
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.pages.edit', $page) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ $page->title }}
            </a>
        </li>
        @endforeach

        <li class="c-sidebar-nav-title">{{ __('Manage Data') }}</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg> {{ __('Users') }}
            </a>
        </li>
        @else
        @foreach ($user_tasks_menu as $key => $user_task_menu)
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('user.tasklist', $key) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-' . $user_task_menu['icon']) }}">
                    </use>
                </svg>
                {{ $user_task_menu['name'] }}
                @livewire('user-tasks-counter', [
                'task_type' => $key,
                'tasks_count' => $user_task_menu['tasks_count'],
                ])
            </a>
        </li>
        @endforeach

        @foreach ($user_menu as $group)
        <li class="mt-2 c-sidebar-nav-item c-sidebar-nav-dropdown c-show">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                </svg> {{ $group['name'] }}
                @if ($group['is_new'])
                <span class="badge badge-info">NEW</span>
                @elseif ($group['is_updated'])
                <span class="badge badge-info">UPD</span>
                @endif
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @foreach ($group['checklists'] as $checklist)
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('user.checklists.show', [$checklist['id']]) }}">
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                        </svg>
                        {{ $checklist['name'] }}
                        @livewire('completed-tasks-counter', [
                        'completed_tasks' => count($checklist['user_completed_tasks']),
                        'tasks_count' => count($checklist['tasks']),
                        'checklist_id' => $checklist['id']
                        ])

                        @if ($checklist['is_new'])
                        <span class="badge badge-info">NEW</span>
                        @elseif ($checklist['is_updated'])
                        <span class="badge badge-info">UPD</span>
                        @endif
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
        @endif --}}
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
