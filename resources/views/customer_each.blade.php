<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANCHAN | 個別顧客</title>
    <!-- Material Design for Bootstrap 読み込み 開始 -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
    <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}" />
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}" defer></script>
    <!-- Material Design for Bootstrap 読み込み 終了 -->
    <style>
        .edit-icon {
            cursor: pointer;
        }
        .btn {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
        }
    </style>
</head>

<body>
<!-- ヘッダー開始 -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">GANCHAN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('back_to_projects') }}">プロジェクトに戻る</a>
            </li>
            <li class="nav-item">
                <button onclick="toggleEditMode()" id="edit-button" class="btn btn-primary">編集</button>
            </li>
            <li class="nav-item">
                <button onclick="document.getElementById('update-form').submit();" class="btn btn-primary">保存</button>
            </li>
        </ul>
    </div>
</nav>
<!--ヘッダー終了-->


    <div class="container mt-4">
    
            <form id="update-form" action="{{ route('customers.update', $customer->id) }}" method="POST" class="w-100">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                    <tr>
                        <td>Name</td>
                        <td>
                            <span id="customer_name-text">{{ $customer->customer_name }}</span>
                            <input type="text" id="customer_name" name="customer_name" value="{{ $customer->customer_name }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td>
                            <span id="customer_country-text">{{ $customer->customer_country }}</span>
                            <input type="text" id="customer_country" name="customer_country" value="{{ $customer->customer_country }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Industry</td>
                        <td>
                            <span id="customer_industry-text">{{ $customer->customer_industry }}</span>
                            <input type="text" id="customer_industry" name="customer_industry" value="{{ $customer->customer_industry }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Shareholder</td>
                        <td>
                            <span id="customer_shareholder-text">{{ $customer->customer_shareholder }}</span>
                            <input type="text" id="customer_shareholder" name="customer_shareholder" value="{{ $customer->customer_shareholder }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Sanction</td>
                        <td>
                            <span id="customer_sanction-text">{{ $customer->customer_sanction }}</span>
                            <input type="text" id="customer_sanction" name="customer_sanction" value="{{ $customer->customer_sanction }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Equipment</td>
                        <td>
                            <span id="customer_equipment-text">{{ $customer->customer_equipment }}</span>
                            <input type="text" id="customer_equipment" name="customer_equipment" value="{{ $customer->customer_equipment }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Production</td>
                        <td>
                            <span id="customer_production-text">{{ $customer->customer_production }}</span>
                            <input type="text" id="customer_production" name="customer_production" value="{{ $customer->customer_production }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>Financial</td>
                            <td>
                                <span id="customer_financial-text">{{ $customer->customer_financial }}</span>
                                <input type="text" id="customer_financial" name="customer_financial" value="{{ $customer->customer_financial }}" class="form-control" style="display: none;">
                            </td>
                    </tr>
                    <tr>
                        <td>Maintenance</td>
                            <td>
                                <span id="customer_maintenance-text">{{ $customer->customer_maintenance }}</span>
                                <input type="text" id="customer_maintenance" name="customer_maintenance" value="{{ $customer->customer_maintenance }}" class="form-control" style="display: none;">
                            </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                            <td>
                                <span id="customer_address-text">{{ $customer->customer_address }}</span>
                                <input type="text" id="customer_address" name="customer_address" value="{{ $customer->customer_address }}" class="form-control" style="display: none;">
                            </td>
                    </tr>
                    <tr>
                        <td>Access</td>
                            <td>
                                <span id="customer_access-text">{{ $customer->customer_access }}</span>
                                <input type="text" id="customer_access" name="customer_access" value="{{ $customer->customer_access }}" class="form-control" style="display: none;">
                            </td>
                    </tr>       
                    <tr>
                        <td>Remarks</td>
                            <td>
                                <span id="customer_remarks-text">{{ $customer->customer_remarks }}</span>
                                <textarea id="customer_remarks" name="customer_remarks" class="form-control" style="display: none;">{{ $customer->customer_remarks }}</textarea>
                            </td>
                    </tr>
                </table>
            </form>
            <a href="{{ route('back_to_projects') }}" class="btn btn-primary mt-2">戻る</a>
        </div>
    </div>

    <script>
        let editMode = false;

        function toggleEditMode() {
            editMode = !editMode;
            const editButton = document.getElementById('edit-button');
            editButton.innerText = editMode ? 'キャンセル' : '編集';

            const fields = [
                'customer_name', 'customer_country', 'customer_industry',
                'customer_shareholder', 'customer_sanction', 'customer_equipment',
                'customer_production', 'customer_financial', 'customer_maintenance',
                'customer_address', 'customer_access', 'customer_remarks'
            ];

            fields.forEach(fieldId => {
                const textElement = document.getElementById(fieldId + '-text');
                const inputElement = document.getElementById(fieldId);
                if (editMode) {
                    textElement.style.display = 'none';
                    inputElement.style.display = 'block';
                } else {
                    textElement.style.display = 'block';
                    inputElement.style.display = 'none';
                }
            });
        }
    </script>
</body>

</html>
