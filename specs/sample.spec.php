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
        $this->lumen->get("/");
        /** @var \Illuminate\Http\Response $response */
        $response = $this->lumen->response;

        assert($response->getStatusCode() === 200);
    });
});
?>