<?php
// Debug: verifica se admin existe e testa password_verify com senha 1234
require_once __DIR__ . '/../config/Database.php';

try {
    $pdo = Database::connect();
    $email = 'adm@gmail.com';

    $st = $pdo->prepare('SELECT id_administrador, email, senha FROM administradores WHERE email = :email LIMIT 1');
    $st->execute([':email' => $email]);
    $row = $st->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "Nenhum administrador encontrado com email: $email\n";
        exit(0);
    }

    echo "Encontrado administrador id={$row['id_administrador']} email={$row['email']}\n";
    echo "Senha (hash): {$row['senha']}\n";

    $ok = password_verify('1234', $row['senha']);
    echo "password_verify('1234', senha) => ".($ok ? 'true' : 'false')."\n";

} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
}
