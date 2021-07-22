<?php
namespace ChaoticBear\BridgeInteractiveZillow;
class Zestimates {
    protected $serverApiKey = null;
    protected $apiUrl = 'https://api.bridgedataoutput.com/api/v2/zestimates';
    protected $offset = null;
    protected $limit = null;
    protected $fields = null;
    protected $near = null;
    protected $radius = null;
    protected $box = null;
    protected $poly = null;
    protected $geohash = null;
    public function __construct($serverApiKey, $apiUrl = '') {
        $this->serverApiKey = $serverApiKey;
        if (!empty($apiUrl)) {
            $this->apiUrl = $apiUrl;
        }
    }
    public function setOffset($offset) {
        $this->offset = $offset;
    }
    public function getOffset() {
        return $this->offset;
    }
    public function setLimit($limit) {
        $this->limit = $limit;
    }
    public function getLimit() {
        return $this->limit;
    }
    public function setFields($fields) {
        $this->fields = $fileds;
    }
    public function getFields() {
        return $this->fileds;
    }
    public function setNear($near) {
        $this->near = $near;
    }
    public function getNear() {
        return $this->near;
    }
    public function setRadius($radius) {
        $this->radius = $radius;
    }
    public function getRadius() {
        return $this->radius;
    }
    public function setBox($box) {
        $this->box = $box;
    }
    public function getBox() {
        return $this->box;
    }
    public function setPoly($poly) {
        $this->poly = $poly;
    }
    public function getPoly() {
        return $this->poly;
    }
    public function setGeohash($geohash) {
        $this->geohash = $geohash;
    }
    public function getGeohash() {
        return $this->geohash;
    }
    public function getRequestUrl() {
        $d = [
            'access_token' => $this->serverApiKey,
        ];
        foreach($this as $key => $val) {
            if ($key != 'apiUrl' && $key != 'serverApiKey' && $val !== null) {
                $d[$key] = $val;
            }
        }
        return $this->apiUrl . '?' . http_build_query($d);
    }
    public function request() {
        $url = $this->getRequestUrl();
        $client = new \GuzzleHttp\Client();
        try {
            $res = $client->request('GET', $url);
            if ($res->getStatusCode() == 200) {
                return json_decode($res->getBody());
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
}
