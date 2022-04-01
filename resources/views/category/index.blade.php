@extends('home')
@section('dashboard')
<div class="card">
    <div class="card-header">
        <a href="{{route('category.create')}}" class="btn btn-success">+ Add Category</a>
    </div>

    <div class="card-body">
        <table id="categoryTable" class="table table-responsive table-striped table-hover">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Action</td>
                </tr>
            </thead>
          </table>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        load_data();

        function load_data(unit = '') {
            $('#categoryTable').DataTable({
                "pageLength": 10,
                "processing": true,
                "serverside": true,
                "scrollX": true,
                "language": {
                    "processing": 'Loading...'
                },
                "serverSide": true,
                "ajax": {
                    url: "{{route('category.index')}}",
                },
                "columns": [{
                        "data": "DT_RowIndex",
                        "orderable": false,
                        "searchable": false
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "action",
                        "orderable": false,
                        "searchable": false
                    },
                ],
                "bAutoWidth": false,
                "columnDefs": [{
                    targets: [0, 1],
                    className: 'text-center'
                }],
                "bDestroy": true,
            });
        }

    });

    function alertDelete(id) {
        Swal.fire({
            title: 'Are You Sure ?',
            text: "Anda akan menghapus kategori",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya'
        }).then((result) => {
            if (result.isConfirmed) {
                hapus(id);
            }
        })
    }

    function hapus(id) {
        var _token = "{{ csrf_token() }}";
        $.ajax({
            url: "{{route('category.destory')}}",
            method: "POST",
            data: {
                _token: _token,
                id: id
            },
            beforeSend: function() {
                Swal.fire({
                    title: 'Mohon Tunggu',
                    icon: 'warning',
                    showCancelButton: false,
                    showConfirmButton: false
                });
            },
            success: function(data) {
                console.log(data);
                Swal.fire({
                    title: 'Success',
                    text: data.message,
                    icon: 'success',
                });
                setTimeout(() => {
                    location.reload()
                }, 1000);
            },
            error: function() {}
        })
    }
</script>
@endpush