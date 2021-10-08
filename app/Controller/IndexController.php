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
use ZxInc\Zxipdb\IPTool;
use ZxInc\Zxipdb\IPv4Tool;
use ZxInc\Zxipdb\IPv6Tool;
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
        if (!(IPv4Tool::isValidAddress($ip) || IPv6Tool::isValidAddress($ip))) {
            $ip = '8.8.8.8';
        }
        return $this->response->json(IPTool::query($ip));

        switch ($type) {
            case 'json':



        }
    }
}
