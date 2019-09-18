@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
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
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('posts.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Теги</th>
                            <th>Картинка</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($viewPosts as $viewPost)
                        <tr>

                                <td>{{$viewPost->id}}</td>
                                <td>{{$viewPost->title}}</td>
                                <td>{{$viewPost->getCategoryTitle()}}</td>
                                <td>{{$viewPost->getTagsTitle()}}</td>

                                <td>

                                    <img src="{{$viewPost->getImage()}}" alt="" class="img-responsive" width="150">
                                </td>
                                <td><a href="{{route('posts.edit', $viewPost->id)}}" class="fa fa-pencil"></a>
                                    {{ Form::open(['route' => ['posts.destroy', $viewPost->id], 'method' => 'delete']) }}
                                    <button  onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                        <a  class="fa fa-remove"></a>
                                    </button>

                            {{ Form::close() }}

                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


