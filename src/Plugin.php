<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml;

use BaserCore\BcPlugin;
use Cake\Console\CommandCollection;
use SitemapXml\Command\SitemapXmlCommand;

/**
 * Class Plugin
 */
class Plugin extends BcPlugin
{
    /**
     * コマンド定義
     *
     * @param CommandCollection $commands
     * @return CommandCollection
     */
    public function console(CommandCollection $commands): CommandCollection
    {
        $commands->add('create sitemap', SitemapXmlCommand::class);
        return $commands;
    }
}
