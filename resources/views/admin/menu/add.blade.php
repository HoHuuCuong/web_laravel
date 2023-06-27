@extends('admin.main')


@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="menu">Danh mục</label>
                   <select  class="form-control" name="parent_id">
                        <option value="0">Danh mục cha</option>
                        <option value="1">Danh mục mẹ</option>
                        @foreach($menus as $menu)
                        <option value="{{$menu->id }}">{{$menu->name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea name="description" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả chi tiết</label>
                    <textarea name="content" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Kích hoạt</label>
                        <div class="form-check">
                          <input class="form-check-input" value="1" type="radio" name="active" id="active">
                          <label for="active" class="form-check-label">Có</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" value="0" type="radio" name="active" id="noactive" checked="">
                          <label for="noactive" class="form-check-label">Không</label>
                        </div>

                      </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo danh mục</button>
                  @csrf
                </div>

              </form>


@endsection
