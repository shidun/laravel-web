@extends('layout.main')
@section('content')
    <div class="col-sm-8 blog-main">
        <form action="{{ url('/posts') }}" method="POST" enctype ="multipart/form-data">
            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
            {{ csrf_field() }}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" placeholder="这里是标题">
            </div>
            <div class="form-group">
                <label>内容</label>
            <div id="div1" class="">
            </div>
            <textarea class="hidden" id="content" name="content" class="form-control" placeholder="这里是内容" style="height:400px;max-height:500px;"></textarea>
            </div>
            @include('layout.error')
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>
    </div><!-- /.blog-main -->
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('js/wangEditor.min.js') }}"></script>
    <script src="{{ asset('js/ylaravel.js') }}"></script>
@endsection