<?php

namespace Teddy\Publisher;

use Nette;


class Extension extends Nette\DI\CompilerExtension
{

    public function loadConfiguration()
    {
        parent::loadConfiguration();
        $config = $this->getConfig();

        if (is_array($config)) {
            foreach ($config as $asset) {
                if ($asset['to'] != $asset['from']) {
                    foreach ($asset['items'] as $dir) {
                        $this->recurseCopy($asset['from'] . $dir, $asset['to'] . $dir);
                    }
                }
            }
        }
    }

    /**
     * Copies dir|file from $src to $dst
     * @param $src
     * @param $dst
     */
    protected function recurseCopy($src, $dst)
    {
        if (is_dir($src)) {
            $dir = opendir($src);
            @mkdir($dst, 0777, true);
            while (false !== ($file = readdir($dir))) {
                if (($file != '.') && ($file != '..')) {
                    if (is_dir($src . '/' . $file)) {
                        $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        } else {
            @mkdir(dirname($dst), 0777, true);
            copy($src, $dst);
        }
    }

}
