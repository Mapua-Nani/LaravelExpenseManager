@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="card card-block">
            <div class="row">
                <h2 class="col-sm">Role</h2>
                <h3 class="col-sm ml-20" >User Management > Roles </h3>
            </div>
        </div>

        <div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Description</th>
                    <th>Created_at</th>
                </tr>
                </thead>
                <tbody id="roles-list" name="roles-list">
                @foreach ($roles as $role)
                    <tr id="role{{$role->id}}">
                        <td><a href="#" id="{{$role->id}}" class="open-modal">{{$role->title}}</a></td>
                        <td>{{$role->description}}</td>
                        <td>{{$role->created_at}}</td>
                        {{-- <td>
                            <button class="btn btn-info open-modal" value="{{$role->id}}">Edit
                            </button>
                            <a href="#" id="{{$role->id}}" class="open-modal">click</a>
                            <button class="btn btn-danger delete-role" value="{{$role->id}}">Delete
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs float-right">Add New Role</button>
            <div class="modal fade" id="roleEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="roleEditorModalLabel">Role Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputRole" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="role" name="role"
                                               placeholder="Enter New Role" value="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Enter Role Description" value="">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button id="del-role" class="btn btn-danger delete-role" value="{{$role->id}}">Delete
                            </button>
                            <button type="button" class="btn btn-secondary" id="btn-close" value="add" data-dismiss="modal">Close
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save
                            </button>
                            <input type="hidden" id="role_id" name="role_id" value="0">
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

