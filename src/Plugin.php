<?php
/**
 * SitemapXml : Google Sitemap Creator <https://github.com/ryuring/SitemapXml>
 * Copyright (c) ryuring <https://ryuring.com/>
 */

namespace SitemapXml;

use BaserCore\BcPlugin;
use Cake\Core\ContainerInterface;

/**
 * Class Plugin
 */
class Plugin extends BcPlugin
{

    /**
     * services
     * @param ContainerInterface $container
     * @noTodo
     * @checked
     */
    public function services(ContainerInterface $container): void
    {
        $container->addServiceProvider(new SitemapXmlServiceProvider());
    }

}
