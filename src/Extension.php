<?php

namespace Teddy\Publisher;

use Nette;


class Extension extends Nette\DI\CompilerExtension
{

    public function loadConfiguration()
    {
        parent::loadConfiguration();
        $config = $this->getConfig();

        $publicRoot = $config['publicRoot'];
        foreach ($config['assets'] as $asset) {
            foreach ($asset['dirs'] as $dir) {
                $this->recurseCopy($asset['hiddenRoot'] . $dir, $publicRoot . $dir);
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
        $dir = opendir($src);
        @mkdir($dst, 0777, true);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.' ) && ($file != '..' )) {
                if (is_dir($src . '/' . $file) ) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

}
