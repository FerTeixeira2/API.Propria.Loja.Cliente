<?php
    require_once './models/ClienteModel.php';
    class ClienteController  {
        public function getClientes() {
            $clienteModel = new ClienteModel();

            $response = $clienteModel->getClientes();

            return json_encode([
                'error' => null,
                'result' => $response
            ]);
        }
    }
?>