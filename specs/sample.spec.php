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

    it('GET / should get ok ', function() {
        $message = [
            "from" => "Tom",
            "to" => "John",
            "body" => "hello world"
        ];

        $this->lumen->post("/message",[
            "message" => $message
        ]);
        /** @var \Illuminate\Http\Response $response */
        $response = $this->lumen->response;

        assert($response->getStatusCode() === 200);
        $body = $response->getOriginalContent();
        $uid = array_get($body,"uid");
        assert(is_string($uid));

        $this->lumen->get("/message/$uid");

        /** @var \Illuminate\Http\Response $response */
        $response = $this->lumen->response;

        assert($response->getStatusCode() === 200);
        $body = $response->getOriginalContent();
        $recieveMessage = array_get($body,"message");
        foreach ($message as $key=>$value) {
            assert($recieveMessage[$key] === $value );
        }
    });
});
?>