<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TFA調整さん | プロジェクト編集</title>
        <!-- Material Design for Bootstrap 読み込み 開始 -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" defer></script>
        <!-- Material Design for Bootstrap 読み込み 終了 -->
    </head>
    <body class="font-sans antialiased bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-8">

<!-- プロジェクト編集フォーム 開始 -->
<form action="{{ route('projects.update', $project) }}" method="POST" class="card card-body shadow-2 mb-3">
    @csrf
    @method('PATCH')

    <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">プロジェクト編集</p>

    <!-- ステータス選択 -->
    <div class="form-group mb-2">
        <label for="status">ステータス</label>
        <select class="form-control" id="status" name="status" value="{{ $project->status }}">
            <!-- 省略 -->
        </select>
    </div>
    
<!-- 顧客選択 -->
<div class="form-group mb-2">
    <label for="customer">顧客</label>
    <select class="form-control" id="customer" name="customer">
        @foreach($customers as $customer)
            <option value="{{ $customer->customer_name }}"
                {{ $project->customer == $customer->customer_name ? 'selected' : '' }}>
                {{ $customer->customer_name }}
            </option>
        @endforeach
    </select>
</div>


    <!-- 開始日選択 -->
    <div class="form-group mb-2">
        <label for="start">開始日</label>
        <input type="date" class="form-control" id="start" name="start" value="{{ $project->start }}">
    </div>

    <!-- 終了日選択 -->
    <div class="form-group mb-2">
        <label for="end">終了日</label>
        <input type="date" class="form-control" id="end" name="end" value="{{ $project->end }}">
    </div>
    
    <!-- 人数入力 -->
    <div class="form-group mb-2">
        <label for="number">人数</label>
        <input type="number" class="form-control" id="number" name="number" min="1" placeholder="人数を入力" value="{{ $project->number }}">
    </div>

    <!-- 更新ボタン -->
    <button
        type="submit"
        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
    >
        更新
    </button>

    <a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>

</form>
<!-- フォーム 終了 -->

            </div>
        </div>
    </div>
    </body>
</html>
