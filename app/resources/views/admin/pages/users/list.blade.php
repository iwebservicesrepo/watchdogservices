@extends('admin.layouts.master')
@section('title', 'Users')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-blue">User Management</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><a class="text-blue" href="{{ URL('admin/users') }}">Users</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">

    <div class="card card-blue">
        <div class="card-header text-white">
            <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible removeAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('error') }}
            </div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible removeAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ Session::get('success') }}
            </div>
            @endif
            <!--            <div class="col-md-12">
                            <a id="deleteUser" class="btn btn-success">Delete</a>
                        </div>-->
            <table id="usersList" class="table table-bordered table-striped table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                        <th>Order Amount</th>
                        <th>Transaction Number</th>
                        <th>Customer Code</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($userList as $key => $val) {
                        $address = $val->street_address . ", " . $val->apt_unit . ", " . $val->city . ", " . $val->state . ", " . $val->zip;
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" id="del_{{ $key }}" class="delete_user_ids" name="delete_user_ids[]" value="{{ $val->id }}">
                            </td>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $val->first_name }} {{ $val->last_name }}</td>
                            <td>{{ $val->email }}</td>
                            <td>{{ $val->phone }}</td>
                            <td>{{ $address }}</td>
                            <td>${{ $val->price }}</td>
                            <td>{{ ($val->transactionHistory != null) ? $val->transactionHistory->txn_id : 'N/A' }}</td>
                            <td>{{ $val->user_code }}</td>
                            <td>
                                <a class="btn btn-info btn-xs text-white" href="{{ URL('admin/send-email').'/'.$val->id }}" title="Send Email">
                                    <i class="fa fa-envelope"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

</section>
<!-- /.content -->


@stop


@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.dt-buttons').append('<a id="deleteUser" class="btn btn-success ml-3">Delete</a>');
        $('.dt-buttons').removeClass('btn-group');
        $(document).on('click', '#deleteUser', function (e) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete user's account!",
                icon: 'warning',
                showCancelButton: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-info ml-3'
                },
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var userIdsArr = [];
                    $('input[name="delete_user_ids[]"]:checked').each(function () {
                        userIdsArr.push(this.value);
                    });
                    if (userIdsArr.length <= 0) {
                        Swal.fire({
                            title: 'Please select at least one user account to delete',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            },
                            buttonsStyling: false,
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            }
                        });
                    } else {
                        $.ajax({
                            url: "{{ url('/')}}" + "/admin/delete-users",
                            data: {"data": userIdsArr, _token: '{{csrf_token()}}'},
                            type: 'post',
                            dataType: 'JSON',
                            success: function (data) {
                                if (data.success == true) {
                                    Swal.fire({
                                        title: 'Congratulations',
                                        text: "User's account deleted successfully",
                                        icon: 'success',
                                        showCancelButton: false,
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-success',
                                            //cancelButton: 'btn btn-info ml-3'
                                        },
                                        confirmButtonText: 'OK'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Something went wrong',
                                        showClass: {
                                            popup: 'animate__animated animate__fadeInDown'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__fadeOutUp'
                                        },
                                        buttonsStyling: false,
                                        customClass: {
                                            confirmButton: 'btn btn-danger'
                                        }
                                    });
                                }
                            },
                            error: function (e) {
                                console.log(e);
                            }
                        });
                    }
                }
            });
        });
    });
</script>
@stop