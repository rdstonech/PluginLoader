<?php

declare (strict_types=1);

namespace PluginLoader;

use pocketmine\plugin\PluginBase;

use pocketmine\utils\Config;

class Loader extends PluginBase
{
	public function onEnable ()
	{
		$this->saveResource ('config.yml', \false);

		$config = new Config ($this->getDataFolder() . 'config.yml', Config::YAML);

		/** @var string[] */
		$paths = $config->get ('paths', []);

		if (!empty($paths))
		{
			foreach ($paths as $path)
			{
				$this->getServer()->getPluginManager()->loadPlugin ($path);
			}
		}
	}
}