<?php

function createLocation(array $data): int
{
    global $pdo;
    $sql = "INSERT INTO locations (title, lat, lng, type) VALUES (:title, :lat, :lng, :typ);";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':title' => $data['title'],
        ':lat' => $data['lat'],
        ':lng' => $data['lng'],
        ':typ' => $data['type']
    ]);
    return $stmt->rowCount();
}

function getLocations(array $params = []): bool|array
{
    global $pdo;
    $condition = '';
    if (isset($params['is_verified']) && in_array($params['is_verified'], ['0', '1'])) {
        $condition = "WHERE is_verified = {$params['is_verified']}";
    } else if (isset($params['keyword'])) {
        $condition = " WHERE is_verified = 1 AND title like '%{$params['keyword']}%'";
    }
    $sql = "SELECT * FROM locations {$condition}";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getVerifiedLocations(): bool|array
{
    global $pdo;
    $sql = "SELECT * FROM locations WHERE is_verified = :is_verified";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':is_verified' => 1
    ]);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getLocationById(int $locationId)
{
    global $pdo;
    $sql = "SELECT * FROM locations WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $locationId
    ]);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function deleteLocation(int $locationId): int
{
    global $pdo;
    $sql = "DELETE FROM locations WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $locationId
    ]);
    return $stmt->rowCount();
}

function toggleStatus(int $id): int
{
    global $pdo;
    $sql = "UPDATE locations SET is_verified = 1 - is_verified WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id
    ]);
    return $stmt->rowCount();
}
