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

        header {
            background-color: white;
            color: black;
            padding: 10px 0;
        }

        header .logo {
            font-size: 24px;
            font-weight: bold;
            line-height: 2;
        }

        header .menu-items {
            display: flex;
            gap: 10px;
        }

        table.table > thead > tr {
            background-color: #007BFF;
            color: white;
        }

        .btn-red {
            background-color: red;
        }

        footer {
            padding: 20px 0;
            background-color: #f8f9fa;
            text-align: center;
        }
    </style>
</head>

<body class="font-sans antialiased bg-light">
    <header class="container">
        <div class="row justify-content-between">
            <div class="col-auto">
                <div class="logo">GANCHAN</div>
            </div>
            <div class="col-auto menu-items">
                <a href="{{ route('projects.customer') }}" class="btn btn-primary">顧客情報</a>
                <a href="{{ route('projects.check') }}" class="btn btn-primary">確認事項</a>
                <a href="{{ route('projects.price') }}" class="btn btn-primary">単価マスタ</a>
            </div>
        </div>
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
                                <td>{{ $project->created_at }}</td>
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
                "order": [] // 初期表示時の並べ替えを無効にする
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
