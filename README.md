# Banner プラグイン

Banner プラグインは、バナーエリア別にバナーを管理できるbaserCMS専用のプラグインです。

## Installation

1. 圧縮ファイルを解凍後、BASERCMS/app/Plugin/Banner に配置します。
2. 管理システムのプラグイン管理にアクセスし、表示されている Banner プラグイン をインストール（有効化）して下さい。
3. バナーエリア別に、バナーを追加してください。


### Use Sample

公開側での利用サンプルは以下を参照してください。

```
<?php $this->Banner->showBanner($bannerAreaName, $options); ?>
```

- $bannerAreaName: 文字列 - バナーエリア名
- $options: 配列
    - 'num' => 0: 表示する数
    - 'template' => 'banner_block': エレメントファイル名


## 確認済バージョン

|baserCMSバージョン|プラグインバージョン|ステータス|コメント|
|:--|:--|:--|:--|
|3系|-|承認済|動作可|
|4.0.6|3.0.1|承認|動作可|
|4.0.7|3.0.1|承認|動作可|
|4.0.8|3.0.1|承認|動作可|
|4.0.8|3.0.2|承認|動作可|
|4.0.8|3.0.3|承認|動作可|
|4.0.9|3.0.3|承認|動作可|
|4.0.9|3.0.4|承認|動作可|


## Thanks ##

- [http://basercms.net](http://basercms.net/)
- [http://wiki.basercms.net/](http://wiki.basercms.net/)
- [http://doc.basercms.net/](http://doc.basercms.net/)
- [http://cakephp.jp](http://cakephp.jp)
- [Semantic Versioning 2.0.0](http://semver.org/lang/ja/)

___
以下、3.0.4.1について特記。

admin-third対応化に伴い、バージョン表記を仮に3.0.4.1としました。（本来のプロダクトのリビジョンに混乱をきたさないようにするため）

3.0.4.1に関する改修は、[HATTANTOCO](https://github.com/HATTANTOCO) によるものです。

## 「admin-third対応化」の内容
詳細は、[baserCMSの「Banner（バナー管理）」プラグインのUIをadmin-third に対応化する](https://hattantoco.com/basercms-banner-plugin)を参照してください。

主な要点:
- admin-third対応化に伴い、admin-secondでは、利用できません。
- よって、admin-third管理テーマがリリースされたbaserCMS 4.2.0バージョン以降での使用に限定されます。

## インストール
1. CodeボタンあるいはReleasesからダウンロードした圧縮ファイルを解凍後、生成されたフォルダ名 Banner［-for-admin-third-*やバージョン名］を Banner にリネームし、/app/Plugin/Banner として配置します。
2. 管理画面のプラグイン管理に入り、表示されている Banner プラグイン をインストールして下さい。
3. プラグインのインストール後、Banner 管理ページにアクセスして設定を行なってください。

## アップデート
1. CodeボタンあるいはReleasesからダウンロードした圧縮ファイルを解凍後、生成されたフォルダ名 Banner［-for-admin-third-*やバージョン名］を Banner にリネームし、既存の/app/Plugin/Banner を上書きします。
2. 管理画面のプラグイン管理に入り、表示されている Banner プラグイン をアップデートして下さい。
3. View/Elements/banner_block.phpを変更されている場合は、アップデートを行うと上書きされてしまいますので、必ずバックアップをしておいて下さい。

___
以下、3.0.4.2について特記。

3.0.4.2に関する改修は、[HATTANTOCO](https://github.com/HATTANTOCO) によるものです。

- 条件分岐を追加して、admin-second/admin-third管理テーマいずれにも対応しました。
- admin-secondのバナーエリア一覧およびバナー一覧のタイトル部分、「新規追加」「並び替え」アイコン表示などがおかしい部分を修正しました。
