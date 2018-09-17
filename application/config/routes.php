<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Login_Controller/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['users'] = "UserController/list";
$route['usersadd'] = "UserController/add";
$route['useredit/(:num)'] = "UserController/editar/$1";
$route['userdel/(:num)'] = "UserController/excluir/$1";
$route['newaccount'] = "Login_Controller/newAccount";
$route['createaccount'] =  "Login_Controller/createAccount";
$route['cursos'] = "CursoController/list";
$route['cursoadd'] = "CursoController/add";
$route['cursoedit/(:num)'] = "CursoController/editar/$1";
$route['cursodel/(:num)'] = "CursoController/excluir/$1";
$route['alunos'] = "AlunoController/list";
$route['pessoaadd'] = "PessoaController/add";
$route['alunoedit/(:num)'] = "AlunoController/editar/$1";
$route['alunodel/(:num)'] = "AlunoController/excluir/$1";
$route['pagamentos'] = "PagamentoController/list";
$route['pagadd'] = "PagamentoController/add";
$route['pagdel/(:num)'] = "PagamentoController/excluir/$1";
$route['pagedit/(:num)'] = "PagamentoController/editar/$1";
$route['alunopag/(:num)'] = "AlunoController/aluno_pagamento/$1";
$route['categorias'] = "CategoriaController/list";
$route['categoriaadd'] = "CategoriaController/add";
$route['categoriaedit/(:num)'] = "CategoriaController/editar/$1";
$route['categoriadel/(:num)'] = "CategoriaController/excluir/$1";
$route['produtos'] = "ProdutoController/list";
$route['produtoadd'] = "ProdutoController/add";
$route['produtoedit/(:num)'] = "ProdutoController/editar/$1";
$route['produtodel/(:num)'] = "ProdutoController/excluir/$1";
$route['enderecos'] = "EnderecoController/list";
$route['enderecoadd'] = "EnderecoController/add";
$route['enderecoedit/(:num)'] = "EnderecoController/editar/$1";
$route['enderecodel/(:num)'] = "EnderecoController/excluir/$1";
//$route['catalogo'] = "CatalogoController";
$route['catalogo/(:num)'] = "CatalogoController/produtos/$1";
$route['addcart/(:num)'] = "CatalogoController/add/$1";
$route['subtrair/(:num)'] = "CatalogoController/subtrair/$1";
$route['aumentar/(:num)'] = "CatalogoController/aumentar/$1";
$route['calcfrete'] = "CatalogoController/getValorFrete";
$route['remover/(:num)'] = "CatalogoController/removerCarrinho/$1";
$route['pedido'] = "CatalogoController/finalizarPedido";
$route['finalizar'] = "CatalogoController/encerrarCompra";
$route['pedidos'] = "PedidoController/pedidosList";
$route['acompanhar'] = "AcompanhamentoController/acompanhamentoList";
$route['admin'] = "AdminController";
$route['login'] = "Login_Controller/Login";
$route['logar'] = "Login_Controller/Logar";
$route['reset'] = "Login_Controller/ResetPass";
$route['resetar'] = "EmailController/testMail";
$route['logout'] = "Login_Controller/logout";