@extends('layouts.master')
@push('css')
 <!-- CSS for this page only -->
<link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">

    <!-- End CSS  -->
@endpush
@section('content')
<div class="main-content">
    <div class="title">
        Konfigurasi
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Roles</h4>
                    </div>
                    <div class="card-body">
                        @if (request()->user()->can('create role'))
                        <button type="button" class="btn mb-2 btn-primary btn-add"><i class="ti-plus"></i></button>
                        @endif
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
          
        </div>
    </div>

                        <div class="modal fade" id="modalAction" tabindex="-1" aria-labelledby="largeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                              
                            </div>
                        </div>
   
    

</div>

@endsection

@push('js')
<script src="{{ asset('') }}vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('') }}vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('') }}vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
{{ $dataTable->scripts() }}
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script>
    const modal = new bootstrap.Modal($('#modalAction'))

    $('.btn-add').on('click',function (params) {
        $.ajax({
            method:'get',
            url:`{{url('konfigurasi/roles/create')}}`,
            success:function (res) {
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                simpan()
            }
        })
    })

    function simpan() {
            $('#formAction').on('submit',function (e) {
                e.preventDefault()
                let formData = $(this).serialize();
                let url = this.getAttribute('action');


                $.ajax({
                    method:'post',
                    url:url,
                    data:formData,
                    success:function (res) {
                        window.LaravelDataTables['role-table'].ajax.reload()
                        modal.hide()
                    },
                    error:function (res) {
                        let errors = res.responseJSON?.errors
                      

                        if(errors){
                            $('span').text('')
                            for(const [key,value] of Object.entries(errors)){
                                $(`[name='${key}']`).parent().append(`<span class="text-danger">${value}</span>`)
                            }
                        }
                    }
                 })
                
            })
        }
    
    
    $('#role-table').on('click','.action',function (params) {
        let data = $(this).data()
        let id = data.id
        let jenis = data.jenis

        if (jenis === 'delete') {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
             }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method:'get',
                        url:`{{url('konfigurasi/roles/${id}')}}`,
                        success:function (res) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                             )
                             window.LaravelDataTables['role-table'].ajax.reload()

                           
                        }
                    })
               
                 }
             })
            return
        }

        $.ajax({
            method:'get',
            url:`{{url('konfigurasi/roles/${id}/edit')}}`,
            success:function (res) {
                $('#modalAction').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })

        function store() {
            $('#formAction').on('submit',function (e) {
                e.preventDefault()
                let formData = $(this).serialize();
                let url = this.getAttribute('action');
                



                $.ajax({
                    method:'post',
                    url:url,
                    data:formData,
                    success:function (res) {
                        window.LaravelDataTables['role-table'].ajax.reload()
                        modal.hide()
                    },
                    error:function (res) {
                        let errors = res.responseJSON?.errors

                        if(errors){
                            $('span').text('')
                            for(const [key,value] of Object.entries(errors)){
                                $(`[name='${key}']`).parent().append(`<span class="text-danger">${value}</span>`)
                            }
                        }
                    }
                 })
                
            })
        }


    })

    
</script>
@endpush