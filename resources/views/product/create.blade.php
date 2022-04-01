@extends('home')
@section('dashboard')
<div class="card">
    <div class="card-header">
        <a href="{{route('product.index')}}" class="btn btn-success pull-end"><< Back</a>
        <h3 class="card-title mt-3">Add Product</h3>
    </div>
    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 

            <div class="form-group">
                <label>Product Category</label>
                <select name="category" class="form-control category-select">
                    <option>--PILIH--</option>
                    @foreach ($category as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                   
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="progress mt-2">
                    <div class="progress-bar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                    0%
                </div>
               
            </div> 
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror ">{{old('description')}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 

            <div class="form-group">
                <label>Price</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> 

         
        
        </div>
       
        <div class="card-footer">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="reset" class="btn btn-danger me-md-1" >Reset</button>
                <button type="submit" class="btn btn-primary" >Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
@push('js')

<script>
    $(document).ready(function() {
        $('.category-select').select2();

        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
        console.error( error );
        } );

        // $('form').ajaxForm({
        //     beforeSend:function(){
        //         $('#success').empty();
        //         $('.progress-bar').text('0%');
        //         $('.progress-bar').css('width', '0%');
        //     },
        //     uploadProgress:function(event, position, total, percentComplete){
        //         $('.progress-bar').text(percentComplete + '0%');
        //         $('.progress-bar').css('width', percentComplete + '0%');
        //     },
        //     success:function(data)
        //     {
        //         if(data.success)
        //         {
        //             $('.progress-bar').text('Uploaded');
        //             $('.progress-bar').css('width', '100%');
        //             $("#form").submit();
        //         }else{
        //             Swal.fire({
        //             title: 'error',
        //             text: data.message,
        //             icon: 'error',
        //         });
        //         }
        //     },
        //     error:function(err,msg){
        //         Swal.fire({
        //             title: 'error',
        //             text: err.responseText,
        //             icon: 'error',
        //         });
        //     }
        // });
    });
</script>
    
@endpush