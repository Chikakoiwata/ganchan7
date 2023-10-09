<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GANCHAN| 確認事項追加</title>
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

<!-- 新規案件登録フォーム 開始 -->
<form action="{{ route('checks.store') }}" method="POST" class="card card-body shadow-2 mb-3">

    @csrf

    <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">新規確認事項登録</p>
    <label for="name">国:</label>
    <input type="text" id="check_country" name="check_country" required>
    <label for="type">VISA:</label>
    <input type="text" id="visa" name="visa" required>
    <label for="type">PE構成条件:</label>
    <input type="text" id="pe" name="pe" required>
    <label for="type">個人所得税:</label>
    <input type="text" id="income_tax" name="income_tax" required>
    <label for="type">現地VAT:</label>
    <input type="text" id="vat" name="vat" required>
    <label for="type">本邦消費税:</label>
    <input type="text" id="consumption_tax" name="consumption_tax" required>
    <label for="type">税務Reference:</label>
    <input type="text" id="tax_reference" name="tax_reference" required>
    <label for="type">渡航情報:</label>
    <input type="text" id="danger" name="danger" required>
    <label for="type">そのほか:</label>
    <input type="text" id="check_remarks" name="check_remarks" required>
    
    <!-- 提出ボタン -->
    <button
        type="submit"
        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
    >
        確認事項登録
    </button>

    <a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>

</form>
<!-- フォーム 終了 -->