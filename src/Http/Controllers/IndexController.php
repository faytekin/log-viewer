<?php

namespace Opcodes\LogViewer\Http\Controllers;

use Opcodes\LogViewer\Facades\LogViewer;
use Opcodes\LogViewer\Utils\Utils;

class IndexController
{
    public function __invoke()
    {
        LogViewer::auth();

        return view('log-viewer::index', [
            'assetsAreCurrent' => LogViewer::assetsAreCurrent(),
            'logViewerScriptVariables' => [
                'version' => LogViewer::version(),
                'app_name' => config('app.name'),
                'path' => config('log-viewer.route_path'),
                'back_to_system_url' => config('log-viewer.back_to_system_url'),
                'back_to_system_label' => config('log-viewer.back_to_system_label'),
                'max_log_size_formatted' => Utils::bytesForHumans(LogViewer::maxLogSize()),
            ],
        ]);
    }
}
