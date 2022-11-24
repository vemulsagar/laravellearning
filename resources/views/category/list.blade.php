<!DOCTYPE html>
<html lang="en">
<head>
  <title>Category List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Category List</h2>
  <a class="btn btn-success" style='float:right' href="{{route('category.create')}}">Add Category</a><br/><br/>
  @if(Session::has('success'))
  <span class='text-success'>{{Session::get('success')}}</span><br/>
  @endif
  @if(Session::has('error'))
  <span class='text-danger'>{{Session::get('error')}}</span><br/>
  @endif
  <table class="table">
    <thead class="table-dark">
      <tr>
        <th>Sr No</th>
        <th>Category Name</th>
        <th>Featured Image</th>
        <th>Created On</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($result as $row)
         @php
         $tr_class="";
         if(!empty($row->deleted_at)){
          $tr_class="table-danger";
         }
         @endphp
       <tr class="{{$tr_class}}">
        <td>{{$loop->iteration}}</td>
        <td>{{$row->category_name}}</td>
        <td>
           @if(!empty($row->category_file))    
        <img src="{{asset('storage/media/'.$row->category_file)}}" style='width:50px;height:50px;'>
        @endif
      </td>
        
        <td>{{$row->created_at}}</td>
        <td>
            <a class="btn btn-warning" href="{{route('category.edit',['id'=>$row->id])}}">Edit</a>
            @if(!empty($row->deleted_at))
            <a class='btn btn-success' href="{{route('category.restore',['id'=>$row->id])}}">Activate</a>
            @else
            <a class='btn btn-danger' href="{{route('category.destroy',['id'=>$row->id])}}">Deactivate</a>
            @endif
            
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$result->links()}}
</div>

</body>
</html>
