# メッセージ管理

APIドキュメントはこちら

http://editor.swagger.io/#/?import=https://raw.githubusercontent.com/chatbox-inc/message/master/doc/swagger.yml

## support 

フロントからのメッセージ投げ込みのみをサポート

メッセージの投げ込みにフック(return mail 等で活用)

from to body からなるメッセージ構成(required)

from to をユーザIDにしてSMS活用

to をbox_idにしてBOX MESSAGE活用など

## 利用方法

MessageServiceInterface を注入する



テーブル構成

id 
heade


## issue

- [x] 基本ライブラリ作成
- [x] Sample作成  
− [x] 基礎テスト作成  
− [ ] APIドキュメント生成  
− [ ] パッケージ公開  