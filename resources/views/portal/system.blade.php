@extends('portal.layouts.main')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thông tin hệ thống</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form" name="user-form" class="form-transparent clearfix" method="POST"
                                action="{{ route('system.save') }}">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" name="address" placeholder="Địa chỉ ..."
                                        value="{{ $system ? $system->address : '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email" placeholder="Email ..."
                                        value="{{ $system ? $system->email : '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="tel" class="form-control" name="phone"
                                        placeholder="Số điện thoại ..." value="{{ $system ? $system->phone : '' }}">
                                </div>
                                <div class="form-group">
                                    <label>Bản đồ</label>
                                    <textarea name="map" placeholder="Bản đồ ....." class="form-control" rows="3">{{ $system ? $system->map : '' }}</textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label>Thông tin khác</label>
                                    <textarea name="info" placeholder="Thông tin khác ....." class="form-control"
                                        id="editor" rows="10">{{ $system ? $system->info : '' }}</textarea>
                                </div> --}}
                                <div style="text-align: right">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" class="btn btn-default">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserImageUploadUrl: '{{ route('ckfinder_browser') . '?_token=' . csrf_token() }}',
            toolbarGroups: [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,PageBreak,Iframe,ShowBlocks,About,Smiley,Anchor',
            editorplaceholder: 'Type your content...',
            height: '300'
        });
    });
</script>
@endsection