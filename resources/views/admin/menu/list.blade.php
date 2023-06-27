@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>

        @foreach($menus as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <?php
            if(  $row->active==0){
                ?>
                <td><span class="btn btn-danger ">No</span> </td>
           <?php }
           else{
            ?>
              <td><span class="btn btn-success ">Yes</span> </td>
          <?php }
            ?>

            <td><a href="/admin/menus/edit/{{$row->id}}">Edit</a><br>
                <form method="POST" action="/admin/menus/delete/{{$row->id}}" onsubmit="return ConfirmDelete( this )">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>


@endsection

<!-- {!! \App\Helpers\helper::menu($menus) !!} -->