@extends('layouts.layout')

@section('content')
@php
    $classEspecial = '';
    $arrayFilhos = [];
    $concluded = "";
@endphp
    <div class="row mt-3" id="atividades">
        @foreach($arrayFinal as $atividade)
        <div class="col-xl-4" id="box-atividade-{{ $atividade["id"] }}">
            <div class="uk-card uk-card-default uk-card-hover uk-card-body mb-5 card-atividade-{{ $atividade["id"] }}" style="padding: 2px">
                <div class="uk-card-header" style="padding: 10px">
                    <div class="atividade-actions float-right">
                        <i class="fas fa-pencil-alt text-warning edit-atividade" data-atividade="{{ $atividade["id"] }}" uk-tooltip="Alterar atividade"></i>&nbsp;
                        <i class="fas fa-trash text-danger remove-atividade" data-atividade="{{ $atividade["id"] }}" uk-tooltip="Excluir atividade"></i>&nbsp;
                        <i class="fas fa-plus text-success new-item" data-atividade="{{ $atividade["id"] }}" uk-tooltip="Adicionar item"></i>
                    </div>

                    <h2 class="uk-card-title" id="atividade{{ $atividade["id"] }}">
                        {{ $atividade["nome"] }}
                    </h2>

                    <div class="small uk-text-italic" style="margin-top: -5%">
                        Em:  {{ date('d/m/Y H:m', strtotime($atividade["created_at"])) }}
                    </div>
                </div>

                <div class="uk-card-body" style="padding: 10px">
                    <ul class='list-itens uk-list' id="itens-atividade-{{ $atividade["id"] }}">
                        @forelse($atividade["itens"] as $item_atividade)
                            @if(!in_array($item_atividade["id"], $arrayFilhos))
                                @php $concluded = $item_atividade["concluded_at"]; @endphp
                                @if(is_null($item_atividade["concluded_at"]))
                                    <li id="item-list-{{ $item_atividade["id"] }}" data-atividade-id="{{ $atividade["id"] }}" data-order="{{ $item_atividade["ordem"] }}" @if(count($item_atividade["itens_itens"]) > 0) class="s-l-open" @endif>
                                        <div id="item-card-{{ $item_atividade["id"] }}" class="uk-card uk-card-default uk-card-hover uk-card-body" style="padding: 10px">
                                            <span class="uk-sortable-handle uk-margin-small-right uk-text-center" uk-icon="icon: table" id="item-handle-{{ $item_atividade["id"] }}"></span>
                                            <span id="item-nome-{{ $item_atividade["id"] }}">
                                                {{ $item_atividade["nome"] }}
                                                <div id="actions-list-{{ $item_atividade["id"] }}" class="item-actions float-right {{ $classEspecial }}" style="display:none">
                                                    <button class="btn btn-sm btn-outline-success text-sm mr-0 shadow-sm conclude-item" uk-tooltip="Concluir item" data-item="{{ $item_atividade["id"] }}" data-atividade="{{ $atividade["id"] }}"><i class="fas fa-check"></i></button>
                                                    <button class="btn btn-sm btn-outline-warning text-sm mr-0 shadow-sm edit-item" uk-tooltip="Alterar item" data-item="{{ $item_atividade["id"] }}" data-atividade="{{ $atividade["id"] }}"><i class="fas fa-pencil-alt"></i></button>
                                                    <button class="btn btn-sm btn-outline-danger text-sm mr-0 shadow-sm remove-item" uk-tooltip="Remover item" data-item="{{ $item_atividade["id"] }}" data-atividade="{{ $atividade["id"] }}"><i class="fas fa-trash"></i></button>
                                                    {{-- <span class=" text-sm mr-2 new-subitem text-primary" uk-tooltip="Adicionar sub-item" data-item="{{ $item_atividade["id"] }}" data-atividade="{{ $atividade["id"] }}"><i class="fas fa-plus"></i></span> --}}
                                                </div>
                                            </span>
                                        </div>
                                        @if(count($item_atividade["itens_itens"]) > 0)
                                            @php $classEspecial = 'corrige-item-actions'; @endphp
                                            <ul class='listsCss list-subitens' id="itens-itens-atividade-{{ $item_atividade["id"] }}">
                                                @foreach($item_atividade["itens_itens"] as $item_item_atividade)
                                                    @php array_push($arrayFilhos, $item_item_atividade["item_filho_id"]); @endphp
                                                    @if($concluded == "")
                                                        <li id="sub-item-list-{{ $item_item_atividade["item_filho_id"] }}" data-atividade-id="{{ $atividade["id"] }}" data-order="{{ $item_item_atividade["ordem"] }}">
                                                            <div class="uk-card uk-card-default uk-card-hover uk-card-body" style="padding: 10px">
                                                                <span class="uk-sortable-handle uk-margin-small-right uk-text-center" uk-icon="icon: table"></span>
                                                                <span id="item-nome-{{ $item_item_atividade["item_filho_id"] }}">
                                                                    {{ $item_item_atividade["nome"] }}
                                                                    <div id="actions-list-subitem-{{ $item_item_atividade["item_filho_id"] }}" class="item-actions float-right corrige-item-actions-subitem" style="display:none">
                                                                        <span class="btn btn-sm btn-outline-success text-sm mr-0 shadow-sm conclude-item" uk-tooltip="Concluir item" data-item="{{ $item_item_atividade["item_filho_id"] }}" data-atividade="{{ $item_item_atividade["atividade_id"] }}"><i class="fas fa-check"></i></span>
                                                                        <span class="btn btn-sm btn-outline-warning text-sm mr-0 shadow-sm edit-item" uk-tooltip="Alterar item" data-item="{{ $item_item_atividade["item_filho_id"] }}" data-atividade="{{ $item_item_atividade["atividade_id"] }}"><i class="fas fa-pencil-alt"></i></span>
                                                                        <span class="btn btn-sm btn-outline-danger text-sm mr-0 shadow-sm remove-item" uk-tooltip="Remover item" data-item="{{ $item_item_atividade["item_filho_id"] }}" data-atividade="{{ $item_item_atividade["atividade_id"] }}"><i class="fas fa-trash"></i></span>
                                                                        {{-- <span class=" text-sm mr-2 new-subitem"><i class="fas fa-plus text-primary" uk-tooltip="Adicionar sub-item" data-item="{{ $item_item_atividade["item_filho_id"] }}" data-atividade="{{ $item_item_atividade["atividade_id"] }}"></i></span> --}}
                                                                    </div>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    @else
                                                        <li id="sub-item-list-{{ $item_item_atividade["item_filho_id"] }}">
                                                            <span id="item-card-{{ $item_item_atividade["item_filho_id"] }}" class="uk-card uk-card-primary uk-card-hover uk-card-body" style="padding: 10px">
                                                                {{ $item_item_atividade["nome"] }}
                                                            </span>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        @else
                                            @php $classEspecial = ''; @endphp
                                        @endif
                                    </li>
                                @else
                                    <li id="item-list-{{ $item_atividade["id"] }}">
                                        <span id="item-card-{{ $item_atividade["id"] }}" class="uk-card uk-card-primary uk-card-hover uk-card-body" style="padding: 10px">
                                            {{ $item_atividade["nome"] }}
                                        </span>
                                    </li>
                                @endif
                            @endif
                        @empty
                            <li id="empty-{{ $atividade["id"] }}">Lista vazia</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script>
        var options = {
            maxLevels: 2,
            hintClass: 'hintClass', // place to drop
            hintWrapperClass: 'hintWrapperClass', // the new place
            listsClass: 'listsCss',
            placeholderClass: 'placeholderClass', // the older place
            insertZone: 50,
            insertZonePlus: true,
            ignoreClass: 'item-actions',
            opener: {
                active: true,
                as: 'html',  // or "class"
                close: '<i class="fa fa-minus uk-text-secondary"></i>',
                open: '<i class="fa fa-plus uk-text-secondary"></i>',
                openerClass: 'openerCss' // css class
            },
            onDragStart: function(e, el)
            {
                /*let list_id = el.attr("id").split("-");
                $("#actions-list-"+list_id[list_id.length - 1]).hide();*/
            },
            complete: function(currEl)
            {
                /*let list_id = currEl.attr("id").split("-");
                $("#actions-list-"+list_id[list_id.length - 1]).show();*/
            },
            onChange: function(currEl)
            {
                let atividade_id = currEl.attr("data-atividade-id");
                let item_nome    = currEl.text().trim();
                let lista        = $("#itens-atividade-"+atividade_id).sortableListsToArray();
                //let lista        = $("#itens-atividade-"+atividade_id).sortableListsToString();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.post("{{ route('lista_de_itens.listaAtividade') }}",
                    {
                        lista: lista,
                        atividade: atividade_id,
                        item_nome: item_nome
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                        console.log(data);
                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
            }
        }
        $("ul.list-itens").sortableLists(options);

        $("ul.list-itens > li").hover(
            function() {
                let list_id = $(this).attr("id").split("-");
                $("#actions-list-"+list_id[list_id.length - 1]).show();
            },
            function() {
                let list_id = $(this).attr("id").split("-");
                $("#actions-list-"+list_id[list_id.length - 1]).hide();
            }
        );

        $("ul.list-subitens > li").hover(
            function() {
                let list_id = $(this).attr("id").split("-");
                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeIn(200);
            },
            function() {
                let list_id = $(this).attr("id").split("-");
                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeOut(200);
            }
        );

        $("#new").click(function(e) {
            e.preventDefault();

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success btn-block shadow',
                                        cancelButton: 'btn btn-secondary shadow',
                                        input: 'form-control form-control-lg'
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html: "<label for='tarefa' class='text-left'>Insira um nome para sua atividade?</label>",
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                },
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: false,
                showCloseButton: true,
                confirmButtonText: 'Adicionar atividade',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    //Funciona como um um middleware
                    $("#atividades").append("<div class='overlay uk-text-center' id='load-atividade-create'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('atividades.store') }}",
                    {
                        tarefa: result.value
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        makeBox(data.atividade, "atividades");
                        $("#load-atividade-create").fadeOut(200);
                        setTimeout(() => { $("#load-atividade-create").remove(); }, 1000);

                        $(".edit-atividade").click(function(e) {
                            e.preventDefault();

                            let atividade_id = $(this).attr("data-atividade");
                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                            let swal = Swal.mixin({
                                                    customClass: {
                                                        confirmButton: 'btn btn-success btn-block shadow',
                                                        cancelButton: 'btn btn-secondary shadow',
                                                        input: 'form-control form-control-lg'
                                                    },
                                                    buttonsStyling: false
                                                });
                            swal.fire({
                                //title: 'Tarefa',
                                html: "<label for='tarefa' class='text-left'>Alterar a atividade?</label>",
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off',
                                    value: ($("#atividade"+atividade_id).text()).trim()
                                },
                                inputValue: ($("#atividade"+atividade_id).text()).trim(),
                                // onBeforeOpen: function(element) {
                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                // },
                                showCancelButton: false,
                                showCloseButton: true,
                                confirmButtonText: 'Alterar atividade',
                                cancelButtonText: 'Cancelar',
                                showLoaderOnConfirm: true,
                                preConfirm: () => {
                                    //Funciona como um um middleware
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.post("{{ route('atividades.index') }}/"+atividade_id,
                                    {
                                        tarefa: result.value,
                                        _method: "PUT"
                                    },
                                    function () {
                                    })
                                    .done(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            grow: 'fullscreen',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: data.message,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        });

                                        $("#atividade"+atividade_id).html(data.atividade.nome);
                                        $("#load-atividade"+atividade_id).fadeOut(200);
                                        setTimeout(() => { $("#load-atividade"+atividade_id+"").remove(); }, 1000);
                                    })
                                    .fail(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-start',
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
                                            title: data.message
                                        });
                                    })
                                    .always(function (data) {

                                    });
                                }
                                else {
                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                                }
                            });
                        });

                        $(".remove-atividade").click(function(e) {
                            e.preventDefault();

                            let atividade_id = $(this).attr("data-atividade");
                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                            let swal = Swal.mixin({
                                                    customClass: {
                                                        confirmButton: 'btn btn-danger mr-4 shadow',
                                                        cancelButton: 'btn btn-secondary shadow',
                                                    },
                                                    buttonsStyling: false
                                                });
                            swal.fire({
                                //title: 'Tarefa',
                                html:
                                    "<h2>Quer mesmo remover a atividade?</h2>\n"+
                                    "<input id='atividade_del' type='hidden' class='swal2-input' value='"+atividade_id+"'/>",
                                // onBeforeOpen: function(element) {
                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                // },
                                showCancelButton: true,
                                showCloseButton: true,
                                confirmButtonText: 'Remover atividade',
                                cancelButtonText: 'Cancelar',
                                showLoaderOnConfirm: true,

                                //Funciona como um um middleware
                                preConfirm: () => {
                                    return  document.getElementById('atividade_del').value;
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.post("{{ route('atividades.index') }}/"+atividade_id,
                                    {
                                        tarefa: result.value,
                                        _method: "DELETE"
                                    },
                                    function () {
                                    })
                                    .done(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            grow: 'fullscreen',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: data.message,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        });

                                        $("#box-atividade-"+data.atividade_id).fadeOut(400);
                                        $(".card-atividade-"+atividade_id).fadeOut(300);
                                    })
                                    .fail(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-start',
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
                                            title: data.message
                                        });
                                    })
                                    .always(function (data) {

                                    });
                                }
                                else {
                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                                }
                            });
                        });

                        $(".new-item").click(function(e) {
                            e.preventDefault();

                            let atividade_id = $(this).attr('data-atividade');

                            let swal = Swal.mixin({
                                                    customClass: {
                                                        confirmButton: 'btn btn-success btn-block shadow',
                                                        cancelButton: 'btn btn-secondary shadow',
                                                        input: 'form-control form-control-lg'
                                                    },
                                                    buttonsStyling: false
                                                });
                            swal.fire({
                                //title: 'Tarefa',
                                html: "<label for='tarefa' class='text-left'>Adicione um item para a atividade</label>",
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off',
                                },
                                // onBeforeOpen: function(element) {
                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                // },
                                showCancelButton: false,
                                showCloseButton: true,
                                confirmButtonText: 'Adicionar item',
                                cancelButtonText: 'Cancelar',
                                showLoaderOnConfirm: true,
                                //Funciona como um um middleware
                                preConfirm: () => {
                                    $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.post("{{ route('item_de_atividades.store') }}",
                                    {
                                        item: result.value,
                                        atividade_id: atividade_id
                                    },
                                    function () {
                                    })
                                    .done(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            grow: 'fullscreen',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: data.message,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        });

                                        $("#empty-"+atividade_id).remove();

                                        makeItem(data.item, "itens-atividade-"+atividade_id);

                                        $("#load-atividade"+atividade_id).fadeOut(200);
                                        setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);

                                        $("ul.list-itens > li").hover(
                                            function() {
                                                let list_id = $(this).attr("id").split("-");
                                                $("#actions-list-"+list_id[list_id.length - 1]).show();
                                            },
                                            function() {
                                                let list_id = $(this).attr("id").split("-");
                                                $("#actions-list-"+list_id[list_id.length - 1]).hide();
                                            }
                                        );

                                        $("ul.list-subitens > li").hover(
                                            function() {
                                                let list_id = $(this).attr("id").split("-");
                                                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeIn(200);
                                            },
                                            function() {
                                                let list_id = $(this).attr("id").split("-");
                                                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeOut(200);
                                            }
                                        );

                                        $(".conclude-item").click(function(e) {
                                            e.preventDefault();

                                            let item_id      = $(this).attr("data-item");
                                            let atividade_id = $(this).attr("data-atividade");

                                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                                            let swal = Swal.mixin({
                                                                    customClass: {
                                                                        confirmButton: 'btn btn-warning uk-text-emphasis mr-4 shadow',
                                                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                                                    },
                                                                    buttonsStyling: false
                                                                });
                                            swal.fire({
                                                //title: 'Tarefa',
                                                html:
                                                    "<h2>Concluir item?</h2>\n"+
                                                    "<input id='item_concluir' type='hidden' class='swal2-input' value='"+item_id+"'/>",
                                                // onBeforeOpen: function(element) {
                                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                                // },
                                                showCancelButton: true,
                                                showCloseButton: true,
                                                confirmButtonText: 'Concluir item',
                                                cancelButtonText: 'Cancelar',
                                                showLoaderOnConfirm: true,

                                                //Funciona como um um middleware
                                                preConfirm: () => {
                                                    return  document.getElementById('item_concluir').value;
                                                },
                                                allowOutsideClick: () => !swal.isLoading()
                                            })
                                            .then((result) => {
                                                if (result.isConfirmed) {
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });

                                                    $.post("{{ route('item_de_atividades.concluded') }}",
                                                    {
                                                        item_de_atividade: result.value
                                                    },
                                                    function () {
                                                    })
                                                    .done(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            grow: 'fullscreen',
                                                            showConfirmButton: false,
                                                            timer: 3000,
                                                            timerProgressBar: true
                                                        });

                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: data.message,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });

                                                        $("#item-card-"+item_id).addClass('uk-card-primary').removeClass('uk-card-default');
                                                        $("#item-card-"+item_id+" > span#item-handle-"+item_id).fadeOut(200);
                                                        $("#actions-list-"+item_id).fadeOut(200);

                                                        $("#load-atividade"+atividade_id).fadeOut(200);
                                                        setTimeout(() => {
                                                            $("#load-atividade"+atividade_id+"").remove();
                                                            $("#item-card-"+item_id+" > span#item-handle-"+item_id).remove();
                                                            $("#actions-list-"+item_id).remove();
                                                        }, 300);
                                                    })
                                                    .fail(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-start',
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
                                                            title: data.message
                                                        });
                                                    })
                                                    .always(function (data) {
                                                        //
                                                    });
                                                }
                                                else {
                                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                                                }
                                            });
                                        });

                                        $(".edit-item").click(function(e) {
                                            e.preventDefault();

                                            let item_id      = $(this).attr("data-item");
                                            let atividade_id = $(this).attr("data-atividade");

                                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                                            let swal = Swal.mixin({
                                                                    customClass: {
                                                                        confirmButton: 'btn btn-success uk-text-emphasis text-white mr-4 shadow',
                                                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                                                        input: 'form-control form-control-lg'
                                                                    },
                                                                    buttonsStyling: false
                                                                });
                                            swal.fire({
                                                //title: 'Tarefa',
                                                html: "<label for='tarefa' class='text-left'>Alterar o item?</label>",
                                                input: 'text',
                                                inputAttributes: {
                                                    autocapitalize: 'off',
                                                    value: ($("#item-nome-"+item_id).text()).trim()
                                                },
                                                inputValue: ($("#item-nome-"+item_id).text()).trim(),
                                                // onBeforeOpen: function(element) {
                                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                                // },
                                                showCancelButton: true,
                                                showCloseButton: true,
                                                confirmButtonText: 'Alterar item',
                                                cancelButtonText: 'Cancelar',
                                                showLoaderOnConfirm: true,
                                                preConfirm: () => {
                                                    //Funciona como um um middleware
                                                },
                                                allowOutsideClick: () => !swal.isLoading()
                                            })
                                            .then((result) => {
                                                if (result.isConfirmed) {
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });

                                                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                                                    {
                                                        item_de_atividade: result.value,
                                                        _method: "PUT"
                                                    },
                                                    function () {
                                                    })
                                                    .done(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            grow: 'fullscreen',
                                                            showConfirmButton: false,
                                                            timer: 3000,
                                                            timerProgressBar: true
                                                        });

                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: data.message,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });

                                                        $("#item-nome-"+item_id).html(data.item.nome);
                                                        $("#load-atividade"+atividade_id).fadeOut(200);
                                                        setTimeout(() => { $("#load-atividade"+atividade_id+"").remove(); }, 1000);
                                                    })
                                                    .fail(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-start',
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
                                                            title: data.message
                                                        });
                                                    })
                                                    .always(function (data) {
                                                        //
                                                    });
                                                }
                                                else {
                                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                                                }
                                            });
                                        });

                                        $(".remove-item").click(function(e) {
                                            e.preventDefault();

                                            let item_id      = $(this).attr("data-item");
                                            let atividade_id = $(this).attr("data-atividade");
                                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                                            let swal = Swal.mixin({
                                                                    customClass: {
                                                                        confirmButton: 'btn btn-danger uk-text-emphasis text-white mr-4 shadow',
                                                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                                                    },
                                                                    buttonsStyling: false
                                                                });
                                            swal.fire({
                                                //title: 'Tarefa',
                                                html:
                                                    "<h2>Quer mesmo remover o item?</h2>\n"+
                                                    "<input id='item_del' type='hidden' class='swal2-input' value='"+item_id+"'/>",
                                                // onBeforeOpen: function(element) {
                                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                                // },
                                                showCancelButton: true,
                                                showCloseButton: true,
                                                confirmButtonText: 'Remover item',
                                                cancelButtonText: 'Cancelar',
                                                showLoaderOnConfirm: true,

                                                //Funciona como um um middleware
                                                preConfirm: () => {
                                                    return  document.getElementById('item_del').value;
                                                },
                                                allowOutsideClick: () => !swal.isLoading()
                                            })
                                            .then((result) => {
                                                if (result.isConfirmed) {
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });

                                                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                                                    {
                                                        item_de_atividade: result.value,
                                                        _method: "DELETE"
                                                    },
                                                    function () {
                                                    })
                                                    .done(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            grow: 'fullscreen',
                                                            showConfirmButton: false,
                                                            timer: 3000,
                                                            timerProgressBar: true
                                                        });

                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: data.message,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        });

                                                        $("#item-list-"+data.item_id+", #actions-list-"+data.item_id).fadeOut(400);
                                                        $("#load-atividade"+atividade_id).fadeOut(300);
                                                        setTimeout(() => {
                                                            $("#load-atividade"+atividade_id+", #"+data.item_id+", #actions-list-"+data.item_id).remove();
                                                        }, 1000);
                                                    })
                                                    .fail(function (data) {
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-start',
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
                                                            title: data.message
                                                        });
                                                    })
                                                    .always(function (data) {
                                                        //
                                                    });
                                                }
                                                else {
                                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                                                }
                                            });
                                        });
                                    })
                                    .fail(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-start',
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
                                            title: data.message
                                        });
                                    })
                                    .always(function (data) {
                                        //
                                    });
                                }
                                else {
                                    $("#load-atividade"+atividade_id).fadeOut(200);
                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                                }
                            });
                        });
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
                }
                else {
                    $("#load-atividade-create").fadeOut(200);
                    setTimeout(() => { $("#load-atividade-create").remove(); }, 1000);
                }
            });
        });

        $(".edit-atividade").click(function(e) {
            e.preventDefault();

            let atividade_id = $(this).attr("data-atividade");
            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success btn-block shadow',
                                        cancelButton: 'btn btn-secondary shadow',
                                        input: 'form-control form-control-lg'
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html: "<label for='tarefa' class='text-left'>Alterar a atividade?</label>",
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                    value: ($("#atividade"+atividade_id).text()).trim()
                },
                inputValue: ($("#atividade"+atividade_id).text()).trim(),
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: false,
                showCloseButton: true,
                confirmButtonText: 'Alterar atividade',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    //Funciona como um um middleware
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('atividades.index') }}/"+atividade_id,
                    {
                        tarefa: result.value,
                        _method: "PUT"
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#atividade"+atividade_id).html(data.atividade.nome);
                        $("#load-atividade"+atividade_id).fadeOut(200);
                        setTimeout(() => { $("#load-atividade"+atividade_id+"").remove(); }, 1000);
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {

                    });
                }
                else {
                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                }
            });
        });

        $(".remove-atividade").click(function(e) {
            e.preventDefault();

            let atividade_id = $(this).attr("data-atividade");
            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-danger mr-4 shadow',
                                        cancelButton: 'btn btn-secondary shadow',
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html:
                    "<h2>Quer mesmo remover a atividade?</h2>\n"+
                    "<input id='atividade_del' type='hidden' class='swal2-input' value='"+atividade_id+"'/>",
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Remover atividade',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,

                //Funciona como um um middleware
                preConfirm: () => {
                    return  document.getElementById('atividade_del').value;
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('atividades.index') }}/"+atividade_id,
                    {
                        tarefa: result.value,
                        _method: "DELETE"
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#box-atividade-"+data.atividade_id).fadeOut(400);
                        $(".card-atividade-"+atividade_id).fadeOut(300);
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {

                    });
                }
                else {
                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                }
            });
        });

        $(".new-item").click(function(e) {
            e.preventDefault();

            let atividade_id = $(this).attr('data-atividade');

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success uk-text-emphasis text-white mr-4 shadow',
                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                        input: 'form-control form-control-lg'
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html: "<label for='tarefa' class='text-left'>Adicione um item para a atividade</label>",
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                },
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Adicionar item',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,

                //Funciona como um um middleware
                preConfirm: () => {
                    $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('item_de_atividades.store') }}",
                    {
                        item: result.value,
                        atividade_id: atividade_id
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#empty-"+data.item.atividade_id).remove();

                        makeItem(data.item, "itens-atividade-"+data.item.atividade_id);

                        $("#load-atividade"+data.item.atividade_id).fadeOut(200);
                        setTimeout(() => { $("#load-atividade"+data.item.atividade_id).remove(); }, 1000);

                        $("ul.list-itens").sortableLists(options);

                        $("ul.list-itens > li").hover(
                            function() {
                                let list_id = $(this).attr("id").split("-");
                                $("#actions-list-"+list_id[list_id.length - 1]).show();
                            },
                            function() {
                                let list_id = $(this).attr("id").split("-");
                                $("#actions-list-"+list_id[list_id.length - 1]).hide();
                            }
                        );

                        $("ul.list-subitens > li").hover(
                            function() {
                                let list_id = $(this).attr("id").split("-");
                                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeIn(200);
                            },
                            function() {
                                let list_id = $(this).attr("id").split("-");
                                $("#actions-list-subitem-"+list_id[list_id.length - 1]).fadeOut(200);
                            }
                        );

                        $(".edit-item").click(function(e) {
                            e.preventDefault();

                            let item_id      = $(this).attr("data-item");
                            let atividade_id = $(this).attr("data-atividade");

                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                            let swal = Swal.mixin({
                                                    customClass: {
                                                        confirmButton: 'btn btn-success uk-text-emphasis text-white mr-4 shadow',
                                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                                        input: 'form-control form-control-lg'
                                                    },
                                                    buttonsStyling: false
                                                });
                            swal.fire({
                                //title: 'Tarefa',
                                html: "<label for='tarefa' class='text-left'>Alterar o item?</label>",
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off',
                                    value: data.item.nome
                                },
                                inputValue: data.item.nome,
                                // onBeforeOpen: function(element) {
                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                // },
                                showCancelButton: true,
                                showCloseButton: true,
                                confirmButtonText: 'Alterar item',
                                cancelButtonText: 'Cancelar',
                                showLoaderOnConfirm: true,
                                preConfirm: () => {
                                    //Funciona como um um middleware
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                                    {
                                        item_de_atividade: result.value,
                                        _method: "PUT"
                                    },
                                    function () {
                                    })
                                    .done(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            grow: 'fullscreen',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: data.message,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        });

                                        $("#item-nome-"+item_id).html(data.item.nome);
                                        $("#load-atividade"+atividade_id).fadeOut(200);
                                        setTimeout(() => { $("#load-atividade"+atividade_id+"").remove(); }, 1000);
                                    })
                                    .fail(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-start',
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
                                            title: data.message
                                        });
                                    })
                                    .always(function (data) {
                                        //
                                    });
                                }
                                else {
                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                                }
                            });
                        });

                        $(".remove-item").click(function(e) {
                            e.preventDefault();

                            let item_id      = $(this).attr("data-item");
                            let atividade_id = $(this).attr("data-atividade");
                            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

                            let swal = Swal.mixin({
                                                    customClass: {
                                                        confirmButton: 'btn btn-danger uk-text-emphasis text-white mr-4 shadow',
                                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                                    },
                                                    buttonsStyling: false
                                                });
                            swal.fire({
                                //title: 'Tarefa',
                                html:
                                    "<h2>Quer mesmo remover o item?</h2>\n"+
                                    "<input id='item_del' type='hidden' class='swal2-input' value='"+item_id+"'/>",
                                // onBeforeOpen: function(element) {
                                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                                // },
                                showCancelButton: true,
                                showCloseButton: true,
                                confirmButtonText: 'Remover item',
                                cancelButtonText: 'Cancelar',
                                showLoaderOnConfirm: true,

                                //Funciona como um um middleware
                                preConfirm: () => {
                                    return  document.getElementById('item_del').value;
                                },
                                allowOutsideClick: () => !swal.isLoading()
                            })
                            .then((result) => {
                                if (result.isConfirmed) {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });

                                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                                    {
                                        item_de_atividade: result.value,
                                        _method: "DELETE"
                                    },
                                    function () {
                                    })
                                    .done(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            grow: 'fullscreen',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true
                                        });

                                        Toast.fire({
                                            icon: 'success',
                                            title: data.message,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        });

                                        $("#item-list-"+data.item_id+", #actions-list-"+data.item_id).fadeOut(400);
                                        $("#load-atividade"+atividade_id).fadeOut(300);
                                        setTimeout(() => {
                                            $("#load-atividade"+atividade_id+", #"+data.item_id+", #actions-list-"+data.item_id).remove();
                                        }, 1000);
                                    })
                                    .fail(function (data) {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-start',
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
                                            title: data.message
                                        });
                                    })
                                    .always(function (data) {
                                        //
                                    });
                                }
                                else {
                                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                                }
                            });
                        });
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
                }
                else {
                    $("#load-atividade"+atividade_id).fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                }
            });
        });

        $(".conclude-item").click(function(e) {
            e.preventDefault();

            let item_id      = $(this).attr("data-item");
            let atividade_id = $(this).attr("data-atividade");

            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-warning uk-text-emphasis mr-4 shadow',
                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html:
                    "<h2>Concluir item?</h2>\n"+
                    "<input id='item_concluir' type='hidden' class='swal2-input' value='"+item_id+"'/>",
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Concluir item',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,

                //Funciona como um um middleware
                preConfirm: () => {
                    return  document.getElementById('item_concluir').value;
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('item_de_atividades.concluded') }}",
                    {
                        item_de_atividade: result.value
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#item-card-"+item_id).addClass('uk-card-primary').removeClass('uk-card-default');
                        $("#item-card-"+item_id+" > span#item-handle-"+item_id).fadeOut(200);
                        $("#actions-list-"+item_id).fadeOut(200);

                        $("#load-atividade"+atividade_id).fadeOut(200);
                        setTimeout(() => {
                            $("#load-atividade"+atividade_id+"").remove();
                            $("#item-card-"+item_id+" > span#item-handle-"+item_id).remove();
                            $("#actions-list-"+item_id).remove();
                        }, 300);
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
                }
                else {
                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                }
            });
        });

        $(".edit-item").click(function(e) {
            e.preventDefault();

            let item_id      = $(this).attr("data-item");
            let atividade_id = $(this).attr("data-atividade");

            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-success uk-text-emphasis text-white mr-4 shadow',
                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                        input: 'form-control form-control-lg'
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html: "<label for='tarefa' class='text-left'>Alterar o item?</label>",
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off',
                    value: ($("#item-nome-"+item_id).text()).trim()
                },
                inputValue: ($("#item-nome-"+item_id).text()).trim(),
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Alterar item',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    //Funciona como um um middleware
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                    {
                        item_de_atividade: result.value,
                        _method: "PUT"
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#item-nome-"+item_id).html(data.item.nome);
                        $("#load-atividade"+atividade_id).fadeOut(200);
                        setTimeout(() => { $("#load-atividade"+atividade_id+"").remove(); }, 1000);
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
                }
                else {
                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 1000);
                }
            });
        });

        $(".remove-item").click(function(e) {
            e.preventDefault();

            let item_id      = $(this).attr("data-item");
            let atividade_id = $(this).attr("data-atividade");
            $(".card-atividade-"+atividade_id).append("<div class='overlay' id='load-atividade"+atividade_id+"'><i class='fas fa-2x fa-sync-alt fa-spin'></i></div>");

            let swal = Swal.mixin({
                                    customClass: {
                                        confirmButton: 'btn btn-danger uk-text-emphasis text-white mr-4 shadow',
                                        cancelButton: 'btn btn-secondary uk-text-emphasis text-white shadow',
                                    },
                                    buttonsStyling: false
                                });
            swal.fire({
                //title: 'Tarefa',
                html:
                    "<h2>Quer mesmo remover o item?</h2>\n"+
                    "<input id='item_del' type='hidden' class='swal2-input' value='"+item_id+"'/>",
                // onBeforeOpen: function(element) {
                //     $(element).find('input.swal2-input').removeClass('swal2-input');
                // },
                showCancelButton: true,
                showCloseButton: true,
                confirmButtonText: 'Remover item',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true,

                //Funciona como um um middleware
                preConfirm: () => {
                    return  document.getElementById('item_del').value;
                },
                allowOutsideClick: () => !swal.isLoading()
            })
            .then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.post("{{ route('item_de_atividades.index') }}/"+item_id,
                    {
                        item_de_atividade: result.value,
                        _method: "DELETE"
                    },
                    function () {
                    })
                    .done(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            grow: 'fullscreen',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        });

                        $("#item-list-"+data.item_id+", #actions-list-"+data.item_id).fadeOut(400);
                        $("#load-atividade"+atividade_id).fadeOut(300);
                        setTimeout(() => {
                            $("#load-atividade"+atividade_id+", #"+data.item_id+", #actions-list-"+data.item_id).remove();
                        }, 1000);
                    })
                    .fail(function (data) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-start',
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
                            title: data.message
                        });
                    })
                    .always(function (data) {
                        //
                    });
                }
                else {
                    $("#load-atividade"+atividade_id+"").fadeOut(200);
                    setTimeout(() => { $("#load-atividade"+atividade_id).remove(); }, 300);
                }
            });
        });

        function makeBox(atividade, local) {
            let box =   "<div class='col-xl-4' id='box-atividade-"+atividade.id+"'>\n"+
                            "<div class='uk-card uk-card-default uk-card-hover uk-card-body mb-5 card-atividade-"+atividade.id+"' style='padding: 2px'>\n"+
                                "<div class='uk-card-header' style='padding: 10px'>\n"+
                                    "<div class='atividade-actions float-right'>\n"+
                                        "<i class='fas fa-pencil-alt text-warning edit-atividade' data-atividade='"+atividade.id+"' uk-tooltip='Alterar atividade'></i>&nbsp;\n"+
                                        "<i class='fas fa-trash text-danger remove-atividade' data-atividade='"+atividade.id+"' uk-tooltip='Excluir atividade'></i>&nbsp;\n"+
                                        "<i class='fas fa-plus text-success new-item' data-atividade='"+atividade.id+"' uk-tooltip='Adicionar item'></i>\n"+
                                    "</div>\n"+

                                    "<h2 class='uk-card-title' id='atividade"+atividade.id+"'>\n"+
                                        atividade.nome+"\n"+
                                    "</h2>\n"+

                                    "<div class='small uk-text-italic' style='margin-top: -5%'>\n"+
                                        formataData(atividade.created_at)+"\n"+
                                    "</div>\n"+
                                "</div>\n"+

                                "<div class='uk-card-body' style='padding: 10px'>\n"+
                                    "<ul class='list-itens uk-list' id='itens-atividade-"+atividade.id+"'>\n"+
                                        "<li id='empty-"+atividade.id+"'>Lista vazia</li>\n"+
                                    "</ul>\n"+
                                "</div>\n"+
                            "</div>\n"+
                        "</div>";
            $("#"+local).append(box).fadeIn(200);
        }

        function makeItem(item, local) {
            let list = "<li id='item-list-"+item.id+"' data-atividade-id='"+item.atividade_id+"' data-order='"+item.ordem+"'>\n"+
                            "<div id='item-card-"+item.id+"' class='uk-card uk-card-default uk-card-hover uk-card-body' style='padding: 10px'>\n"+
                                "<span class='uk-sortable-handle uk-margin-small-right uk-text-center' uk-icon='icon: table' id='item-handle-"+item.id+"'></span>\n"+
                                "<span id='item-nome-"+item.id+"'>"+item.nome+"</span>\n"+
                            "</div>\n"+
                        "</li>\n"+
                        "<div id='actions-list-"+item.id+"' class='item-actions float-right' style='display:none'>\n"+
                            "<span class='text-sm mr-2 conclude-item text-success' uk-tooltip='Concluir item' data-item='"+item.id+"' data-atividade='"+item.atividade_id+"'><i class='fas fa-check'></i></span>\n"+
                            "<span class='text-sm mr-2 edit-item text-warning' uk-tooltip='Alterar item' data-item='"+item.id+"' data-atividade='"+item.atividade_id+"'><i class='fas fa-pencil-alt'></i></span>\n"+
                            "<span class='text-sm mr-2 remove-item text-danger' uk-tooltip='Remover item' data-item='"+item.id+"' data-atividade='"+item.atividade_id+"'><i class='fas fa-trash'></i></span>\n"+
                            "<span class='text-sm mr-2 new-subitem text-primary' uk-tooltip='Adicionar sub-item' data-item='"+item.id+"' data-atividade='"+item.atividade_id+"'><i class='fas fa-plus'></i></span>\n"+
                        "</div>";

            $("#"+local).append(list).fadeIn(200);
        }

        function formataData(data) {
            return new Date(Date.parse(data)).toLocaleTimeString([], {day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit'});
        }
    </script>
@endsection
