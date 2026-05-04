<!-- Bagian Input Task -->
<form method="POST" action="">
    <input type="text" name="task_name" placeholder="Tulis tugas baru..." required>
    <button type="submit" name="add_task">Tambah</button>
</form>

<?php
// Logika untuk fitur Create (POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_task'])) {
    $new_task = $_POST['task_name'];
    // Untuk simulasi sederhana, kita echo saja dulu
    echo "<p>Tugas baru ditambahkan: " . htmlspecialchars($new_task) . "</p>";
}
?>
