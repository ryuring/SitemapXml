# SitemapXml

baserCMS Plugin  
Copyright ryuring <https://ryuring.com>

　
## License
Lincensed under the MIT lincense since version 2.0

　
## About
このプラグインを利用すると、Google Search Console などで利用する、sitemap.xml を作ることができます。 

　
## How to use

### 管理画面で手動で作成する
プラグインをインストール後、プラグイン一覧の設定ボタンより sitemap.xml 作成画面に移動します。

「生成実行」ボタンをクリックすると、webroot 直下に、sitemap.xmlが生成されます。

### コマンドで実行する
次のコマンドを CRON に登録しておくと、定期的に sitemap.xml を更新することができます。

```shell
bin/cake create sitemap
```

※ CRON に登録する際、`bin/cake` はフルパスにする必要があります。
