<?php
/**
 * Description of PingdomAPI
 *
 * @author jcruz
 */
namespace Emagister;

use Emagister\pingdom;



class PingdomAPI {
    //put your code here
    const MAIL = 'php@emagister.com';
    const PASS = 'emagist3r';
    const KEY = 'ociilto5skp7acx7h0ijhvu7gbpao6kw';

    public function getPingdomState()
    {
         // Init cURL
        $pingdom = new pingdom(PingdomAPI::MAIL, PingdomAPI::PASS, PingdomAPI::KEY);
        return $pingdom->getStatus();
    }
}
?>
