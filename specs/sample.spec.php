<?php //arrayobject.spec.php
describe('ArrayObject', function() {
    beforeEach(function() {
    });

    it('assert http', function() {

        $this->lumen->get("/");
        /** @var \Illuminate\Http\Response $response */
        $response = $this->lumen->response();
        assert($response->getStatusCode() === 200);
        assert($response->getOriginalContent() === [
                "message" => "hello lumen application "
        ]);
    });

    it('assert http', function() {

        $this->lumen->get("/");
        /** @var \Illuminate\Http\Response $response */
        $response = $this->lumen->response();
        assert($response->getStatusCode() === 200);
        assert($response->getOriginalContent() === [
                "message" => "hello lumen application "
        ]);
    });

});
?>