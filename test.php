<?php
$servername = "localhost:3307";
$username = "root"; // замените на ваше имя пользователя
$password = ""; // замените на ваш пароль
$dbname = "transaction_tracker";

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$expense_date = $_POST['expense_date'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$amount = $_POST['amount'];
$category = $_POST['category'];
$comment = $_POST['comment'];

// Вставляем данные в таблицу
$sql = "INSERT INTO expenses (expense_date, first_name, last_name, amount, category, comment)
VALUES ('$expense_date', '$first_name', '$last_name', '$amount', '$category', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "Запись успешно добавлена!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
