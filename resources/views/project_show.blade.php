<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANCHAN | 案件一覧</title>
    <!-- Material Design for Bootstrap 読み込み 開始 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" defer></script>
    <!-- Material Design for Bootstrap 読み込み 終了 -->

    <!-- Additional Styles -->
    <style type="text/css">
        .navbar {
            background-color: #f7f7f7 !important;
        }

        a.navbar-brand {
            margin-left: 20px;
            color: black !important;
            font-weight: bold;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">GANCHAN</a>
</nav>

<div class="container mt-4">
    <p>個別案件ページ</p>
    <div class="row">
        <!-- 左側のサイドメニュー -->
        <div class="col-md-3">
    
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('kadouhi.index', ['project_id' => $project->id]) }}">稼働日確認</a>
                </li> 
                             
            </ul>
        </div>

        <!-- 右側の表示エリア -->
        <div class="col-md-9">
            <h2>{{ $project->customer }}</h2>
            <p><strong>Status:</strong> {{ $project->status }}</p>
            <p><strong>Start:</strong> {{ $project->start }}</p>
            <p><strong>End:</strong> {{ $project->end }}</p>
            <p><strong>Number:</strong> {{ $project->numbers }}</p>
            
            
            <!-- コンテンツ表示エリア -->
            <div id="content-display">
                <!-- 初期画面やボタンをクリックした際のコンテンツがここに表示される -->
            </div>


        </div>
<a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>

    </div>
</div>

<script>
    function loadContent(buttonElement) {
        const url = buttonElement.getAttribute('data-url');
        
        fetch(url)
            .then(response => response.text())
            .then(content => {
                document.getElementById('content-display').innerHTML = content;
            });
    }
</script>
</body>
</html>
