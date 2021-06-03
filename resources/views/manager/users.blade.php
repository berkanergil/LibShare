@extends("layouts.manager")

@section('content')
<x-manager-nav-bar/>


<div style="background: transparent!important;" class="mt-0">
    <div uk-height-viewport="offset-top: true; offset-bottom: true">
        <div uk-grid uk-height-viewport="expand: true">
            <div class="uk-width-medium@m sidebar-background">
                <ul class="uk-nav uk-nav-default"
                    uk-toggle="cls: uk-nav uk-nav-default uk-breadcrumb uk-padding-small; mode: media; media: @s"
                    uk-switcher="connect: #component-nav; animation: uk-animation-fade; toggle: > :not(.uk-nav-header)">
                    <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                        <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                                class="button-tab-icon uk-visible@l"></span><i
                                style="margin-right: 10px !important; padding-left: 6px !important;"
                                class="fas fa-eye pl-1"></i> Display All Users</a>
                    </li>
                    <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                        <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                                class="button-tab-icon uk-visible@l"></span><i
                                style="margin-right: 9px !important; padding-left: 6px !important;"
                                class="fas fa-eye"></i> Display All Librarians</a>
                    </li>
                    <li class="side-tab" uk-toggle="cls: side-tab; mode: media; media: @m">
                        <a class="side-tab-link" uk-toggle="cls: side-tab-link; mode: media; media: @m" href="#"><span
                                class="button-tab-icon uk-visible@l"></span><i
                                style="margin-right: 9px !important; padding-left: 6px !important;"
                                class="fas fa-eye"></i> Display All Library Managers</a>
                    </li>
                </ul>
            </div>
            <div class="uk-width-expand@m">
                <ul id="component-nav" class="uk-switcher uk-margin-large ">
                    <li>
                        <div class="uk-section ">
                            <div class="container-fluid">
                                <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;" class="text-white">
                                    All Users</h1>
                                <div id="toolbaruser" class="mb-3">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table class="text-white" id="tableusers" data-toggle="table" data-search="true"
                                    data-filter-control="true" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbaruser">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="first_name" data-filter-control="select"
                                                data-sortable="true">First Name</th>
                                            <th data-field="last_name" data-filter-control="input" data-sortable="true">
                                                Last Name</th>
                                            <th data-field="phone_number" data-filter-control="input"
                                                data-sortable="true">Phone Number</th>
                                            <th data-field="email" data-filter-control="select" data-sortable="true">
                                                    E-mail</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($users as $user)
                                        <tr>
                                    
                                            <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                    type="checkbox"></td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td align="center" valign="middle"  style="font-family: Arial;font-size: 22px;padding: 15px;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;">
                                <a  href="http://www.ausnviro.com.au/beec/#go-to-form" title="Yes please, send me a quote."  target="_self" style="font-weight: bold;letter-spacing: -0.5px;line-height: 100%;text-align: center;text-decoration: none;color: #FFFFFF;word-wrap: break-word !important; display:block; width:100%; height:100%">Yes please, send me a quote.</a>
                            </td>  
                                        </tr>
                                    
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="uk-section ">
                            <div class="container-fluid">
                                <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;" class="text-white">
                                    All Librarians</h1>
                                <div id="toolbar" class="mb-3">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table class="text-white" id="table" data-toggle="table" data-search="true"
                                    data-filter-control="true" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="username" data-filter-control="select" data-sortable="true">
                                                Username</th>
                                            <th data-field="first_name" data-filter-control="input"
                                                data-sortable="true">First Name</th>
                                            <th data-field="last_name" data-filter-control="input" data-sortable="true">
                                                Last Name</th>
                                            <th data-field="phone_number" data-filter-control="select"
                                                data-sortable="true">Phone Number</th>
                                            <th data-field="email" data-filter-control="select" data-sortable="true">
                                                E-mail</th>
                                            <th data-field="manager_ID" data-sortable="true">Manager ID</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($librarians as $user)
                                        <tr>
                                            <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                    type="checkbox"></td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->surname }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->manager_id }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </li>
                    <li>
                        <div class="uk-section ">
                            <div class="container-fluid">
                                <h1 style="border-bottom: 3px solid #FFFFFF;width: 40% !important;" class="text-white">
                                    All Library Managers</h1>

                                <table class="text-white" id="table-manager" data-toggle="table" data-search="true"
                                    data-filter-control="true" data-show-export="true" data-click-to-select="true"
                                    data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="username" data-filter-control="select" data-sortable="true">
                                                Username</th>
                                            <th data-field="first_name" data-filter-control="input"
                                                data-sortable="true">First Name</th>
                                            <th data-field="last_name" data-filter-control="input" data-sortable="true">
                                                Last Name</th>
                                            <th data-field="phone_number" data-filter-control="select"
                                                data-sortable="true">Phone Number</th>
                                            <th data-field="email" data-filter-control="select" data-sortable="true">
                                                E-mail</th>
                                            <th data-field="admin_ID" data-sortable="true">Admin ID</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-white">
                                        @foreach ($managers as $manager)
                                        <tr>
                                            <td class="bs-checkbox "><input data-index="0" name="btSelectItem"
                                                    type="checkbox"></td>
                                            <td>{{ $manager->username }}</td>
                                            <td>{{ $manager->name }}</td>
                                            <td>{{ $manager->surname }}</td>
                                            <td>{{ $manager->phone_number }}</td>>
                                            <td>{{ $manager->email }}</td>
                                            <td>{{ $manager->admin_id }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



    {{-- <h1>USERS</h1>
    <br>
    @if ($users->count())
        @foreach ($users as $user)
            <a href="{{ route("manager_user",$user) }}">{{ $user->username }}</a>
            <br>
        @endforeach
    @endif --}}
@endsection