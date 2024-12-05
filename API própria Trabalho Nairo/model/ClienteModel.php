<?php
    require_once 'DAL/ClienteDAO.php';

    class ClienteModel {
        public ?int $idCliente;
        public ?string $nomeCliente;
        public ?string $sobrenomeCliente;
        public ?string $emailCliente;
        public ?string $telefoneCliente;
        public ?string $enderecoCliente;
        public ?string $cidadeCliente;
        public ?string $estadoCliente;
        public ?string $cepCliente;
        public ?string $dataCadastroCliente;


        public function __construct(
            ?int $idCliente = null, 
            ?string $nomeCliente = null,
            ?string $sobrenomeCliente = null,
            ?string $emailCliente = null,
            ?string $telefoneCliente = null,
            ?string $enderecoCliente = null,
            ?string $cidadeCliente = null,
            ?string $estadoCliente = null,
            ?string $cepCliente = null,
            ?string $dataCadastroCliente = null
        )
        {
            $this->idCliente = $idCliente;
            $this->$nomeCliente = $nomeCliente;
            $this->$sobrenomeCliente = null;
            $this->$emailCliente = null;
            $this->$telefoneCliente = null;
            $this->$enderecoCliente = null;
            $this->$cidadeCliente = null;
            $this->$estadoCliente = null;
            $this->$cepCliente = null;
            $this->$dataCadastroCliente = null;
        }

        public function getClientes() {
            $clienteDAO = new clienteDAO();
            $clientes = $clienteDAO->getClientes();

            foreach ($clientes as $chave => $cliente) {
                $clientes[$chave] = new ClienteModel(
                    $cliente['idCliente'],
                    $cliente['nomeCliente'],
                    $cliente['sobrenomeCliente'],
                    $cliente['emailCliente'],
                    $cliente['telefoneCliente'],
                    $cliente['enderecoCliente'],
                    $cliente['cidadeCliente'],
                    $cliente['estadoCliente'],
                    $cliente['cepCliente'],
                    $cliente['dataCadastroCliente']
                );
            }
            return $clientes;
        }
    }
?>