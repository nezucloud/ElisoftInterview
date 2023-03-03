@extends('layouts.admin-container')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mt-3">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">User Management</h3>
                <button class="btn btn-outline-primary btn-create" data-toggle="modal" data-target="#modal-form">Add
                    User</button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 20px">No. </th>
                        <th>Full Name</th>
                        <th>E-Mail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="tableBodyUsers">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ ($users->currentPage() - 1) * 10 + $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex" data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                    data-email="{{ $user->email }}">
                                    <button class="btn btn-outline-info mr-3 btn-edit" data-toggle="modal"
                                        data-target="#modal-form">Edit</button>
                                    <button class="btn btn-outline-danger btn-delete" data-toggle="modal"
                                        data-target="#modal-delete">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $users->links() }}
        </div>
        <!-- /.card-body -->
    </div>

    <div class="modal fade" id="modal-form">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Form Create User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formUser" method="POST" action="">
                        @csrf
                        <input type="hidden" name="_method" value="POST" id="requestMethod">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" placeholder="Full Name"
                                        name="name" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        name="email" required value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Password (Keep empty if you dont want to change password)"
                                        name="password" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="confirmPassword" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="Confirm Password (Keep empty if you dont want to change password)"
                                        value="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="formUser">Submit</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formDeleteUser" method="POST" action="user-management/delete">
                        @csrf
                        <input type="hidden" name="id" value="" id="deleteId">
                        <div class="card-body">
                            Are you sure delete this user ?
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" form="formDeleteUser">Delete</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}")
        </script>
    @endif

    <script src="script/InvalidNode.js"></script>
    <script>
        'use-strict';

        const token = $('[name="_token"]').val();
        const formUser = $('#formUser')[0];

        $('#confirmPassword, #password').on('input', function(event) {
            validatePassword();
        })

        $('#formUser').on('submit', function(event) {
            event.preventDefault();

            const password = $('#password').val();
            const confirmPassword = $('#confirmPassword').val();

            if (password != confirmPassword) {
                alert('Password must be matched each other');
                return;
            }

            const formData = new FormData(formUser)
            const requestMethod = getRequestMethod();
            switch (requestMethod) {
                case 'PATCH':
                    formData.append('id', $('#userId').val())
                    break;
                default:
                    $('#userId').remove();
                    break;
            }

            $.ajax({
                type: 'POST',
                url: "{{ url('user-management') }}",
                data: formData,
                processData: false, // Using FormData, no need to process data.
                contentType: false,
                success: (response) => {
                    toastr.success(response.message);
                    $('#modal-form').modal('hide');
                    setTimeout(() => {
                        window.location.reload();
                    }, 500);
                },
                error: (err, textStatus) => {
                    if (err.status === 422) setErrorInput(err.responseJSON.errors);
                },
                beforeSend: () => {
                    setSubmitButtonDisabled(true);
                },
                complete: () => {
                    setSubmitButtonDisabled(false);
                }
            });
        });

        function validatePassword() {
            const confirmPasswordElement = $('#confirmPassword');
            const confirmPassword = confirmPasswordElement.val();;
            const password = $('#password').val();

            const invalidPasswordFeedback = $('#confirmPasswordInvalid');

            if (!invalidPasswordFeedback.length && password != confirmPassword) {
                confirmPasswordElement
                    .addClass('is-invalid')
                    .after(invalidNode('confirmPassword', 'Confirm password must be exact match with password'));
            } else if (invalidPasswordFeedback.length && password == confirmPassword) {
                confirmPasswordElement.removeClass('is-invalid');
                invalidPasswordFeedback.remove();
            }
        }
    </script>
    <script>
        $('.btn-edit').on('click', function() {
            setRequestMethod('PATCH');
            setModalTitle('Update User');
            setSubmitButtonText('Update User');

            const data = $(this).parent();
            const id = data.data('id');
            const name = data.data('name');
            const email = data.data('email');

            $('[name="name"]').val(name)
                .before(InputUserId(id));
            $('[name="email"]').val(email);
        });

        $('.btn-create').on('click', function() {
            formUser.reset();
            $('.is-invalid').removeClass('is-invalid');
            setSubmitButtonText('Create User');
            setRequestMethod('POST');
            setModalTitle('Create User');
        });

        $('.btn-delete').on('click', function() {
            const data = $(this).parent();
            const id = data.data('id');

            $('#deleteId').val(id);
        });

        /**
         * @argument requestMethod {String} 
         */
        function setRequestMethod(requestMethod) {
            $('#requestMethod').val(requestMethod);
        }

        function getRequestMethod() {
            return $('#requestMethod').val();
        }

        /**
         * @argument {String} title
         */
        function setModalTitle(title) {
            $('.modal-title').text(title);
        }

        /**
         * @argument {Object} errors
         */
        function setErrorInput(errors) {
            for (const key in errors) {
                if (!$(`#${key}Invalid`).length) {
                    $(`[name="${key}"]`)
                        .addClass('is-invalid')
                        .after(invalidNode(key, errors[key]))
                }
            }
        }

        function setSubmitButtonText(text) {
            return $('[type="submit"]').text(text);
        }

        function setSubmitButtonDisabled(disabled = false) {
            return $('[type="submit"]').prop('disabled', disabled);
        }

        /** 
         * @argument {String} userId
         * @return {String} input hidden id component
         */
        function InputUserId(userId) {
            return `
                <input type="hidden" value="${userId}" name="id" id="userId"/>
            `;
        }
    </script>
@endsection
