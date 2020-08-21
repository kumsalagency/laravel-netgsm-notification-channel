<?php


namespace KumsalAgency\NetGSM;


use Illuminate\Support\Str;

class NetGSM
{
    /**
     * @var \SoapClient
     */
    public \SoapClient $client;

    /**
     * NetGSM constructor.
     * @throws \SoapFault
     */
    public function __construct()
    {
        $this->client = new \SoapClient(config('netgsm.send_url'));
    }

    /**
     * @param $parameters
     * @return mixed
     * @throws \SoapFault
     */
    public function send($parameters)
    {
        return $this->client->smsGonder1NV2([
            'username' => $parameters['username'] ?? config('netgsm.username'),
            'password' => $parameters['password'] ?? config('netgsm.password'),
            'header' => $parameters['from'] ?? config('netgsm.header'),
            'msg' => trim($parameters['message'] ?? ''),
            'gsm' => str_replace(' ','',Str::replaceFirst('+','00',$parameters['to'] ?? '')),
            'encoding' => $parameters['encoding'] ?? config('netgsm.encoding'),
            'startdate' => $parameters['startDate'] ?? '',
            'stopdate' => $parameters['stopDate'] ?? '',
            'bayikodu' => $parameters['resellerCode'] ?? '',
            'filter' => $parameters['to'] ?? 0,
        ]);
    }

}