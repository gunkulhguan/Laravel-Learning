@extends('layouts.backend.layouts.backend')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @if (count($errors) > 0)

                                <div class="row">
                                    <div class="col-md-12">

                                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">**** ข้อผิดพลาดในการบันทึกข้อมูล ****</h4>
                                    <hr>
                                        @foreach ($errors->all() as $error)
                                        <p>- {{ $error }}</p>
                                        @endforeach

                                            </div>

                            </div>
                        </div>
                        @endif
                        <div class="card-body">
                            {{ Form::open(['url' => route('product.store'), 'method' => 'post' ,'files' => true ,'enctype'=>'multipart/form-data']) }}
                            @csrf
                                <div class="form-group">
                                  <label for="exampleInputEmail1">ชื่อสินค้า</label>
                                  <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="กรอกชื่อสินค้า">

                                </div>
                                <div class="form-group">
                                  <label for="exampleInputPassword1">ราคา</label>
                                  <input name="price" type="text" class="form-control" id="price" placeholder="กรอกราคา">
                                </div>
                                <div class="form-group">
                                    {{ Form::select('category_id', $category_all ,null,['class' => 'form-control']) }}
                                </div>
                                <div class="form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">

                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="picture" name="picture">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                                  </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('script')

<script src="{{ asset('js/sweetalert.min.js') }}"></script>
    @if (count($errors) > 0)
        @if (Session::has('fail'))

            <script type="text/javascript">
                swal("{{ Session::get('fail') }}","กรุณากรอกข้อมูลให้ถูกต้อง","error")
            </script>

        @endif
    @endif

@endsection
