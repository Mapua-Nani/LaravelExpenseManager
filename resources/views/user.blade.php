@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card card-block">
            <div class="row">
                <h2 class="col-sm">Users</h2>
                <h3 class="col-sm ml-20" >User Management > Users </h3>
            </div>
        </div>

        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                    <th>Created_at</th>
                </tr>
                </thead>
                <tbody id="users-list" name="users-list">
                @foreach ($users as $user)
                    <tr id="user{{$user->id}}">
                        <td><a href="#" id="{{$user->id}}" class="open-modal">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{ $user->role->title }}</td>
                        <td>{{$user->created_at}}</td>
                        {{-- <td>
                            <button class="btn btn-info open-modal" value="{{$user->id}}">Edit
                            </button>
                            <a href="#" id="{{$user->id}}" class="open-modal">click</a>
                            <button class="btn btn-danger delete-user" value="{{$user->id}}">Delete
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button id="btn-adduser" name="btn-adduser" class="btn btn-primary btn-xs float-right">Add New User</button>
            <div class="modal fade" id="userEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="userEditorModalLabel">User Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="usermodalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputUser" class="col-sm-2 control-label">User</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="user" name="user"
                                               placeholder="Enter New User" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email"
                                               placeholder="Enter User Email" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Role" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="userrole_select">
                                            <option select value="">Select Role</option>
                                            {{-- @foreach($users as $user)
                                                 <option>{{ $user->role->title }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="del-user" class="btn btn-danger delete-user" value="{{$user->id}}">Delete
                            </button>
                            <button type="button" class="btn btn-secondary" id="userbtn-close" value="add" data-dismiss="modal">Close
                            <button type="button" class="btn btn-primary" id="userbtn-save" value="add">Save
                            </button>
                            <input type="hidden" id="user_id" name="user_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" integrity="sha512-X7kCKQJMwapt5FCOl2+ilyuHJp+6ISxFTVrx+nkrhgplZozodT9taV2GuGHxBgKKpOJZ4je77OuPooJg9FJLvw==" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

