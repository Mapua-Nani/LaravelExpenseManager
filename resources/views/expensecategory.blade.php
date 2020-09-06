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
                    <th>Expense Category</th>
                    <th>Description</th>
                    <th>Created_at</th>
                </tr>
                </thead>
                <tbody id="expensecategories-list" name="expensecategories-list">
                @foreach ($expensecategories as $expensecategory)
                    <tr id="expensecategory{{$expensecategory->id}}">
                        <td><a href="#" id="{{$expensecategory->id}}" class="open-modal">{{$expensecategory->title}}</a></td>
                        <td>{{$expensecategory->description}}</td>
                        <td>{{$expensecategory->created_at}}</td>
                        {{-- <td>
                            <button class="btn btn-info open-modal" value="{{$expensecategory->id}}">Edit
                            </button>
                            <a href="#" id="{{$expensecategory->id}}" class="open-modal">click</a>
                            <button class="btn btn-danger delete-expensecategory" value="{{$expensecategory->id}}">Delete
                            </button>
                        </td> --}}
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs float-right">Add New Role</button>
            <div class="modal fade" id="expensecategoryEditorModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="expensecategoryEditorModalLabel">Role Editor</h4>
                        </div>
                        <div class="modal-body">
                            <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                                <div class="form-group">
                                    <label for="inputRole" class="col-sm-2 control-label">Role</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="expensecategory" name="expensecategory"
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
                            <button id="del-expensecategory" class="btn btn-danger delete-expensecategory" value="{{$expensecategory->id}}">Delete
                            </button>
                            <button type="button" class="btn btn-secondary" id="btn-close" value="add" data-dismiss="modal">Close
                            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save
                            </button>
                            <input type="hidden" id="expensecategory_id" name="expensecategory_id" value="0">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src=" {{asset ('js/crud.js') }}"></script>
