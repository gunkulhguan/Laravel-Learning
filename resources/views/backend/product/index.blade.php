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

                        <h3>สินค้าทั้งหมด : {{ $product->total() }}</h3>
                        <a href="{{ route('product.create') }}" class="btn btn-primary btn-lg">เพิ่มสินค้า</a>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">รหัส</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">ราคา</th>
                                <th scope="col">vat</th>
                                <th scope="col">รูปภาพ</th>
                                <th scope="col">ประเภทสินค้า</th>
                                <th scope="col">วันที่สร้าง/แก้ไข</th>
                                <th scope="col">เครื่องมือ</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->nameproducts }}</td>
                                    <td>{{ $data->price }}</td>
                                    <td>{{ $data->vatproduct }}</td>
                                    <td><img width="60" src="{{ asset('storage/images/resize/'.$data->picture) }}"></td>
                                    <td>{{ $data->category->name }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        <a class="btn btn-info btn-sm " href="{{ route('product.edit',['id'=>$data->id]) }}">
                                            <li class="fa fa-pencil text-white"></li>
                                        </a>

                                        <form method="POST" class="d-inline" action="{{ route('product.destroy',['id'=>$data->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><li class="fa fa-trash text-white"></li></button>

                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                          {{ $product->links() }}


                    </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

@endsection

@section('script')

<script src="{{ asset('js/sweetalert.min.js') }}"></script>

    @if (Session::has('feedback'))

        <script type="text/javascript">
            swal("{{ Session::get('feedback') }}","ผลการทำงาน","success")
        </script>

    @endif

@endsection
