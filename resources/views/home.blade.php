@extends('layouts.layout')

@section('content')
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="mb-4 mt-4">{{ __('Lista de atividades') }}</h1>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-6">
            <h3>Olá {{ Auth::user()->name }}, bom ver você por aqui!</h3>
            <p>Temos atividades para serem feitas, não é mesmo? :)</p>
        </div>

        <div class="col-6">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card card-success card-outline">
                <div class="card-header" style="border-bottom: none !important;">
                    <h2 class="card-title" style="font-size: 2rem">Criar atividade</h2>

                    <small style="position: absolute; margin-left: 10px; margin-top: 2%">Confira suas atividades do dia.</small>

                    <div class="card-tools">
                        <button type="button" class="btn btn-outline-success float-right" id="new"><i class="fas fa-plus"></i> Nova atividade</button>
                    </div>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        <div class="dd">
                            <ol class="dd-list">
                                <li class="dd-item shadow-sm" data-id="1">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 1</div>
                                </li>
                                <li class="dd-item shadow-sm" data-id="2">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 2</div>
                                </li>
                                <li class="dd-item shadow-sm" data-id="3">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 3</div>
                                    <ol class="dd-list">
                                        <li class="dd-item shadow-sm" data-id="4">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 4</div>
                                        </li>
                                        <li class="dd-item shadow-sm" data-id="5" data-foo="bar">
                                            <div class="dd-handle dd3-handle"></div>
                                            <div class="dd3-content">Item 5</div>
                                        </li>
                                    </ol>
                                </li>
                                <li class="dd-item shadow-sm" data-id="6">
                                    <div class="dd-handle dd3-handle"></div>
                                    <div class="dd3-content">Item 6</div>
                                </li>
                            </ol>
                        </div>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-3 card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title">Atividades em aberto</h5>
                    <p class="card-text">Confira suas atividades em aberto</p>
                </div>

                <div class="card-footer">
                    <p class="card-text d-inline">Card footer</p>
                    <a href="javascript:void()" class="card-link float-right">Card link</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('.dd').nestable({
            scroll: true,
            beforeDragStop: function(l,e, p){
                // l is the main container
                // e is the element that was moved
                // p is the place where element was moved.
                var teste = $('.dd').nestable('serialize');
                console.log(teste);
            }
        });

        $("#new").click(function(e) {
            e.preventDefault();

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success shadow',
                                        cancelButton: 'btn btn-secondary shadow',
                                        input: 'form-control form-control-lg'
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html: "<label for='tarefa'>Insira o nome de sua tarefa</label>",
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                },
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                confirmButtonText: 'Criar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return new Promise(function(resolve) {
                        setTimeout(function() {
                            resolve();
                        }, 2000);
                    });
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('atividades.store') }}",
                    {
                        tarefa: result
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: 'Ítem inserido com sucesso!',
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-center',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        Toast.fire({
                            icon: 'error',
                            title: 'O ítem não pôde ser inserido!'
                        });
                    })
                    .always(function (data) {

                    });
                }
            });
        });
    </script>
@endsection
