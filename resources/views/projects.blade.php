<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANCHAN | トップページ</title>
    <!-- Material Design for Bootstrap 読み込み 開始 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" defer></script>
    <!-- Material Design for Bootstrap 読み込み 終了 -->
    
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

    <!-- Additional Styles -->
    <style type="text/css">
        .table-hover tbody tr:hover {
            background-color: #f2f2f2;
        }

        .table-responsive {
            max-width: 100%;
            margin: 0 auto;
        }

        /* ヘッダーのスタイル変更 */
        .navbar-dark .navbar-nav .nav-link {
            color: black;
        }

        .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
            background-color: #f2f2f2;
            color: black;
            text-decoration: none;
        }

        a.navbar-brand {
            margin-left: 20px; /* 1. GANCHANのロゴの左の余白を増やす */
            color: black !important;  /* GANCHANの文字色を黒に */
            font-weight: bold; /* GANCHANの文字を太くする */
        }

        .navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
            background-color: #f2f2f2; /* 3. ホバー時の背景色をグレーに */
            color: black;
            text-decoration: none; /* ホバー時の下線を削除 */
        }

        .navbar {
            background-color: #f7f7f7 !important; /* ヘッダーの背景色を薄いグレーに */
        }


        table.table > thead > tr {
            background-color: #abaeb1;
            color: white;
        }

        .btn-red {
            background-color: #dc1029;
        }

        footer {
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
            width: 100%;
        }
    </style>
</head>

<body class="font-sans antialiased bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">GANCHAN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.customer') }}">顧客情報</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('projects.check') }}">確認事項</a>
                </li>
            </ul>
        </div>
    </nav>
    
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-12">
                <a href="{{ route('projects.create') }}" class="btn btn-red mb-3">新規作成</a>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>顧客</th>
                                <th>ステータス</th>
                                <th>開始日</th>
                                <th>終了日</th>
                                <th>人数</th>
                                <th>登録日</th>
                                <th>ユーザー</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($projects as $project)
                            <tr onclick="window.location='{{ route('projects.show', $project->id) }}';" style="cursor: pointer;">
                                <td>{{ $project->customer }}</td>
                                <td>{{ $project->status }}</td>
                                <td>{{ $project->start }}</td>
                                <td>{{ $project->end }}</td>
                                <td>{{ $project->number }}</td>
                                <td>{{ $project->created_at->format('Y-m-d') }}</td>
                                <td>{{ $project->user->name }}</td>
                                <td>
                                    <!-- イベントの伝播を停止 -->
                                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-link text-secondary p-0" onclick="event.stopPropagation();"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="event.stopPropagation(); return confirm('本当に削除しますか？');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0" onclick="event.stopPropagation();"><i class="fas fa-trash"></i></button>
                                    </form>                                    
                                </td>
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "order": [[5, "desc"]] // 5列目（登録日）で降順に並べ替え
            });
        });
    </script>
    
    <footer class="container">
        <div class="row">
            <div class="col-12 text-center">
                ©2023 GANCHAN. All rights reserved.
            </div>
        </div>
    </footer>


    
</body>

</html>
