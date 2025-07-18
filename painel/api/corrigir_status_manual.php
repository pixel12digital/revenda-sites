<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
file_put_contents(__DIR__ . '/debug_corrigir_status.txt', date('Y-m-d H:i:s') . ' ' . json_encode($_POST) . PHP_EOL, FILE_APPEND);
require_once '../config.php';
require_once '../db.php';
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'error' => 'Método inválido']);
  exit;
}
$cliente_id = isset($_POST['cliente_id']) ? intval($_POST['cliente_id']) : 0;
$cobranca_id = isset($_POST['cobranca_id']) ? intval($_POST['cobranca_id']) : 0;
$status = isset($_POST['status']) ? trim($_POST['status']) : '';
$permitidos = ['pendente','enviado','erro',''];
if (!$cliente_id || !$cobranca_id || !in_array($status, $permitidos)) {
  echo json_encode(['success' => false, 'error' => 'Dados inválidos']);
  exit;
}
// Busca o último registro de mensagem enviada para essa cobrança
$res = $mysqli->query("SELECT id FROM mensagens_comunicacao WHERE cliente_id = $cliente_id AND cobranca_id = $cobranca_id AND direcao = 'enviado' ORDER BY data_hora DESC LIMIT 1");
if ($res && $res->num_rows > 0) {
  $row = $res->fetch_assoc();
  $id = $row['id'];
  $data_hora = date('Y-m-d H:i:s');
  $sql = "UPDATE mensagens_comunicacao SET status = '" . $mysqli->real_escape_string($status) . "', data_hora = '" . $data_hora . "' WHERE id = $id LIMIT 1";
  if ($mysqli->query($sql)) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'error' => $mysqli->error]);
  }
  exit;
} else {
  // Busca um canal_id válido
  $canal_id = 1;
  $resCanal = $mysqli->query("SELECT id FROM canais_comunicacao LIMIT 1");
  if ($resCanal && $rowCanal = $resCanal->fetch_assoc()) {
    $canal_id = $rowCanal['id'];
  }
  $mensagem = 'Status manual inserido';
  $tipo = 'manual';
  $direcao = 'enviado';
  $data_hora = date('Y-m-d H:i:s');
  $stmt = $mysqli->prepare("INSERT INTO mensagens_comunicacao (canal_id, cliente_id, cobranca_id, mensagem, tipo, data_hora, direcao, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('iiisssss', $canal_id, $cliente_id, $cobranca_id, $mensagem, $tipo, $data_hora, $direcao, $status);
  if ($stmt->execute()) {
    echo json_encode(['success' => true]);
  } else {
    echo json_encode(['success' => false, 'error' => $mysqli->error]);
  }
  exit;
} 