
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>稼働日詳細</title>
    <style>
        .saturday {
            color: blue;
        }
        .sunday {
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input {
            width: 100%;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    @foreach ($errors->all() as $error)//エラーを表示
    <li>{{$error}}</li>
  @endforeach

    <div>
        @if($project)
        <h2>案件の詳細: {{ $project->customer }}</h2>
        <p><strong>Start:</strong> {{ $project->start }}</p>
        <p><strong>End:</strong> {{ $project->end }}</p>
        <p><strong>Number:</strong> {{ $project->number }}</p>
        @endif

        <!-- 日付範囲の表を表示 -->
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Day of the Week</th>
                    <th>Traveling day(day)</th>
                    <th>Working day(day)</th>
                    <th>Holiday(day)</th>
                    <th>Overtime rate(hrs)</th>
                    <th>Extra charge for holidays</th>
                </tr>
            </thead>
            <tbody id="date-list"></tbody>
            <tfoot>
                <tr>
                    <td colspan="2">Total:</td>
                    <td id="total-traveling">0</td>
                    <td id="total-working">0</td>
                    <td id="total-holiday">0</td>
                    <td id="total-overtime">0</td>
                    <td id="total-extra_charge">0</td>
                </tr>
            </tfoot>
        </table>
    </div>

<form id="myForm" action="/create_detail_projects" method="post">
    @csrf
  

<!-- 各カテゴリの合計値を保持する隠し入力フィールド -->
<!-- ここから変更部分 -->
<label for="project_id">Project ID:</label>
<input type="text" id="project_id" name="project_id" value="{{ $project->id }}">

<label for="traveling-hidden">Total Traveling Days:</label>
<input type="text" id="traveling-hidden" name="total_traveling_days" value="">

<label for="working-hidden">Total Working Days:</label>
<input type="text" id="working-hidden" name="total_working_days" value="">

<label for="holiday-hidden">Total Holidays:</label>
<input type="text" id="holiday-hidden" name="total_holidays" value="">

<label for="overtime-hidden">Total Overtime Rate:</label>
<input type="text" id="overtime-hidden" name="total_overtime_rate" value="">

<label for="extra_charge-hidden">Total Extra Charge:</label>
<input type="text" id="extra_charge-hidden" name="total_extra_charge" value="">
<!-- ここまで変更部分 -->

<button
    type="submit"
    class="btn btn-primary btn-lg btn-block shadow-0 font-weight-bold"
>
稼動日を決定
</button>


</form>
@if($project)
    <script>
        const weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    
        const projectStart = new Date('{{ $project->start }}');
        const projectEnd = new Date('{{ $project->end }}');
        const totalDays = (projectEnd - projectStart) / (1000 * 60 * 60 * 24) + 1;
    
        const dateListContainer = document.getElementById('date-list');
    
        for (let date = new Date(projectStart), i = 0; date <= projectEnd; date.setDate(date.getDate() + 1), i++) {
            const row = dateListContainer.insertRow();
    
            // 日付セルを作成
            const dateCell = row.insertCell();
            dateCell.textContent = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
            // 曜日セルを作成
            const weekdayCell = row.insertCell();
            weekdayCell.textContent = weekdays[date.getDay()];
            weekdayCell.style.color = date.getDay() === 0 ? 'red' : date.getDay() === 6 ? 'blue' : 'black';
    
            const isTravelingDay = i < 2 || (totalDays - i) <= 2;
            const isWeekend = date.getDay() === 0 || date.getDay() === 6;
    
            createInputCell(row, 'traveling', isTravelingDay ? 1 : 0);
            const workingDayValue = (isTravelingDay || isWeekend) ? 0 : 1;
            createInputCell(row, 'working', workingDayValue);
            createInputCell(row, 'holiday', 0);
            createInputCell(row, 'overtime', workingDayValue ? 3 : 0);
            createInputCell(row, 'extra_charge', 0);
        }
    
function createInputCell(row, className, defaultValue) {
    const cell = row.insertCell();
    const input = document.createElement('input');
    input.type = 'number';
    input.className = className;
    input.value = defaultValue;
    input.oninput = function() {
        updateTotals();
        updateCellColor(cell, input);
    };
    cell.appendChild(input);
    updateCellColor(cell, input);  // 初期背景色を設定
}

function updateCellColor(cell, input) {
    cell.style.backgroundColor = input.value && input.value != '0' ? 'yellow' : '';  // 数値がある場合、かつその数値が0でない場合は黄色にする
}




        function updateTotals() {
            const totals = {
                traveling: 0,
                working: 0,
                holiday: 0,
                overtime: 0,
                extra_charge: 0
            };
    
            for (const className of Object.keys(totals)) {
                const inputs = document.querySelectorAll(`.${className}`);
                for (const input of inputs) {
                    totals[className] += parseFloat(input.value) || 0;
                }
            }
    
            for (const className of Object.keys(totals)) {
                document.getElementById(`total-${className}`).textContent = totals[className];
            }

            for (const className of Object.keys(totals)) {
            const hiddenInput = document.getElementById(`${className}-hidden`);
            hiddenInput.value = totals[className];
        }


        }
    
        // 初期合計を計算
        updateTotals();

        function setTotalValuesToHiddenInput() {
        const totals = {
            traveling: 0,
            working: 0,
            holiday: 0,
            overtime: 0,
            extra_charge: 0
            
        };

        for (const className of Object.keys(totals)) {
            const inputs = document.querySelectorAll(`.${className}`);
            for (const input of inputs) {
                totals[className] += parseFloat(input.value) || 0;
            }
        }

        for (const className of Object.keys(totals)) {
            const hiddenInput = document.getElementById(`${className}-hidden`);
            hiddenInput.value = totals[className];
        }

        // フォームの送信をトリガー
    document.getElementById('myForm').submit();
    }
</script>
@endif

    


@if(session('kadouhi'))
    <div>
        <!-- 登録済みのデータを表示 -->
        <p>おめでとう！以下が登録済みのデータです</p>
        <p>Total Traveling Days: {{ session('kadouhi')->total_traveling_days }}</p>
        <p>Total Working Days: {{ session('kadouhi')->total_working_days }}</p>
        <p>Total Working Days: {{ session('kadouhi')->total_holidays }}</p>
        <p>Total Working Days: {{ session('kadouhi')->total_overtime_rate }}</p>
        <p>Total Working Days: {{ session('kadouhi')->total_extra_charge }}</p>

    </div>
@endif


    
    
    

 
</body>
</html>




