@extends('admin.dashboard')

@section('content')
    
    <div class="container">
    <button style="margin:5px" class="btn btn-warning">
        <a href="{{\LaravelLocalization::localizeURL(route('admin.users.create'))}}">Add New Admin</a>
    </button>
        <div class="row">
            <div class="">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-list"></span>Admins List  
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($list as $user)
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label >
                                            {{$user->name}}
                                        </label>
                                    </div>
                                    <div class="pull-right action-buttons">
                                        <!-- <a href="{{\LaravelLocalization::localizeURL(route('admin.users.edit',['user' => $user]))}}"><span class="glyphicon glyphicon-pencil"></span></a> -->
                                        <form method="POST" action="{{ \LaravelLocalization::localizeURL(route('admin.users.destroy', ['user' =>$user])) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="trash">
                                                <span class="delete-user glyphicon glyphicon-trash" value="Delete user"></span>
                                                <!-- <input type="submit" class="btn btn-danger delete-user" value="Delete user"> -->
                                            </div>
                                        </form>
                                        <!-- <a  class="trash"><span class="glyphicon glyphicon-trash" ></span></a> -->
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- <div class="panel-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>
                                    Total Count <span class="label label-info">25</span></h6>
                            </div>
                            <div class="col-md-6">
                                <ul class="pagination pagination-sm pull-right">
                                    <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                    <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="javascript:void(0)">»</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    



@endsection

@section('scripts')
<script>
    $('.delete-user').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure you want to delete this user?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });
</script>

@endsection
