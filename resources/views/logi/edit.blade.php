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
        .compact-card {
        margin: 10px 0;
        padding: 10px;
        font-size: 0.9em;
    }

    </style>
</head>

<body>

    <button id="backToLogiList" class="btn btn-secondary mt-3">戻る</button>
    
    <div class="card mt-3">
        <div class="card-body">
            <form action="{{ route('logi.update', ['project' => $project->id, 'logi' => $logi->id]) }}" method="post">

                @csrf
                @method('PUT')
    
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="移動(飛行機)" {{ $logi->type == "移動(飛行機)" ? 'selected' : '' }}>移動(飛行機)</option>
                        <option value="移動(車)" {{ $logi->type == "移動(車)" ? 'selected' : '' }}>移動(車)</option>
                        <option value="宿泊" {{ $logi->type == "宿泊" ? 'selected' : '' }}>宿泊</option>
                        <option value="持ち物" {{ $logi->type == "持ち物" ? 'selected' : '' }}>持ち物</option>
                        <option value="その他" {{ $logi->type == "その他" ? 'selected' : '' }}>その他</option>
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $logi->title }}">
                </div>
    
                <!-- 開始日 -->
                <div class="mb-3">
                    <label for="start_day" class="form-label">開始日</label>
                    <input type="date" class="form-control" id="start_day" name="start_day" value="{{ $logi->start_day }}">
                </div>
    
                <!-- 開始時間 -->
                <div class="mb-3">
                    <label for="start_time" class="form-label">開始時間</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ date('H:i', strtotime($logi->start_time)) }}">
                </div>
    
                <!-- 開始時間タイムゾーン -->
                <div class="mb-3">
                    <label for="start_timezone" class="form-label">開始時間タイムゾーン</label>
                    <select class="form-control" id="start_timezone" name="start_timezone">
                        <option value="Asia/Tokyo" {{ $logi->start_timezone == "Asia/Tokyo" ? 'selected' : '' }}>Asia/Tokyo</option>
                        <option value="America/New_York" {{ $logi->start_timezone == "America/New_York" ? 'selected' : '' }}>America/New_York</option>
                        <option value="Europe/London" {{ $logi->start_timezone == "Europe/London" ? 'selected' : '' }}>Europe/London</option>
                        <!-- 他のオプションも必要に応じて追加してください -->
                    </select>
                </div>
    
                <!-- 終了日 -->
                <div class="mb-3">
                    <label for="end_day" class="form-label">終了日</label>
                    <input type="date" class="form-control" id="end_day" name="end_day" value="{{ $logi->end_day }}">
                </div>
    
                <!-- 終了時間 -->
                <div class="mb-3">
                    <label for="end_time" class="form-label">終了時間</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ date('H:i', strtotime($logi->end_time)) }}">
                </div>
    
                <!-- 終了時間タイムゾーン -->
                <div class="mb-3">
                    <label for="end_timezone" class="form-label">終了時間タイムゾーン</label>
                    <select class="form-control" id="end_timezone" name="end_timezone">
                        <option value="Asia/Tokyo" {{ $logi->end_timezone == "Asia/Tokyo" ? 'selected' : '' }}>Asia/Tokyo</option>
                        <option value="America/New_York" {{ $logi->end_timezone == "America/New_York" ? 'selected' : '' }}>America/New_York</option>
                        <option value="Europe/London" {{ $logi->end_timezone == "Europe/London" ? 'selected' : '' }}>Europe/London</option>
                        <!-- 他のオプションも必要に応じて追加してください -->
                    </select>
                </div>
    
                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarks" name="remarks">{{ $logi->remarks }}</textarea>
                </div>
    
                <button type="submit" class="btn btn-primary mt-2">更新</button>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('backToLogiList').addEventListener('click', function() {
            window.location.href = "{{ route('logi.index', ['project' => $project->id]) }}";
        });
    </script>
    
    </body>
    </html>