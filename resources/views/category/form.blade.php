<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>{{$form_type}}</h2>
  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <span class='text-danger'>* {{$error}}</span><br/>
     @endforeach
 @endif
  <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
  @csrf  
  <div class="mb-3 mt-3">
      <label for="category_name">Category Name</label>
      <input type="category_name" class="form-control" id="category_name" placeholder="Enter Category" name="category_name" value="{{old('category_name',isset($form_result->category_name)?$form_result->category_name:'')}}">
    </div>
    <div class="mb-3">
      <label for="category_file">Category File</label>
      <input type="file" class="form-control" id="category_file" placeholder="Category File" name="category_file">
      @if(isset($form_result->category_file) && !empty($form_result->category_file))
      <img src="{{asset('storage/media/'.$form_result->category_file)}}" style='width:50px;height:50px;'>
        @endif
       
    </div>

    @if(isset($form_result->id) && $form_result->id>0)
    <input type="hidden" value="{{$form_result->id}}" name="id">
    @endif
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
