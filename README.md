# Google Cloud Storage Adapter for Shopware

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

The GCP adapter allows you to manage your media files in shopware on Google Cloud Storage.

## Building a package

Just run `./build.sh`.

## Install

Download the plugin from the release page and enable it in shopware.

## Usage

Update your `config.php` in your root directory and fill in your own values

```php
'cdn' => [
    'backend' => 'gcp',
    'adapters' => [
        'gcp' => [
            'type'          => 'gcp',
            'mediaUrl'      => 'https://storage.googleapis.com/your-bucket-name/',
            'projectId'     => 'your-project-id',
            'keyFilePath'   => '/path/to/your/keyfile', // see below
            'bucket'        => 'your-bucket-name'
        ]
    ]
],
```

### Credentials

The credentials will be auto-loaded by the Google Cloud Client.

1. The client will first look at the GOOGLE_APPLICATION_CREDENTIALS env var.
   You can use ```putenv('GOOGLE_APPLICATION_CREDENTIALS=/path/to/service-account.json');``` to set the location of your credentials file.

2. The client will look for the credentials file at the following paths:

- windows: `%APPDATA%/gcloud/application_default_credentials.json`
- others: `$HOME/.config/gcloud/application_default_credentials.json`

If running in Google App Engine, the built-in service account associated with the application will be used.
If running in Google Compute Engine, the built-in service account associated with the virtual machine instance will be used.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
