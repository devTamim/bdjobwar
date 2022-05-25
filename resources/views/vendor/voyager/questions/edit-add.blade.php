@php
$edit = !is_null($dataTypeContent->getKey());
$add = is_null($dataTypeContent->getKey());
@endphp

@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' .
    $dataType->getTranslatedAttribute('display_name_singular'))

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.' . ($edit ? 'edit' : 'add')) . ' ' . $dataType->getTranslatedAttribute('display_name_singular') }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
    @if(!$edit)
        <div class="row">
            @foreach ($exam->questions as $question)
                <div class="col-md-12">
                    <x-questionAdmin :question="$question" :index="$loop->iteration" />
                </div>
            @endforeach
        </div>
        @endif
        <div class="row">

            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" class="form-edit-add"
                        action="{{ $edit ? route('voyager.' . $dataType->slug . '.update', $dataTypeContent->getKey()) : route('voyager.' . $dataType->slug . '.store') }}"
                        method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if ($edit)
                            {{ method_field('PUT') }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{$edit ? 'editRows' : 'addRows'};
                            @endphp

                            @foreach ($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $display_options = $row->details->display ?? null;
                                    if ($dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')}) {
                                        $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field . '_' . ($edit ? 'edit' : 'add')};
                                    }
                                @endphp
                                @if (isset($row->details->legend) && isset($row->details->legend->text))
                                    <legend class="text-{{ $row->details->legend->align ?? 'center' }}"
                                        style="background-color: {{ $row->details->legend->bgcolor ?? '#f0f0f0' }};padding: 5px;">
                                        {{ $row->details->legend->text }}</legend>
                                @endif

                                <div class="form-group @if ($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }} {{ $errors->has($row->field) ? 'has-error' : '' }}"
                                    @if (isset($display_options->id)) {{ "id=$display_options->id" }} @endif>
                                    {{ $row->slugify }}
                                    <label class="control-label"
                                        for="name">{{ $row->getTranslatedAttribute('display_name') }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if (isset($row->details->view))
                                        @include($row->details->view, [
                                            'row' => $row,
                                            'dataType' => $dataType,
                                            'dataTypeContent' => $dataTypeContent,
                                            'content' => $dataTypeContent->{$row->field},
                                            'action' => $edit ? 'edit' : 'add',
                                            'view' => $edit ? 'edit' : 'add',
                                            'options' => $row->details,
                                        ])
                                    @elseif ($row->type == 'relationship')
                                        @include('voyager::formfields.relationship', ['options' => $row->details])
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif

                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                    @if ($errors->has($row->field))
                                        @foreach ($errors->get($row->field) as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                            @if (request()->exam)
                                <input type="hidden" name="exam" value="{{ request()->exam }}">
                            @endif
                            <div class="col-md-12 col-sm-12">
                                <hr>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8">
                                        <h3>
                                            Add Options
                                        </h3>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div>
                                            <button type="button" onClick="addOption('text')"
                                                class="btn btn-primary btn-sm">+ Add text option</button>
                                            <button type="button" onClick="addOption('image')" class="btn btn-info btn-sm">+
                                                Add image option</button>

                                            <button type="button" onClick="addOption('both')" class="btn btn-info btn-sm">+
                                                Add both option</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="options">
                                    @if ($dataTypeContent->choices->count())
                                        @foreach ($dataTypeContent->choices as $choice)
                                            @if ($choice->type == 'text')
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input type="radio" name="answer"
                                                                    value="{{ $choice->index }}"
                                                                    @if ($choice->index == $dataTypeContent->answer) checked="true" @endif
                                                                    aria-label="...">
                                                            </span>
                                                            <input type="text"
                                                                name="options[{{ $choice->index }}][choice_text]"
                                                                class="form-control"
                                                                value="{{ $choice->choice_text }}">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}][type]"
                                                                class="form-control" value="text">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}][index]"
                                                                class="form-control" value="{{ $choice->index }}">
                                                            <span class="input-group-addon">
                                                                <button type="button"
                                                                    onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i
                                                                        class="voyager-trash"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($choice->type == 'image')
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input type="radio" name="answer"
                                                                    value="{{ $choice->index }}"
                                                                    @if ($choice->index == $dataTypeContent->answer) checked="true" @endif
                                                                    aria-label="...">
                                                            </span>
                                                            <input type="file"
                                                                name="options[{{ $choice->index }}][choice_image]"
                                                                class="form-control" aria-label="...">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}][type]"
                                                                class="form-control" value="text">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}][index]"
                                                                class="form-control" value="{{ $choice->index }}">
                                                            <span class="input-group-addon">
                                                                <button type="button"
                                                                    onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i
                                                                        class="voyager-trash"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <img src="{{ voyager::image($choice->choice_image) }}" alt="">
                                                    </div>
                                                </div>
                                            @elseif ($choice->type == 'both')
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <input type="radio" name="answer" value="` + index + `"
                                                                    aria-label="..."     @if ($choice->index == $dataTypeContent->answer) checked="true" @endif>
                                                            </span>
                                                            <input type="text"
                                                                name="options[{{ $choice->index }}][choice_text]"
                                                                class="form-control" aria-label="..."
                                                                value="{{ $choice->choice_text }}">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}][type]"
                                                                class="form-control" value="both">
                                                            <input type="hidden"
                                                                name="options[{{ $choice->index }}[index]"
                                                                class="form-control" value="{{ $choice->index }}">
                                                            <span class="input-group-addon">
                                                                <button type="button"
                                                                    onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i
                                                                        class="voyager-trash"></i></button>
                                                            </span>
                                                        </div>
                                                        <br>
                                                        <p>Upload Image here </p>
                                                        <input type="file"
                                                            name="options[{{ $choice->index }}][choice_image]"
                                                            class="form-control" aria-label="...">
                                                        <a href="{{ Storage::url($choice->choice_image) }}"
                                                            target="_blank">View Image</a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>





                            </div>

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                        @section('submit-buttons')
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        @stop
                        @yield('submit-buttons')
                    </div>
                </form>

                <iframe id="form_target" name="form_target" style="display:none"></iframe>
                <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                    enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                    <input name="image" id="upload_file" type="file" onchange="$('#my_form').submit();this.value='';">
                    <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                    {{ csrf_field() }}
                </form>

            </div>

        </div>
    </div>
</div>

<div class="modal fade modal-danger" id="confirm_delete_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}
                </h4>
            </div>

            <div class="modal-body">
                <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                    data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                <button type="button" class="btn btn-danger"
                    id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Delete File Modal -->
@stop

@section('javascript')
<script>
    var params = {};
    var $file;

    function deleteHandler(tag, isMulti) {
        return function() {
            $file = $(this).siblings(tag);

            params = {
                slug: '{{ $dataType->slug }}',
                filename: $file.data('file-name'),
                id: $file.data('id'),
                field: $file.parent().data('field-name'),
                multi: isMulti,
                _token: '{{ csrf_token() }}'
            }

            $('.confirm_delete_name').text(params.filename);
            $('#confirm_delete_modal').modal('show');
        };
    }

    $('document').ready(function() {

        $('.toggleswitch').bootstrapToggle();

        //Init datepicker for date fields if data-datepicker attribute defined
        //or if browser does not handle date inputs
        $('.form-group input[type=date]').each(function(idx, elt) {
            if (elt.hasAttribute('data-datepicker')) {
                elt.type = 'text';
                $(elt).datetimepicker($(elt).data('datepicker'));
            } else if (elt.type != 'date') {
                elt.type = 'text';
                $(elt).datetimepicker({
                    format: 'L',
                    extraFormats: ['YYYY-MM-DD']
                }).datetimepicker($(elt).data('datepicker'));
            }
        });

        @if ($isModelTranslatable)
            $('.side-body').multilingual({
                "editing": true
            });
        @endif

        $('.side-body input[data-slug-origin]').each(function(i, el) {
            $(el).slugify();
        });

        $('.form-group').on('click', '.remove-multi-image', deleteHandler('img', true));
        $('.form-group').on('click', '.remove-single-image', deleteHandler('img', false));
        $('.form-group').on('click', '.remove-multi-file', deleteHandler('a', true));
        $('.form-group').on('click', '.remove-single-file', deleteHandler('a', false));

        $('#confirm_delete').on('click', function() {
            $.post('{{ route('voyager.' . $dataType->slug . '.media.remove') }}', params, function(
                response) {
                if (response &&
                    response.data &&
                    response.data.status &&
                    response.data.status == 200) {

                    toastr.success(response.data.message);
                    $file.parent().fadeOut(300, function() {
                        $(this).remove();
                    })
                } else {
                    toastr.error("Error removing file.");
                }
            });

            $('#confirm_delete_modal').modal('hide');
        });
        $('[data-toggle="tooltip"]').tooltip();

    });
</script>
<script>
    const toggleDescription = has_description => {
        if (has_description.checked) {
            $('#qImage').show(500)
            $('#qDesc').show(500)
        } else {
            $('#qImage').hide(500)
            $('#qDesc').hide(500)
        }
    }

    $('document').ready(() => {
        toggleDescription($('input[name=has_description]')[0]);
    });


    $('input[name=has_description]').change((event) => {
        toggleDescription(event.target);
    })
</script>
<script>
    function addOption(type) {
        switch (type) {
            case 'text':
                textField();
                break;
            case 'image':
                imageField();
                break;

            case 'both':
                bothField();
                break;

            default:
                textField();
                break;
        }
    }
    let index = {{ rand(100, 500) }};

    function textField() {
        index++;
        const div = document.createElement('div');
        div.innerHTML = `
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="answer" value="` + index + `" aria-label="...">
                    </span>
                    <input type="text" name="options[` + index + `][choice_text]" class="form-control" aria-label="...">
                    <input type="hidden" name="options[` + index + `][type]" class="form-control" value="text">
                    <input type="hidden" name="options[` + index + `][index]" class="form-control" value="` + index + `">
                    <span class="input-group-addon">
                        <button type="button" onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i class="voyager-trash"></i></button>
                    </span>
                </div>
            </div>
        </div>
    `
        document.getElementById('options').append(div)
    }

    function imageField() {
        index++;
        const div = document.createElement('div');
        div.innerHTML = `<div class="row">
            <div class="col-lg-12">
                <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="answer" value="` + index + `" aria-label="...">
                    </span>
                    <input type="file" name="options[` + index + `][choice_image]" class="form-control" aria-label="...">
                    <input type="hidden" name="options[` + index + `][type]" class="form-control" value="image">
                    <input type="hidden" name="options[` + index + `][index]" class="form-control" value="` + index + `">
                    <span class="input-group-addon">
                        <button type="button" onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i class="voyager-trash"></i></button>
                    </span>
                </div>
            </div>
        </div>`;
        document.getElementById('options').append(div)
    }


    function bothField() {
        index++;
        const div = document.createElement('div');
        div.innerHTML = `<div class="row">
            <div class="col-lg-12">
                    <div class="input-group">
                    <span class="input-group-addon">
                        <input type="radio" name="answer" value="` + index + `" aria-label="...">
                    </span>
                    <input type="text" name="options[` + index + `][choice_text]" class="form-control" aria-label="...">
                    <input type="hidden" name="options[` + index + `][type]" class="form-control" value="both">
                    <input type="hidden" name="options[` + index + `][index]" class="form-control" value="` + index + `">
                    <span class="input-group-addon">
                        <button type="button" onclick="this.parentNode.parentNode.parentNode.parentNode.remove()"><i class="voyager-trash"></i></button>
                    </span>
                </div>
                <br>
                <p>Upload Image here</p>
                 <input type="file" name="options[` + index + `][choice_image]" class="form-control" aria-label="...">
            </div>
        </div>`;
        document.getElementById('options').append(div)
    }
</script>
@if (request()->exam)
    <script>
        $('#exams').hide();
    </script>
@endif

@stop
