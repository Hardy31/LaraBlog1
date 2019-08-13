@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить категорию
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">





                <form action="{{' /admin/categories'}}" method="POST">
                    <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                    <div class="box-header with-border">
                        <h3 class="box-title">Добавляем категорию</h3>
                        @if ($errors->any())
                            @foreach($errors->any() as $error)
                                <li> {{$error}} </li>
                             @endforeach
                        @endif
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название</label>
                                <input type= "text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-default">Назад</button>
                        <button class="btn btn-success pull-right">Добавить</button>
                    </div>





                </form>






                <!-- /.box-body -->

                <!-- /.box-footer-->

            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


