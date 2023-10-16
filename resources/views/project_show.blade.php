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
        <li class="list-group-item">
            <a href="{{ route('logi.index', ['project' => $project->id]) }}">旅程アレンジ</a>

        </li>          
    </ul>
</div>


        <!-- 右側の表示エリア -->
        <div class="col-md-9">
            <h2>{{ $project->customer }}</h2>
            <p><strong>Status:</strong> {{ $project->status }}</p>
            <p><strong>Start:</strong> {{ $project->start }}</p>
            <p><strong>End:</strong> {{ $project->end }}</p>

        <!-- ここからフォーム -->
        <form action="{{ route('project.updateCheckboxes', $project->id) }}" method="post">
            @csrf

            <div class="mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="scope_checked" id="scope_checked" value="1" {{ $detailproject->scope_checked ? 'checked' : '' }}>
                    <label class="form-check-label" for="scope_checked">スコープ確認</label>
                </div>

                <div class="mb-3">
                    <label for="engineer_type" class="form-label">エンジニアの種類</label>
                    <input type="text" class="form-control" id="engineer_type" name="engineer_type" value="{{ $detailproject->engineer_type }}">
                </div>
                
                <div class="mb-3">
                    <label for="scope" class="form-label">スコープ</label>
                    <textarea class="form-control" id="scope" name="scope">{{ $detailproject->scope }}</textarea>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="estimate_submitted" id="estimate_submitted" value="1" {{ $detailproject->estimate_submitted ? 'checked' : '' }}>
                    <label class="form-check-label" for="estimate_submitted">見積作成済み</label>
                </div>

                <div class="mb-3">
                    <label for="estimate_no" class="form-label">Estimate No.</label>
                    <input type="text" class="form-control" id="estimate_no" name="estimate_no" value="{{ $detailproject->estimate_no }}">
                </div>
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="po_received" id="po_received" value="1" {{ $detailproject->po_received ? 'checked' : '' }}>
                    <label class="form-check-label" for="po_received">PO受領済み</label>
                </div>

                <div class="mb-3">
                    <label for="po_no" class="form-label">PO No.</label>
                    <input type="text" class="form-control" id="po_no" name="po_no" value="{{ $detailproject->po_no }}">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tax_checked" id="tax_checked" value="1" {{ $detailproject->tax_checked ? 'checked' : '' }}>
                    <label class="form-check-label" for="tax_checked">税務確認済み</label>
                </div>
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="danger_checked" id="danger_checked" value="1" {{ $detailproject->danger_checked ? 'checked' : '' }}>
                    <label class="form-check-label" for="danger_checked">渡航情報確認済み</label>
                </div>
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="logi_arranged" id="logi_arranged" value="1" {{ $detailproject->logi_arranged ? 'checked' : '' }}>
                    <label class="form-check-label" for="logi_arranged">ロジアレンジ済み</label>
                </div>
        
                <div class="mb-3">
                    <label for="project_remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="project_remarks" name="project_remarks">{{ $detailproject->project_remarks }}</textarea>
                </div>
                
            </div>

            <!-- 保存ボタン -->
            <button type="submit" class="btn btn-primary mt-2">保存</button>
        </form>
        <!-- ここまでフォーム -->





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
