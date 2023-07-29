<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use App\JsonRpc\CalculatorService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Controller;

#[AutoController(server: "jsonrpc-http")]
class IndexController extends AbstractController
{
    #[Inject]
    protected CalculatorService $calculatorService;

    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();
        $sum = $this->calculatorService->add(1, 3);
        return [
            'method' => $method,
            'message' => "Hello {$user}.",
            'sum' => $sum,
        ];
    }

    public function hello()
    {
        return [
            'items'  => []
        ];
    }
}
