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
                        <h3>สินค้าทั้งหมด : {{ $all_category }}</h3>
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">รหัส</th>
                                <th scope="col">ชื่อสินค้า</th>
                                <th scope="col">วันที่เพิ่ม</th>
                                <th scope="col">วันที่แก้ไข</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $data)
                                <tr>
                                    <th scope="row">{{ $data->id }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>



                    </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

@endsection

@section('script')


@endsection
