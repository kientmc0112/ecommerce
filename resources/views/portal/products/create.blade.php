@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
@include('ckfinder::setup')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Tạo mới</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form"  class="form-transparent clearfix" enctype="multipart/form-data" method="POST" action="{{ route('products.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input class="form-control" name="name" placeholder="Tên sản phẩm ....." value="{{ old('name') }}">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Danh mục</label>
                                            <select class="form-control" name="category_id">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Giá niêm yết</label>
                                            <input class="form-control" name="price" placeholder="Giá niêm yết ....." value="{{ old('price') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Giá bán</label>
                                            <input class="form-control" name="sale_price" placeholder="Giá bán ....." value="{{ old('sale_price') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Số lượng</label>
                                            <input class="form-control" name="quantity" type="number" placeholder="Số lượng ....." value="{{ old('quantity') ?? 0 }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <div class="drop-region" onclick="document.getElementById('uploadImage').click()">
                                        <input name="image" id="uploadImage" type="file" style="display: none">
                                        <h4 class="text-center">Click here to upload</h4>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" placeholder="Thông tin thêm ....." class="form-control" id="editor" rows="5">{{ old('description') }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .drop-region {
        width: 400px;
        height: 250px;
        border: 2px dashed #028AF4 !important; 
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#uploadImage").val(null);
        
        CKEDITOR.replace('editor', {
            filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
            filebrowserImageUploadUrl: '{{ route('ckfinder_browser') . '?_token=' . csrf_token() }}',
            toolbarGroups: [
                { name: 'document', groups: [ 'Source', 'mode', 'document', 'doctools' ] },
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
                { name: 'insert', groups: [ 'insert', 'Iframe' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ],
            removeButtons: 'Source,Save,Templates,NewPage,ExportPdf,Preview,Print,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,CreateDiv,PageBreak,ShowBlocks,About,Smiley,Anchor',
            editorplaceholder: 'Type your content...',
            height: '350'
        });

        $('#uploadImage').on('change', function () {
            if (this.files && this.files[0]) {
                var image = $(this).parents(".drop-region");
                image.children('h4').remove();
                var reader = new FileReader();
                reader.onload = function (e) {
                    image.css('background-image', "url(" + e.target.result + ")");
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection
