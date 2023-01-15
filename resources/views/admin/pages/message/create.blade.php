@extends('admin.masterTemplate')

@section('menu-name')
    Add Message
@endsection
@section('main-content')
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
                        <div class="form-group">
                            <form name="add_name" id="add_name" class="form-horizontal" method="POST"
                                action="{{ route('storemessage') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="alert alert-success print-success-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dynamic_field">
                                        <tr>
                                            <td>


                                                <select name="camp_id[]" id="firstname" class="form-control camp_id">
                                                    <option value="">Select Campaign</option>
                                                    @foreach ($camp as $each)
                                                        <option value="{{ $each->id }}">{{ $each->campaign_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>

                                                <div class="input-group  date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" id="lastname" name="delay[]"
                                                        class="form-control datetimepicker-input delay"
                                                        data-target="#timepicker">
                                                    <div class="input-group-append" data-target="#timepicker"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="far fa-clock"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>


                                                <textarea type="text" rows="1" class="form-control message" id="email" placeholder="Message Here"
                                                    name="message[]"></textarea>
                                            </td>
                                            <td>
                                                <button type="button" name="add" id="add"
                                                    class="btn btn-success btn-xs">Add More</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <input type="submit" name="submit" class="btn btn-info" value="Submit" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

    </div><!-- /.container-fluid -->
    <!-- /.content -->
    <script type="text/javascript">
        $(document).ready(function() {
            var postURL = "<?php echo url('addmore'); ?>";
            var i = 1;


            $('#add').click(function() {
                i++;
                let campId = $(this).closest('tr').find('.camp_id option:selected').text();
                let campVal = $(this).closest('tr').find('.camp_id option:selected').val();
                let date = $(this).closest('tr').find('.delay').val();
                let message = $(this).closest('tr').find('.message').val();
                console.log(campId);
                $('#dynamic_field').append(`<tr id="row${i}">
                                            <td>
                                                ${campId}
                                              <input type="hidden" name="camp_id[]" value="${campVal}">
                                            </td>
                                            <td>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                    <input type="text" id="lastname" name="delay[]"
                                                        class="form-control datetimepicker-input delay"
                                                        data-target="#timepicker" value="${date}">

                                                </div>
                                            </td>
                                            <td>
                                                <textarea type="text" rows="1" class="form-control message" id="email" placeholder="Message Here"
                                                    name="message[]">${message}</textarea>
                                            </td>
                                            <td>
                                           <button type="button" name="remove" id="${i}" class="btn btn-danger btn_remove">X</button>
                                            </td>
                                        </tr>`);
                $(this).closest('tr').find('.camp_id option:selected').prop("selected",
                    false);
                $(this).closest('tr').find('.delay').val('');
                $(this).closest('tr').find('.message').val('');

            });


            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                console.log(button_id);
                $('#row' + button_id + '').remove();
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#submit').click(function() {
                $.ajax({
                    url: postURL,

                    method: "POST",
                    data: $('#add_name').serialize(),
                    type: 'json',
                    success: function(data) {
                        if (data.error) {
                            printErrorMsg(data.error);
                        } else {
                            i = 1;
                            $('.dynamic-added').remove();
                            $('#add_name')[0].reset();
                            $(".print-success-msg").find("ul").html('');
                            $(".print-success-msg").css('display', 'block');
                            $(".print-error-msg").css('display', 'none');
                            $(".print-success-msg").find("ul").append(
                                '<li>Record Inserted Successfully.</li>');
                        }
                    }
                });
            });


            function printErrorMsg(msg) {
                $(".print-error-msg").find("ul").html('');
                $(".print-error-msg").css('display', 'block');
                $(".print-success-msg").css('display', 'none');
                $.each(msg, function(key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }
        });
    </script>
@endsection
<!-- Content Wrapper. Contains page content -->
