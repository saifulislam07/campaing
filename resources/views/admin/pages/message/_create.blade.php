@extends('admin.masterTemplate')

@section('menu-name')
    Add Message
@endsection
@section('main-content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add new row
            $("#add-row").click(function() {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                var email = $("#email").val();
                console.log(email);
                $(".table tbody tr").last().after(
                    '<tr class="fadetext">' +
                    '<td><input type="checkbox" id="select-row"></td>' +
                    '<td>' + firstname + '</td>' +
                    '<td>' + lastname + '</td>' +
                    '<td>' + email + '</td>' +
                    '</tr>'
                );
            })

            // Select all checkbox
            $("#select-all").click(function() {
                var isSelected = $(this).is(":checked");
                if (isSelected) {
                    $(".table tbody tr").each(function() {
                        $(this).find('input[type="checkbox"]').prop('checked', true);
                    })
                } else {
                    $(".table tbody tr").each(function() {
                        $(this).find('input[type="checkbox"]').prop('checked', false);
                    })
                }
            });

            // Remove selected rows
            $("#remove-row").click(function() {
                $(".table tbody tr").each(function() {
                    var isChecked = $(this).find('input[type="checkbox"]').is(":checked");
                    var tableSize = $(".table tbody tr").length;
                    if (tableSize == 1) {
                        alert('All rows cannot be deleted.');
                    } else if (isChecked) {
                        $(this).remove();
                    }
                });
            });

        })
    </script>

    <style>
        .form-div {
            margin-top: 30px;
            padding: 10px;
            box-shadow: 0px 0px 5px black;
        }

        button {
            width: 200px;
        }

        .table {
            margin-top: 30px;
            box-shadow: 0px 0px 5px black;
        }

        .table thead tr {
            background-color: rgb(16, 153, 12);
            box-shadow: 0px 0px 5px darkviolet;
            outline: darkviolet;
            border: 1px solid white;
            color: white;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: center
        }

        .table tbody tr:hover {
            background-color: #8080804a;
        }

        .table tbody tr:active {
            box-shadow: 0px 0px 5px black;
        }

        .remove-row {
            background-color: rgb(16, 153, 12);
            border: 1px solid white !important;
            outline: rgb(16, 153, 12) !important;
            color: white;
            widows: 200px !important;
            height: 40px;
            box-shadow: rgb(16, 153, 12);
        }

        .remove-row:active {
            border: 1px solid white;
            outline: darkviolet !important;
            width: 195px !important;
            height: 38px !important;
        }

        .fadetext {
            animation: fadetext 1s ease;
        }

        @keyframes fadetext {
            0% {
                opacity: 0.1;
            }

            100% {
                opacity: 1;
            }
        }
    </style>


    <div class="content-wrapper">



        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h5 class="m-0 text-dark">Add Message</h5>
                    </div><!-- /.col -->
                    <div class="col-sm-6 ">
                        <a href="{{ route('campaigns') }}" class="btn btn-sm btn-info float-right"><i
                                class="fa fa-plus-square"></i> ALL Message</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            <hr class="style18">
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header bg-blue text-center"> ADD NEW Message </div>
                            <div class="card-body">
                                <div class="form-div">


                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="camp_id[]" id="firstname" class="form-control">
                                                <option value="">Select Campaign</option>
                                                @foreach ($camp as $each)
                                                    <option value="{{ $each->id }}">{{ $each->campaign_name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group date" data-target-input="nearest">
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" id="lastname" name="delay[]"
                                                        class="form-control datetimepicker-input" data-target="#timepicker">
                                                    <div class="input-group-append" data-target="#timepicker"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <textarea type="text" rows="1" class="form-control" id="email" placeholder="Message Here" name="message[]"></textarea>
                                        </div>
                                        <div class="col-md-3" style="text-align: right;">
                                            <button class="btn btn-primary" type="button" id="add-row">Add
                                                Row</button>
                                        </div>
                                    </div>
                                </div>


                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>All <input type="checkbox" id="select-all"></th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>E-Mail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" id="select-row"></td>
                                            <td>example</td>
                                            <td>example</td>
                                            <td>example</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="mt-2 btn btn-info float-right" type="submit">SAVE</button>
                                </form>
                                <button class="mt-2 remove-row" id="remove-row">Remove Row</button>
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        {{-- <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header bg-blue text-center"> ADD NEW Message </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane">
                                        <form class="form-horizontal" method="POST" action="{{ route('storemessage') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <label for="">For Campaign</label>
                                                    <select name="camp_id" id="" class="form-control">
                                                        <option value="">Select Campaign</option>
                                                        @foreach ($camp as $each)
                                                            <option value="{{ $each->id }}">{{ $each->campaign_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for="">Delay Time</label>
                                                    <div class="input-group date" id="reservationdatetime"
                                                        data-target-input="nearest">
                                                        <div class="input-group date" id="timepicker"
                                                            data-target-input="nearest">
                                                            <input type="text" name="delay"
                                                                class="form-control datetimepicker-input"
                                                                data-target="#timepicker">
                                                            <div class="input-group-append" data-target="#timepicker"
                                                                data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="far fa-clock"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col">
                                                    <label for="">Message</label>
                                                    <textarea type="text" class="form-control" id="" placeholder="Message Here" name="message"></textarea>
                                                </div>
                                                <div class="col">
                                                    <i class="fa fa-plus"></i>
                                                </div>

                                            </div>
                                            <div class="row mt-3">

                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <button type="submit" class="btn btn-info btn-block">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- /.tab-pane -->


                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section> --}}
    </div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection
<!-- Content Wrapper. Contains page content -->
