@extends('portal.layouts.main')
@section('title', 'Dashboard')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sửa thông tin</h1>
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
                            <form role="form" name="user-form" class="form-transparent clearfix" method="POST" action="{{ route('categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input class="form-control" name="name" placeholder="Tên ....." value="{{ $category->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select class="form-control" name="parent_id" {{ $category->childs->count() > 0 ? 'disabled' : '' }}>
                                        <option></option>
                                        @foreach ($categories as $cat)
                                            @if ($category->parent_id === $cat->id)
                                                <option selected value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @else
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" placeholder="Mô tả ....." class="form-control" rows="3">{{ $category->description }}</textarea>
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
@endsection
