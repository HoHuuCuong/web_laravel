@extends('admin.main')


@section('content')
<form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input type="text" class="form-control" value=" {{ $menu->name }}" id="name" name="name" placeholder="Nhập tên danh mục">
                  </div>

                  <div class="form-group">
                    <label for="menu">Danh mục</label>
                   <select  class="form-control" name="parent_id">
                        <!-- <option value="0">Danh mục cha</option>
                        <option value="1">Danh mục mẹ</option> -->
                        @foreach($menus as $menus)
                        <option value="{{$menus->id }}" {{ $menus->id==$menu->id ? 'selected' : ''}} >{{$menus->name}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <textarea name="description" class="form-control">{{$menu->description}}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả chi tiết</label>
                    <textarea name="content"  class="form-control">{{$menu->content}}</textarea>
                  </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Kích hoạt</label>
                        <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="active" id="active" {{ $menu->active=="1" ? 'checked' : ''}}>
                          <label for="active" class="form-check-label">Có</label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" value="0" type="radio" name="active" id="active" {{ $menu->active=="0" ? 'checked' : ''}}>
                          <label for="noactive" class="form-check-label">Không</label>
                        </div>

                      </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
                  @csrf
                </div>

              </form>


@endsection
