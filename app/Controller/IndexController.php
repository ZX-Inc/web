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
use function Hyperf\ViewEngine\view;

class IndexController extends AbstractController
{
    public function index()
    {
        return view('index.index');
    }

    public function ipquery()
    {
        return view('index.ipquery');
    }

    public function info()
    {
        $type = $this->request->input('type', 'xml');
        $ip = $this->request->input('ip');
        switch ($type) {
            case 'json':



        }
    }
}
