<?php
// Script para criar/atualizar o usuário administrador 'adm@gmail.com' com senha '1234' (hash seguro)
// Uso: php scripts/set_admin_password.php

require_once __DIR__ . '/../config/Database.php';

try {
    $pdo = Database::connect();

    $email = 'adm@gmail.com';
    $plain = '1234';
    $hash = password_hash($plain, PASSWORD_DEFAULT);

    // Verifica se já existe
    $st = $pdo->prepare('SELECT id_administrador FROM administradores WHERE email = :email LIMIT 1');
    $st->execute([':email' => $email]);
    $row = $st->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Atualiza senha
        $upd = $pdo->prepare('UPDATE administradores SET senha = :senha WHERE id_administrador = :id');
        $upd->execute([':senha' => $hash, ':id' => $row['id_administrador']]);
        echo "Administrador existente atualizado (id={$row['id_administrador']}).\n";
    } else {
        // Insere novo
        $ins = $pdo->prepare('INSERT INTO administradores (email, senha) VALUES (:email, :senha)');
        $ins->execute([':email' => $email, ':senha' => $hash]);
        echo "Administrador criado com sucesso (email={$email}).\n";
    }

    // fechar conexão
    $pdo = null;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . "\n";
    exit(1);
}
