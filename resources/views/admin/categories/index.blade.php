@extends('admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Categories -Листинг сущности</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                    <a href="{{route('categories.create')}}" class="btn btn-success">Добавить</a>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($viewCategories as $viewCategory )

                        <tr>
                            <td>{{$viewCategory->id}}</td>
                            <td>{{$viewCategory->title}}
                            </td>
                            <td>
                                <a href="{{route('categories.edit', $viewCategory->id)}}" class="fa fa-pencil"></a>

                                {{ Form::open(['route' => ['categories.destroy', $viewCategory->id], 'method' => 'delete']) }}
                                    <button  onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                        <a  class="fa fa-remove"></a>
                                    </button>

                                {{ Form::close() }}

                            </td>
                        </tr>

                    @endforeach





                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection


