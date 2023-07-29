<?php
declare(strict_types=1);

namespace App\Controller;

use App\Middleware\AddFox;
use App\Model\User;
use App\Services\UserService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Annotation\Middlewares;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Stringable\Str;

#[AutoController]
#[Middlewares([AddFox::class])]
class UserController
{

    #[Inject]
    private UserService $userService;

    public function index(RequestInterface $request)
    {
        // 从请求中获得 id 参数
        $id = $request->input('id', 1);
        return (string)$id;
    }

    //curl http://localhost:9501/user/1 -X POST -d "name=luo233"
    public function info(RequestInterface $request, int $id)
    {
        $name = $request->input('name') ?? '';
        if ($request->isMethod('get')) {
            $user = $this->userService->user(1);
            $user2 = $this->userService->findByName('luo');
            return [
                'user' => $user['name'] ?? '',
                'id' => $user['id'] ?? '',
                'path' => $request->path(),
                'url' => $request->url(),
                'full-url' => $request->fullUrl(),
                'all' => $request->all(),
                'hasName' => $request->has('name'),
                'file' => $request->file('photo'),
                'hasFile' => $request->hasFile('photo'),
                'user2' => $user2,
            ];
        }

        $user = User::query()->find($id);
        $user->setName($name ?? Str::random(6));
        $user->save();
        return [
            'user' => $user,
        ];

    }

    // http://localhost:9501/user/1 -X DELETE
    public function deleteUser(int $id)
    {
        $user = User::query()->find($id);
        $user->delete();
        return [
            'msg' => 'ok',
        ];
    }

}