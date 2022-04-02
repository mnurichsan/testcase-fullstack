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
                <input type="file" accept="image/*" id="image" name="image" class="image @error('image') is-invalid @enderror">
                @error('image')
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

         

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror ">{{old('description')}}</textarea>
                @error('description')
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

        FilePond.registerPlugin(
                FilePondPluginImagePreview,
            );

            $('.image').filepond({
                allowMultiple: false,
              
            });

            FilePond.setOptions({
                server: {
                    process: {
                        url: "{{route('product.image')}}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    },
                    revert: {
                        url: "{{route('productdelete.image')}}",
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        success:function(data){
                            console.log(data)
                        },
                        error:function(err){
                            console.log(err)
                        }
                    }
                }
            });
            const inputElement = document.querySelector('input[type="image"]');
            const pond = FilePond.create(inputElement,{
                // Only accept images
                acceptedFileTypes: ['image/*'],
            });

   

    });
</script>
    
@endpush