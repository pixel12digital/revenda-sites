<?php
/**
 * Configurações globais do sistema
 * — ajuste conforme necessário.
 */

/* ===== Credenciais do administrador padrão ===== */
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin123');

/* ===== Configuração do banco de dados remoto (Hostinger) =====
 * Utilize os mesmos dados tanto em desenvolvimento local quanto em produção.
 */
define('DB_HOST', 'srv1607.hstgr.io');      // ou '193.203.166.216'
define('DB_NAME', 'u342734079_revendaweb');
define('DB_USER', 'u342734079_revendaweb');
define('DB_PASS', 'Los@ngo#081081');

/* ===== Configuração da API do Asaas =====
 * Use chaves diferentes para sandbox e produção.
 */
// Chave de produção Asaas (garantido sem espaços ou quebras de linha)
define('ASAAS_API_KEY', '$aact_prod_000MzkwODA2MWY2OGM3MWRlMDU2NWM3MzJlNzZmNGZhZGY6OmFkYjYzODUyLTI3MzQtNGU1NS04OGMzLTc3N2FjMmZiOTcwYjo6JGFhY2hfZWJlMWMwZDktNjJiOC00ODA5LTgzYzktZTNlNDY0ZDczYTVm');
define('ASAAS_API_URL', 'https://www.asaas.com/api/v3');
?>
