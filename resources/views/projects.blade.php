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

        <!-- Additional Styles -->
        <style type="text/css">
            .table-hover tbody tr:hover {
                background-color: #f2f2f2;
            }
            .table-responsive {
                max-width: 100%;
                margin: 0 auto;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-10 col-lg-12">

<a href="{{ route('projects.create') }}" class="btn btn-primary">新規作成</a>
<a href="{{ route('projects.customer') }}" class="btn btn-primary">顧客情報</a>
<a href="{{ route('projects.check') }}" class="btn btn-primary">確認事項</a>
<a href="{{ route('projects.price') }}" class="btn btn-primary">単価マスタ</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Created At</th>
                <th>User</th>
                <th>Status</th>
                <th>Start</th>
                <th>End</th>
                <th>Numbers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
                <tr style="cursor: pointer;" onclick="window.location='{{ route('projects.show', $project->id) }}';">
                    <td>{{ $project->customer }}</td>
                    <td>{{ $project->created_at }}</td>
                    <td>{{ $project->user->name }}</td>
                    <td>{{ $project->status }}</td>
                    <td>{{ $project->start }}</td>
                    <td>{{ $project->end }}</td>
                    <td>{{ $project->number }}</td>
                    <td>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-link text-secondary p-0"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-0"><i class="fas fa-trash"></i></button>
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
    </body>
</html>
