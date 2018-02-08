<?php
/*
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace SwagMediaGCP;

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

use Google\Cloud\Storage\StorageClient;
use League\Flysystem\AdapterInterface;
use Shopware\Components\Plugin;
use Superbalist\Flysystem\GoogleStorage\GoogleStorageAdapter;

class SwagMediaGCP extends Plugin
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Shopware_Collect_MediaAdapter_gcp' => 'createGCPAdapter'
        ];
    }

    /**
     * @param \Enlight_Event_EventArgs $args
     * @return AdapterInterface
     */
    public function createGCPAdapter(\Enlight_Event_EventArgs $args)
    {
        $config = $args->get('config');

        $storageClient = new StorageClient([
            'projectId' => $config['projectId'],
            'keyFilePath' => $config['keyFilePath'],
        ]);
        $bucket = $storageClient->bucket($config['bucket']);

        return new GoogleStorageAdapter($storageClient, $bucket);
    }
}
