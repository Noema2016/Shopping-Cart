<?php

namespace Cart\Controllers;

use Slim\Router;
use Cart\Models\Product;
use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductController
{
	public function get($slug, Request $request, Response $response, Product $product, Twig $view, Router $router)
	{
		$product = $product->where('slug', $slug)->first();

		if (!$product) {
			return $response->withRedirect($router->pathFor('home'));
		}

		return $view->render($response, "products/product.twig", [
			'product' => $product,
		]);
	}
}