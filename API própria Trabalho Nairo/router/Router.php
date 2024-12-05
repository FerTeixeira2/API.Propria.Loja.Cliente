<?php
    class router {
        private array $routes;

        public function __construct() {
            $this->routes = [
                'GET' =>[
                    '/pedido' => [
                        'controller' => 'PedidoController',
                        'function' => 'getPedidos'
                    ],
                    '/buscarCliente' => [
                        'controller' => 'ClienteController',
                        'function' => 'getClientes'
                    ]
                ],
                'POST' => [
                    '/criar-pedido' => [
                        'controller' => 'PedidoController',
                        'function' => 'createPedidos'
                    ],
                    '/criar-cliente' => [
                        'controller' => 'ClienteController',
                        'function' => 'createClientes'
                    ]
                ],
                'PUT' => [
                    '/atualizar-cliente' => [
                        'controller' => 'ClienteController',
                        'function' => 'updateClientes'
                    ]
                ]
            ];
        }

        public function handaleRequest(string $method, string $route): string {
            $routeExists = !empty($this->routes[$method][$route]);

            if (!$routeExists) {
                return json_encode([
                    'error' => 'Essa rota não existe!',
                    'result' => null
                ]);
            }

            $routeInfo = $this->routes[$method][$route];

            $controller = $routeInfo['controller'];
            $function = $routeInfo['function'];

            require_once __DIR__. '/../controller/' . $controller . '.php';

            return (new $controller)->$function();
        }
    }
?>