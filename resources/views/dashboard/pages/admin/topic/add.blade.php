@extends('dashboard.index')

@section('title', 'Create Post')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap Core CSS -->
    <link href="assets_dashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets_dashboard/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets_dashboard/css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets_dashboard/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets_dashboard/css/free.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jquery -->
    <script>
        import Button from "../../../../../js/Jetstream/Button";
        export default {
            components: {Button}
        }
    </script>
@endsection

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1  class="page-header"> Add topic</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div  class="panel panel-default">
                        <div class="panel-heading">
                            <i class="far fa-plus-square"></i>  Form Add Topic
                        </div>
                        <div class="panel-body">
                            <form role="form" method="post" action="admin/manage-topic/post-add">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input style="width: 300px" class="form-control" id="name" onkeyup="ChangeToSlug();"
                                                   name="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Select Mod id</label>

                                            <select class="form-control" id="topic_id" name="mod_id">
                                                @foreach($user as $u)
                                                    <option>{{$u->name}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input style="width: 300px" class="form-control" class="form-control" id="slug" name="slug" value="{{ old('slug') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <button style="margin-left: 510px;border-width: 2px;background: #f5f5f5;" type="submit" class="btn btn-default">Add New
                                </button>

                            </form>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <div  class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-twitter fa-fw"></i>Information admin
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a  class="list-group-item">
                                    <i></i> Name :{{Auth::user()->name}}
                                </a>
                                <a  class="list-group-item">
                                    <i></i> Email:{{Auth::user()->email}}
                                </a>
                                <a  class="list-group-item">
                                    <i></i> Gender:{{Auth::user()->gender}}
                                </a>
                                <a  class="list-group-item">
                                    <i></i> Birthday:{{Auth::user()->birthday}}
                                </a>
                            </div>
                            <!-- /.list-group -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <!-- /.panel -->
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('js')
    <!-- jQuery -->
    <script src="assets_dashboard/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets_dashboard/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets_dashboard/js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets_dashboard/js/startmin.js"></script>

    <!-- ckeditor5 -->
    <script src="ckeditor5/build/ckeditor.js"></script>
    <script>
        function ChangeToSlug() {
            var name, slug;
            //L???y text t??? th??? input title
            name = document.getElementById("name").value;
            //?????i ch??? hoa th??nh ch??? th?????ng
            slug = name.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
            slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
            slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
            slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
            slug = slug.replace(/??|???|???|???|???/gi, 'y');
            slug = slug.replace(/??/gi, 'd');
            //X??a c??c k?? t??? ?????t bi???t
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
            slug = slug.replace(/ /gi, "-");
            //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
            //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox c?? id ???slug???
            document.getElementById('slug').value = slug;
        }
    </script>
@endsection
