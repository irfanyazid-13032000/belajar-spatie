@extends('layouts.master')
@push('css')
 <!-- CSS for this page only -->
<link href="{{ asset('') }}vendor/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="{{ asset('') }}vendor/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet" />
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
                        <button type="button" class="btn mb-2 btn-primary"><i class="ti-plus"></i></button>
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
<script src="{{ asset('') }}vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
{{ $dataTable->scripts() }}

<script>
    const modal = new bootstrap.Modal($('#modalAction'))
    $('#role-table').on('click','.action',function (params) {
        let data = $(this).data()
        let id = data.id
        let jenis = data.jenis


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


                $.ajax({
                    method:'post',
                    url:`{{url('konfigurasi/roles/${id}/update')}}`,
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