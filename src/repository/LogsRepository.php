<?php

require_once 'Repository.php';

class LogsRepository extends Repository
{
    public function setLogs($email) : void {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            INSERT INTO logs (email, browser, datetime, device) 
            VALUES (?, ?, ?, ?)
        ');

        $date = new DateTime();
        $stmt->execute([
            $email,
            $this->browserName(),
            $date->format('Y-m-d H:i:s'),
            $this->isMobile()
        ]);
    }

    public function editLogs($email) : void {
        $stmt = Connection::getInstance()->getConnection()->prepare('
            SELECT * FROM logs WHERE md5(email)=:email AND device=:device ORDER BY datetime desc;
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $device = $this->isMobile();
        $stmt->bindParam(':device', $device, PDO::PARAM_STR);
        $stmt->execute();

        $log = $stmt->fetch(PDO::FETCH_ASSOC);
        $date = new DateTime();
        $stmt = Connection::getInstance()->getConnection()->prepare('
            UPDATE public.logs SET datetime = :date WHERE id_logs = :log;
        ');
        $format = $date->format('Y-m-d H:i:s');
        $stmt->bindParam(':date', $format, PDO::PARAM_STR);
        $stmt->bindParam(':log', $log['id_logs'], PDO::PARAM_STR);
        $stmt->execute();
    }

    private function isMobile() : string
    {
        if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
            , $_SERVER["HTTP_USER_AGENT"])){
            return "Mobile device";
        }
        return "Laptop/PC";
    }

    private function browserName()
    {

        $ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

        if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
            // OPERA
            $ExactBrowserNameBR="Opera";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
            // CHROME
            $ExactBrowserNameBR="Chrome";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
            // INTERNET EXPLORER
            $ExactBrowserNameBR="Internet Explorer";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
            // FIREFOX
            $ExactBrowserNameBR="Firefox";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
            // SAFARI
            $ExactBrowserNameBR="Safari";
        } else {
            // OUT OF DATA
            $ExactBrowserNameBR="OUT OF DATA";
        };

        return $ExactBrowserNameBR;
    }
}