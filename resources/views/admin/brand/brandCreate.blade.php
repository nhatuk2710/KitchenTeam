@extends('admin.layout')
@section('home')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Brand</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Local Brand <small>sub title</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                            class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <form class="" action="{{url("admin/brand/brandpost")}}" method="post" novalidate>
                                @csrf
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a
                                        href="#">form page</a>
                                </p>
                                <span class="section">Brand Info</span>
                                <div class="field item form-group">

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                Name
                                            </th>
                                            <th>
                                                <a href="#" style="font-size: 20px" class="addRow"><i class="glyphicon glyphicon-plus"></i></a>
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                <input class="form-control @if($errors->has("brand_name"))
                                                    is-invalid @endif"
                                                       name="brand_name[]"
                                                       placeholder="Brand Name" value="{{old("brand_name")}}"
                                                       required="required" />
                                                </td>

                                                <td>
                                                    <a href="#" class="btn btn-danger remove">
                                                    <i class="glyphicon glyphicon-remove"></i></a>
                                                </td>

                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="border: none" class="pull-right"><input type="submit"
                                               class="btn btn-primary text-center " name="" value="Submit" ></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    @if($errors->has("brand_name"))
                                        <p style="color:red">{{$errors->first("brand_name")}}</p>
                                    @endif
                                </div>
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-11">
{{--                                            <button type='submit' class="btn btn-primary">Submit</button>--}}
                                        </div>
                                    </div>
\
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< Updated upstream
=======
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function (e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function (e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function () {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
    <script type="text/javascript">
        // $('tbody').delegate('.brand_name','keyup',function () {
        //
        // });
        $('.addRow').on('click',function () {
            addRow();
        });
        function addRow() {
            var tr='<tr>'+
                '<td><input class="form-control @if($errors->has("brand_name"))\n' +
'                                                   is-invalid @endif"\n' +
                '                                                       name="brand_name[]"\n' +
                '                                                       placeholder="Brand Name" value="{{old("brand_name")}}"\n' +
                '                                                       required="required" /></td>'+
            '<td><a href="#" class="btn btn-danger remove">\n' +
            '                                                    <i class="glyphicon glyphicon-remove"></i></a></td>'+
            '</tr>';
                $('tbody').append(tr);
        }
        $('.remove').live('click',function () {
            var last=$('tbody tr').length;
            if(last===1){
                alert("Không được xóa hết");
            }else{
                $(this).parent().parent().remove();
            }
        });
    </script>
@endsection
