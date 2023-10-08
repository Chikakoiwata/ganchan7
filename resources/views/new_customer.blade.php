<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TFA調整さん | トップページ</title>
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
<form action="{{ route('customers.store') }}" method="POST" class="card card-body shadow-2 mb-3">

    @csrf

    <p class="mb-1 text-gray-400 font-weight-bold" style="font-size: 0.8rem;">新規案件登録</p>
    <label for="name">Name:</label>
    <input type="text" id="customer_name" name="customer_name" required>
    <label for="type">Country:</label>
    <input type="text" id="customer_country" name="customer_country" required>
    <label for="type">Industry:</label>
    <input type="text" id="customer_industry" name="customer_industry" required>
    <label for="type">Shareholder:</label>
    <input type="text" id="customer_shareholder" name="customer_shareholder" required>
    <label for="type">Sanction:</label>
    <input type="text" id="customer_sanction" name="customer_sanction" required>
    <label for="type">Equipment:</label>
    <input type="text" id="customer_equipment" name="customer_equipment" required>
    <label for="type">Production:</label>
    <input type="text" id="customer_production" name="customer_production" required>
    <label for="type">Financial:</label>
    <input type="text" id="customer_financial" name="customer_financial" required>
    <label for="type">Maintenance:</label>
    <input type="text" id="customer_maintenance" name="customer_maintenance" required>
    <label for="type">Address:</label>
    <input type="text" id="customer_address" name="customer_address" required>
    <label for="type">Access:</label>
    <input type="text" id="customer_access" name="customer_access" required>
    <label for="type">Remarks:</label>
    <input type="text" id="customer_remarks" name="customer_remarks" required>
    
    <!-- 提出ボタン -->
    <button
        type="submit"
        class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
    >
        新規案件登録
    </button>

    <a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>

</form>
<!-- フォーム 終了 -->
