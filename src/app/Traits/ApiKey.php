<?php


namespace App\Traits;


use Hash;
use Illuminate\Support\Str;

trait ApiKey
{
    protected string $apiKeyColumnName = 'api_key';

    public function sign(): string
    {
        $key = Str::random(32);
        $this->{$this->apiKeyColumnName} = $key;
        $this->save();
        $this->refresh();
        return Hash::make($key);
    }

    public function validate($signature){
        $result = $this->{$this->apiKeyColumnName} && Hash::check($this->{$this->apiKeyColumnName}, $signature);
        $this->{$this->apiKeyColumnName} = null;
        $this->save();
        $this->refresh();
        return $result;
    }
}
