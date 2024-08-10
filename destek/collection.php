<?

$collection = collect([
    ['name' => 'John', 'age' => 30],
    ['name' => 'Jane', 'age' => 25],
    ['name' => 'Doe', 'age' => 40]
]);

// Döngü kullanarak koleksiyonu okuma
foreach ($collection as $item) {
    echo $item['name'] . ' is ' . $item['age'] . ' years old.<br>';
}

// Belirli bir indeks üzerinden koleksiyonu okuma
echo $collection[0]['name']; // John


@foreach ($collection as $item)
    {{ $item['name'] }} is {{ $item['age'] }} years old.<br>
@endforeach
