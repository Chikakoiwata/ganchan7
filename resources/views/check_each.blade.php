<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GANCHAN | 国別確認</title>
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
    
            <form id="update-form" action="{{ route('checks.update', $check->id) }}" method="POST" class="w-100">
                @csrf
                @method('PUT')
                <table class="table table-bordered">
                    <tr>
                        <td>国</td>
                        <td>
                            <span id="check_country-text">{{ $check->check_country }}</span>
                            <input type="text" id="check_country" name="check_country" value="{{ $check->check_country }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>VISA</td>
                        <td>
                            <span id="visa-text">{{ $check->visa }}</span>
                            <input type="text" id="visa" name="visa" value="{{ $check->visa }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>PE構成条件</td>
                        <td>
                            <span id="pe-text">{{ $check->pe }}</span>
                            <input type="text" id="pe" name="pe" value="{{ $check->pe }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>個人所得税</td>
                        <td>
                            <span id="income_tax-text">{{ $check->income_tax }}</span>
                            <input type="text" id="income_tax" name="income_tax" value="{{ $check->income_tax }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>現地VAT</td>
                        <td>
                            <span id="vat-text">{{ $check->vat }}</span>
                            <input type="text" id="vat" name="vat" value="{{ $check->vat }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>本邦消費税</td>
                        <td>
                            <span id="consumption_tax-text">{{ $check->consumption_tax }}</span>
                            <input type="text" id="consumption_tax" name="consumption_tax" value="{{ $check->consumption_tax }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>税務Reference</td>
                        <td>
                            <span id="tax_reference-text">{{ $check->tax_reference }}</span>
                            <input type="text" id="tax_reference" name="tax_reference" value="{{ $check->tax_reference }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>
                        <td>渡航情報</td>
                        <td>
                            <span id="danger-text">{{ $check->danger }}</span>
                            <input type="text" id="danger" name="danger" value="{{ $check->danger }}" class="form-control" style="display: none;">
                        </td>
                    </tr>
                    <tr>    
                        <td>そのほか</td>
                        <td>
                            <span id="check_remarks-text">{{ $check->check_remarks }}</span>
                            <input type="text" id="check_remarks" name="check_remarks" value="{{ $check->check_remarks }}" class="form-control" style="display: none;">
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
                'check_country',
                'visa',
                'pe',
                'income_tax',
                'vat',
                'consumption_tax',
                'tax_reference',
                'danger',
                'check_remarks'        
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