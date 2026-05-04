
<?php
session_start();
if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [
        ['id' => 1, 'name' => 'Belajar Git Dasar'],
        ['id' => 2, 'name' => 'Install XAMPP']
    ];
}


if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $id_to_delete = $_GET['id'];
    foreach ($_SESSION['tasks'] as $key => $task) {
        if ($task['id'] == $id_to_delete) {
            unset($_SESSION['tasks'][$key]);
            $_SESSION['tasks'] = array_values($_SESSION['tasks']);
            echo "<p style='color:red;'>Tugas ID $id_to_delete telah dihapus!</p>";
            break;
        }
    }
}

$daftar_tugas = $_SESSION['tasks'];
?>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Tugas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($daftar_tugas)): ?>
            <tr><td colspan="3">Tidak ada tugas.</td></tr>
        <?php else: ?>
            <?php foreach ($daftar_tugas as $t): ?>
                <tr>
                    <td><?php echo $t['id']; ?></td>
                    <td><?php echo htmlspecialchars($t['name']); ?></td>
                    <td>
                        <a href="?action=delete&id=<?php echo $t['id']; ?>" 
                           onclick="return confirm('Yakin ingin menghapus?')">
                           Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>