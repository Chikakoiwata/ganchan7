<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TFA調整さん | 顧客情報</title>
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
        </style>
    </head>
    <body class="font-sans antialiased bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">

                <a href="{{ route('customers.create') }}" class="btn btn-primary">新規作成</a>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Country</th>
                                <th>Industry</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr onclick="window.location='{{ route('customers.show', $customer->id) }}';" style="cursor:pointer;">
                                    <td>{{ $customer->customer_name }}</td>
                                    <td>{{ $customer->customer_country }}</td>
                                    <td>{{ $customer->customer_industry }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>
            </div>
        </div>
    </div>
    </body>
</html>
