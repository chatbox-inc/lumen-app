<?php //arrayobject.spec.php
describe('ArrayObject', function() {
    beforeEach(function() {
        $this->arrayObject = new ArrayObject(['one', 'two', 'three']);
    });

    describe('->count()', function() {
        it("should return the number of items", function() {
            $count = $this->arrayObject->count();
            assert($count === 3, "expected 3");
        });
    });

    it('assert http', function() {
        $spec = new \Chatbox\Message\Spec\HttpSpec($this->lumen);

        $message = [
            "from" => "Tom",
            "to" => "John",
            "body" => "hello world"
        ];

        // メッセージの投稿
        $response = $spec->post($message)->response();
        $spec->isOk();
        $spec->assertResponseHasUid();

        // 投稿メッセージの取得
        $uid = $spec->getUid();
        $response = $spec->get($uid)->response();
        $spec->isOk();
        $spec->assertResponseHasMessage();

        // 投稿メッセージの削除
        $response = $spec->delete($uid)->response();
        $spec->isOk();

        // 投稿メッセージ取得エラー
        $response = $spec->get($uid)->response();
        $spec->assertResponseHasNotFoundException();
    });

    it('fail with invalid message', function() {
        $spec = new \Chatbox\Message\Spec\HttpSpec($this->lumen);

        $okMessage = [
            "from" => "Tom",
            "to" => "John",
            "body" => "hello world"
        ];

        // メッセージの投稿
        $response = $spec->post($okMessage)->response();
        $spec->isOk();

        // NG FROM抜き
        $ngMessage = $okMessage;
        unset($ngMessage["from"]);
        $response = $spec->post($ngMessage)->response();
        $spec->assertResponseHasValidationException();

        // NG FROM配列
        $ngMessage = $okMessage;
        $ngMessage["from"] = ["Tom"];
        $response = $spec->post($ngMessage)->response();
        $spec->assertResponseHasValidationException();

        // NG TO抜き
        $ngMessage = $okMessage;
        unset($ngMessage["to"]);
        $response = $spec->post($ngMessage)->response();
        $spec->assertResponseHasValidationException();

        // NG TO配列
        $ngMessage = $okMessage;
        $ngMessage["to"] = ["Tom"];
        $response = $spec->post($ngMessage)->response();
        $spec->assertResponseHasValidationException();

        // Body 抜きはOK
        $ngMessage = $okMessage;
        unset($ngMessage["body"]);
        $response = $spec->post($ngMessage)->response();
        $spec->isOk();

    });
});
?>