<?php
header("Content-Type: application/json");
require 'database.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $result = $conn->query("SELECT * FROM mahasiswa WHERE id = $id");
        echo json_encode($result->fetch_assoc());
    } else {
        $result = $conn->query("SELECT * FROM mahasiswa");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

} else if ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $nim = $data['nim'] ?? '';
    $nama = $data['nama'] ?? '';
    $no_hp = $data['no_hp'] ?? '';

    $query = "INSERT INTO mahasiswa (nim, nama, no_hp) VALUES ('$nim', '$nama', '$no_hp')";
    echo json_encode(['success' => $conn->query($query)]);

} else if ($method == 'PUT') {
    if (!isset($_GET['id'])) {
        echo json_encode(['error' => 'ID wajib disertakan untuk update']);
    } else {
        $id = intval($_GET['id']);
        $data = json_decode(file_get_contents("php://input"), true);

        $nim = $data['nim'] ?? '';
        $nama = $data['nama'] ?? '';
        $no_hp = $data['no_hp'] ?? '';

        $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', no_hp='$no_hp' WHERE id=$id";
        echo json_encode(['success' => $conn->query($query)]);
    }

} else if ($method == 'DELETE') {
    if (!isset($_GET['id'])) {
        echo json_encode(['error' => 'ID wajib disertakan untuk delete']);
    } else {
        $id = intval($_GET['id']);
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        echo json_encode(['success' => $conn->query($query)]);
    }

} else {
    http_response_code(405);
    echo json_encode(['error' => 'Metode tidak didukung']);
}

$conn->close();
?>
