<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANCHAN |旅程アレンジ </title>
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
 
        .card {
    background-color: #f5f5f5;

    }

    </style>
</head>

<body>

    <button id="addLogiCardBtn" class="btn btn-primary mt-3">＋</button>



    <div class="card mt-3" id="newLogiCard" style="display: none;">
        <div class="card-body">

            <form action="{{ route('logi.store', ['project' => $project->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type">
                        <option value="移動(飛行機)">移動(飛行機)</option>
                        <option value="移動(車)">移動(車)</option>
                        <option value="宿泊">宿泊</option>
                        <option value="持ち物">持ち物</option>
                        <option value="その他">その他</option>
                    </select>
                </div>
 
 
 
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>


<!-- 開始日 -->
<div class="mb-3">
    <label for="start_day" class="form-label">開始日</label>
    <input type="date" class="form-control" id="start_day" name="start_day">
</div>

<!-- 開始時間 -->
<div class="mb-3">
    <label for="start_time" class="form-label">開始時間</label>
    <input type="time" class="form-control" id="start_time" name="start_time">
</div>

<!-- 開始時間タイムゾーン -->
<div class="mb-3">
    <label for="start_timezone" class="form-label">開始時間タイムゾーン</label>
    <select class="form-control" id="start_timezone" name="start_timezone">
        <option value="Asia/Tokyo">Asia/Tokyo</option>
        <!-- 他のタイムゾーンも追加してください。以下は例です。 -->
        <option value="America/New_York">America/New_York</option>
        <option value="Europe/London">Europe/London</option>
        <!-- ... -->
    </select>
</div>

<!-- 終了日 -->
<div class="mb-3">
    <label for="end_day" class="form-label">終了日</label>
    <input type="date" class="form-control" id="end_day" name="end_day">
</div>

<!-- 開始時間 -->
<div class="mb-3">
    <label for="end_time" class="form-label">終了時間</label>
    <input type="time" class="form-control" id="end_time" name="end_time">
</div>

<!-- 開始時間タイムゾーン -->
<div class="mb-3">
    <label for="end_timezone" class="form-label">終了時間タイムゾーン</label>
    <select class="form-control" id="end_timezone" name="end_timezone">
        <option value="Asia/Tokyo">Asia/Tokyo</option>
        <!-- 他のタイムゾーンも追加してください。以下は例です。 -->
        <option value="America/New_York">America/New_York</option>
        <option value="Europe/London">Europe/London</option>
        <!-- ... -->
    </select>
</div>
                
                <div class="mb-3">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarks" name="remarks"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-2">保存</button>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('addLogiCardBtn').addEventListener('click', function() {
            document.getElementById('newLogiCard').style.display = 'block';
        });
    </script>
    



    @foreach($logis as $logi)
    <div class="card mt-2">
        <div class="card-body">
            <h5 class="card-title">{{ $logi->title }}</h5>
            <p class="card-text">
                @if($logi->type)
                    <strong>Type:</strong> {{ $logi->type }}<br>
                @endif

                <!-- Start Day, Start Time, Start Timezone を一列に -->
                @if($logi->start_day)
                    <strong>Start:</strong> {{ $logi->start_day }}
                    @if($logi->start_time)
                        {{ date('H:i', strtotime($logi->start_time)) }}
                    @endif
                    @if($logi->start_timezone)
                        {{ $logi->start_timezone }}
                    @endif
                    <br>
                @endif

                <!-- End Day, End Time, End Timezone を一列に -->
                @if($logi->end_day)
                    <strong>End:</strong> {{ $logi->end_day }}
                    @if($logi->end_time)
                        {{ date('H:i', strtotime($logi->end_time)) }}
                    @endif
                    @if($logi->end_timezone)
                        {{ $logi->end_timezone }}
                    @endif
                    <br>
                @endif

                @if($logi->remarks)
                    <strong>Remarks:</strong> {{ $logi->remarks }}
                @endif
            </p>
            <!-- ここにアイコン表示の編集ボタンと削除ボタンを追加 -->
        <div class="card-actions">
            <a href="{{ route('logi.edit', ['project' => $project->id, 'logi' => $logi->id]) }}" title="編集"><i class="fas fa-edit"></i></a>
            <form action="{{ route('logi.destroy', ['project' => $project->id, 'logi' => $logi->id]) }}" method="post" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: none; border: none; cursor: pointer;" title="削除"><i class="fas fa-trash"></i></button>
            </form>
        </div>
        </div>


@endforeach




</body>
</html>
